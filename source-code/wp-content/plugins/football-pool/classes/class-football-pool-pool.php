<?php
class Football_Pool_Pool {
	private $force_lock_time = false;
	private $lock_timestamp;
	private $lock_datestring;
	private $scorehistory;
	public $leagues;
	public $has_bonus_questions = false;
	public $has_matches = false;
	public $has_leagues;
	public $always_show_predictions = false;
	public $has_jokers;
	public $pool_id = 1;
	public $pool_users; // array of users in a pool
	public $season = FOOTBALLPOOL_DEFAULT_SEASON;
	
	public function __construct( $season = 0 ) {
		if ( $season > 0 ) $this->season = $season;
		$this->scorehistory = $this->get_score_table();
		$this->num_jokers = $this->get_jokers();
		$this->has_jokers = ( $this->num_jokers > 0 );
		
		$this->leagues = $this->get_leagues();
		$this->has_leagues = ( Football_Pool_Utils::get_fp_option( 'use_leagues' ) == '1' ) 
								&& ( count( $this->leagues ) > 1 );
		
		$this->lock_datestring = Football_Pool_Utils::get_fp_option( 'bonus_question_locktime', '' );
		$this->force_lock_time = 
			( Football_Pool_Utils::get_fp_option( 'stop_time_method_questions', 0, 'int' ) == 1 )
			&& ( $this->lock_datestring != '' );
		if ( $this->force_lock_time ) {
			$date = new DateTime( Football_Pool_Utils::date_from_gmt( $this->lock_datestring ) );
			$this->lock_timestamp = $date->format( 'U' );
		} else {
			$this->lock_timestamp = 0; // bonus questions have no time threshold
		}
		
		// override hiding of predictions for editable questions?
		$this->always_show_predictions = ( (int) Football_Pool_Utils::get_fp_option( 'always_show_predictions' ) === 1 );
		
		$matches = new Football_Pool_Matches();
		$this->has_matches = $matches->has_matches;
		$this->has_bonus_questions = ( $this->get_number_of_bonusquestions() > 0 );
		
		$this->pool_users = $this->get_pool_user_info( $this->pool_id );
	}
	
	private function is_toto_result($home, $away, $user_home, $user_away ) {
		return $this->toto( $home, $away ) == $this->toto( $user_home, $user_away );
	}
	
	private function toto( $home, $away ) {
		if ( $home == $away ) return 3;
		if ( $home > $away ) return 1;
		return 2;
	}
	
	public function calc_score( $home, $away, $user_home, $user_away, $joker, $match_id, $user_id = null ) {
		$score = -1;
		if ( ! is_int( $home ) || ! is_int( $away ) ) {
			// match result not (yet) available
			$score = '';
		}
		if ( $user_home === '' || $user_away === '' || $user_home === null || $user_away === null ) {
			// user prediction not complete
			$score = 0;
		}
		
		$full_score = 0;
		$toto_score = 0;
		$goal_bonus = 0;
		$goal_diff_bonus = 0;
		$full = (int) Football_Pool_Utils::get_fp_option( 'fullpoints', FOOTBALLPOOL_FULLPOINTS, 'int' );
		$toto = (int) Football_Pool_Utils::get_fp_option( 'totopoints', FOOTBALLPOOL_TOTOPOINTS, 'int' );
		$goal = (int) Football_Pool_Utils::get_fp_option( 'goalpoints', FOOTBALLPOOL_GOALPOINTS, 'int' );
		$diff = (int) Football_Pool_Utils::get_fp_option( 'diffpoints', FOOTBALLPOOL_DIFFPOINTS, 'int' );
		$joker_multiplier = (int) Football_Pool_Utils::get_fp_option( 'joker_multiplier', FOOTBALLPOOL_JOKERMULTIPLIER, 'int' );
		
		$do_calc = ( $score === -1 );
		
		$match_draw = $match_home_wins = $match_away_wins = null;
		if ( $do_calc ) {
			$match_draw = ( (int) $home == (int) $away );
			$match_home_wins = ( (int) $home > (int) $away );
			$match_away_wins = ( (int) $home < (int) $away );			
		}
		
		$scoring_vars = array(
			'do_calc' => $do_calc,
			'match_id' => $match_id,
			'user_id' => $user_id,
			'home' => $home,
			'away' => $away,
			'user_home' => $user_home,
			'user_away' => $user_away,
			'joker' => $joker,
			'joker_multiplier' => $joker_multiplier,
			'has_jokers' => $this->has_jokers,
			'full' => $full,
			'toto' => $toto,
			'goal' => $goal,
			'diff' => $diff,
			'score' => $score,
			'match_draw' => $match_draw,
			'match_home_wins' => $match_home_wins,
			'match_away_wins' => $match_away_wins,
		);
		
		$score = apply_filters( 'footballpool_score_calc_function_pre', $score, $scoring_vars );
		
		if ( $do_calc ) {
			// no special behavior (like score = '' or score = 0), now calc the score
			$score = 0;
			// check for toto result
			if ( $this->is_toto_result( $home, $away, $user_home, $user_away ) == true ) {
				// check for exact match
				if ( $home == $user_home && $away == $user_away ) {
					$full_score = 1;
					$score = $full;
				} else {
					$toto_score = 1;
					$score = $toto;
				}
			}
			// check for goal bonus
			if ( $home == $user_home ) {
				$score += $goal;
				$goal_bonus++;
			}
			if ( $away == $user_away ) {
				$score += $goal;
				$goal_bonus++;
			}
			// check for goal diff bonus (only awarded when not a full score and not a draw)
			if ( ! $full_score && $match_draw === false && ( $home - $user_home ) == ( $away - $user_away ) ) {
				$goal_diff_bonus = 1;
				$score += $diff;
			}
			
			if ( $joker == 1 && $this->has_jokers ) $score *= $joker_multiplier;
		}
		
		$score = array( 
						'score' => $score,
						'full' => $full_score,
						'toto' => $toto_score,
						'goal_bonus' => $goal_bonus,
						'goal_diff_bonus' => $goal_diff_bonus
					);
		
		$score = apply_filters( 'footballpool_score_calc_function_post', $score, $scoring_vars );
		return $score;
	}
	
	private function get_score_table_option_name() {
		return sprintf( 'scorehistory_table_s%s', $this->season );
	}
	
	private function format_score_table( $score_table ) {
		return sprintf( $score_table, $this->season );
	}
	
	public function set_score_table_by_nr( $nr ) {
		$table_name = ( $nr == 1 ) ? FOOTBALLPOOL_SCORE_TABLE1_FORMAT : FOOTBALLPOOL_SCORE_TABLE2_FORMAT;
		$table_name = $this->format_score_table( $table_name );
		$this->set_score_table( $table_name );
	}
	
	public function set_score_table( $table_name ) {
		Football_Pool_Utils::set_fp_option( $this->get_score_table_option_name(), $table_name );
	}
	
	public function get_score_table( $get_current = true ) {
		$score_table = Football_Pool_Utils::get_fp_option( $this->get_score_table_option_name() );
		if ( ! $get_current ) {
			// If we need the non-active table, then determine which is the active one and return the other.
			if ( $score_table == $this->format_score_table( FOOTBALLPOOL_SCORE_TABLE1_FORMAT ) ) {
				$score_table = $this->format_score_table( FOOTBALLPOOL_SCORE_TABLE2_FORMAT );
			} else {
				$score_table = $this->format_score_table( FOOTBALLPOOL_SCORE_TABLE1_FORMAT );
			}
		}
		return $score_table;
	}
	
	public function user_name( $user_id ) {
		return $this->user_info( $user_id, 'display_name' );
	}
	
	public function user_email( $user_id ) {
		return $this->user_info( $user_id, 'email' );
	}
	
	private function user_info( $user_id, $info ) {
		if ( array_key_exists( $user_id, $this->pool_users ) ) {
			$user_info = $this->pool_users[$user_id][$info];
		} else {
			$user_info = __( 'unknown', 'football-pool' );
		}
		return apply_filters( "footballpool_user_info_{$info}", $user_info, $user_id );
	}
	
	private function get_pool_user_info( $pool_id ) {
		$cache_key = "fp_user_info_pool_{$pool_id}";
		$user_info = wp_cache_get( $cache_key );
		if ( $user_info === false ) {
			if ( defined( 'FOOTBALLPOOL_ALL_WP_USERS' ) ) {
				// all users
				$users = get_users();
				$user_info = array();
				foreach ( $users as $user ) {
					$user_info[$user->ID] = array(
												'user_id' => $user->ID,
												'display_name' => $user->display_name,
												'user_email' => $user->user_email,
											);
				}
			} else {
				// only active pool users
				$rows = $this->get_users( 0 );
				$user_info = array();
				foreach ( $rows as $row ) {
					$user_info[$row['user_id']] = array(
													'user_id' => $row['user_id'],
													'display_name' => $row['user_name'],
													'user_email' => $row['email'],
													);
				}
			}
			wp_cache_set( $cache_key, $user_info );
		}
		
		return $user_info;
	}
	
	public function get_avatar( $user_id, $size = 'small', $wrap = true ) {
		if ( FOOTBALLPOOL_NO_AVATAR ) return '';
		
		if ( ! is_int( $size ) ) {
			switch ( $size ) {
				case 'large':
					$size = FOOTBALLPOOL_LARGE_AVATAR;
					break;
				case 'medium':
					$size = FOOTBALLPOOL_MEDIUM_AVATAR;
					break;
				case 'small':
				default:
					$size = FOOTBALLPOOL_SMALL_AVATAR;
			}
		}
		
		$avatar = get_avatar( $user_id, $size );
		if ( $wrap )
			return sprintf( '<span class="fp-avatar">%s</span>', $avatar );
		else
			return $avatar;
	}
	
	public function get_users( $league ) {
		global $wpdb;
		$prefix = FOOTBALLPOOL_DB_PREFIX;
		
		$sql = "SELECT u.ID AS user_id, u.display_name AS user_name, u.user_email AS email, ";
		$sql .= ( $this->has_leagues ? "lu.league_id, " : "" );
		$sql .= "0 AS `points`, 0 AS `full`, 0 AS `toto`, 0 AS `bonus` FROM {$wpdb->users} u ";
		if ( $this->has_leagues ) {
			$sql .= "INNER JOIN {$prefix}league_users lu 
						ON ( u.ID = lu.user_id" . ( $league > 1 ? ' AND lu.league_id = ' . $league : '' ) . " ) ";
			$sql .= "INNER JOIN {$prefix}leagues l ON ( lu.league_id = l.id ) ";
		} else {
			$sql .= "LEFT OUTER JOIN {$prefix}league_users lu ON ( lu.user_id = u.ID ) ";
			$sql .= "WHERE ( lu.league_id <> 0 OR lu.league_id IS NULL ) ";
		}
		$sql .= "ORDER BY user_name ASC";
		return $wpdb->get_results( $sql, ARRAY_A );
	}
	
	public function user_is_player( $user_id ) {
		global $wpdb;
		$prefix = FOOTBALLPOOL_DB_PREFIX;
		
		if ( $this->has_leagues ) {
			$sql = $wpdb->prepare( "SELECT COUNT( * ) FROM {$prefix}league_users lu
									INNER JOIN {$wpdb->users} u ON ( u.ID = lu.user_id )
									WHERE u.ID = %d AND lu.league_id <> 0"
									, $user_id );
		} else {
			$sql = $wpdb->prepare( "SELECT COUNT( * ) FROM {$prefix}league_users lu
									RIGHT OUTER JOIN {$wpdb->users} u ON ( u.ID = lu.user_id )
									WHERE u.ID = %d AND ( lu.league_id <> 0 OR lu.league_id IS NULL )"
									, $user_id );
		}
		
		return ( $wpdb->get_var( $sql ) == 1 );
	}
	
	// returns null if no leagues are available or user does not exist
	public function get_league_for_user( $user_id ) {
		global $wpdb;
		$prefix = FOOTBALLPOOL_DB_PREFIX;
		
		if ( $this->has_leagues ) {
			$sql = $wpdb->prepare( "SELECT league_id FROM {$prefix}league_users WHERE user_id = %d", $user_id );
			$league = $wpdb->get_var( $sql );
		} else {
			$league = null;
		}
		
		return (int) $league;
	}
	
	public function get_user_score( $user, $ranking_id = FOOTBALLPOOL_RANKING_DEFAULT, $score_date = '' ) {
		global $wpdb;
		$prefix = FOOTBALLPOOL_DB_PREFIX;
		
		$sql = $wpdb->prepare( 
						sprintf( "SELECT total_score FROM {$prefix}{$this->scorehistory} 
								WHERE user_id = %%d AND ranking_id = %%d 
								AND ( %s score_date <= %%s )
								ORDER BY score_order DESC LIMIT 1"
								, ( $score_date == '' ? '1 = 1 OR' : '' ) 
						) , $user, $ranking_id, $score_date );
		return $wpdb->get_var( $sql ); // return null if nothing found
	}
	
	public function get_user_rank( $user, $ranking_id = FOOTBALLPOOL_RANKING_DEFAULT, $score_date = '' ) {
		global $wpdb;
		$prefix = FOOTBALLPOOL_DB_PREFIX;
		
		$sql = $wpdb->prepare( 
						sprintf( "SELECT ranking FROM {$prefix}{$this->scorehistory} 
								WHERE user_id = %%d AND ranking_id = %%d 
								AND ( %s score_date <= %%s )
								ORDER BY score_order DESC LIMIT 1"
								, ( $score_date == '' ? '1 = 1 OR' : '' ) 
						) , $user, $ranking_id, $score_date );
		return $wpdb->get_var( $sql ); // return null if nothing found
	}
	
	// use league=0 to include all users
	public function get_ranking_from_score_history( 
									$league, 
									$ranking_id = FOOTBALLPOOL_RANKING_DEFAULT,
									$score_date = '' ) {
		global $wpdb;
		$prefix = FOOTBALLPOOL_DB_PREFIX;
		
		$date_switch = ( $score_date == '' ) ? '1 = 1 OR ' : '';
		$league_switch = ( $league <= FOOTBALLPOOL_LEAGUE_ALL ) ? '1 = 1 OR' : '' ;
		
		$sql = "SELECT 
					s.ranking
					, u.ID AS user_id, u.display_name AS user_name, u.user_email AS email
					, s.total_score AS points, s.score AS last_score ";
		if ( $this->has_leagues ) $sql .= ", lu.league_id ";
		$sql .= "FROM {$prefix}{$this->scorehistory} AS s
				JOIN (
					SELECT user_id, MAX( score_order ) AS last_row
					FROM {$prefix}{$this->scorehistory}
					WHERE ranking_id = %d AND ( {$date_switch} score_date <= %s ) ";
		$sql .= "GROUP BY user_id
				) AS s2 ON ( s2.user_id = s.user_id AND s2.last_row = s.score_order )
				JOIN {$wpdb->users} u ON ( u.ID = s.user_id )";
		if ( $this->has_leagues ) {
			$sql .= "INNER JOIN {$prefix}league_users lu 
						ON ( u.ID = lu.user_id
							AND ( {$league_switch} lu.league_id = %d ) ) ";
			$sql .= "INNER JOIN {$prefix}leagues l ON ( lu.league_id = l.id ) ";
		} else {
			$sql .= "LEFT OUTER JOIN {$prefix}league_users lu ON ( lu.user_id = u.ID ) ";
		}
		$sql .= "WHERE s.ranking_id = %d  AND ( {$date_switch} score_date <= %s ) ";
		$sql .= "ORDER BY s.ranking ASC";
		if ( $this->has_leagues ) {
			$sql = $wpdb->prepare( $sql, $ranking_id, $score_date, $league, $ranking_id, $score_date );
		} else {
			$sql = $wpdb->prepare( $sql, $ranking_id, $score_date, $ranking_id, $score_date );
		}
		
		return $sql;
	}
	
	public function get_pool_ranking_limited( $league, $num_users
											, $ranking_id = FOOTBALLPOOL_RANKING_DEFAULT
											, $score_date = '' ) {
		// if score_date is empty we can get the data from the WP cache
		if ( $score_date == '' ) {
			$ranking = array_slice( $this->get_pool_ranking( $league, $ranking_id ), 0, $num_users );
		} else {
			global $wpdb;
			$sql = $this->get_ranking_from_score_history( $league, $ranking_id, $score_date );
			$sql = $wpdb->prepare( "{$sql} LIMIT %d", $num_users );
			$rows = $wpdb->get_results( $sql, ARRAY_A );
			$ranking = array();
			$i = 1;
			foreach( $rows as $row ) {
				$row['ranking'] = $i++;
				$ranking[] = $row;
			}
		}
		
		return apply_filters( 'footballpool_get_ranking_limited', $ranking );
	}
	
	public function get_pool_ranking( $league_id, $ranking_id = FOOTBALLPOOL_RANKING_DEFAULT ) {
		$cache_key = "fp_get_pool_ranking_r{$ranking_id}_l{$league_id}";
		$rows = wp_cache_get( $cache_key );
		
		if ( $rows === false ) {
			global $wpdb;
			$sql = $this->get_ranking_from_score_history( $league_id, $ranking_id );
			$rows = $wpdb->get_results( $sql, ARRAY_A );
			$ranking = array();
			$i = 1;
			foreach( $rows as $row ) {
				$row['ranking'] = $i++;
				$ranking[] = $row;
			}
			$rows = apply_filters( 'footballpool_get_ranking', $ranking );
			wp_cache_set( $cache_key, $rows );
		}
		
		return $rows;
	}
	
	public function get_prediction_count_per_user( $users, $ranking_id = FOOTBALLPOOL_RANKING_DEFAULT ) {
		global $wpdb;
		$prefix = FOOTBALLPOOL_DB_PREFIX;
		
		$num_predictions = array();
		
		if ( is_array( $users ) && count( $users ) > 0 ) {
			$users = implode( ',', $users );
			$users = "WHERE p.user_id IN ( {$users} )";
		} else {
			$users = '';
		}
		
		// matches
		if ( $ranking_id == FOOTBALLPOOL_RANKING_DEFAULT ) {
			$sql = "SELECT p.user_id, COUNT( * ) AS num_predictions 
					FROM {$prefix}predictions p
					{$users} GROUP BY p.user_id";
		} else {
			$sql = "SELECT p.user_id, COUNT( * ) AS num_predictions 
					FROM {$prefix}predictions p
					JOIN {$prefix}rankings_matches r ON 
						( r.match_id = p.match_id AND r.ranking_id = {$ranking_id} ) 
					{$users} GROUP BY p.user_id";
		}
		$rows = $wpdb->get_results( $sql, ARRAY_A );
		
		foreach ( $rows as $row ) {
			$num_predictions[$row['user_id']] = (int) $row['num_predictions'];
		}
		
		// questions
		if ( $ranking_id == FOOTBALLPOOL_RANKING_DEFAULT ) {
			$sql = "SELECT p.user_id, COUNT( * ) AS num_predictions 
					FROM {$prefix}bonusquestions_useranswers p
					{$users} GROUP BY p.user_id";
		} else {
			$sql = "SELECT p.user_id, COUNT( * ) AS num_predictions 
					FROM {$prefix}bonusquestions_useranswers p
					JOIN {$prefix}rankings_bonusquestions r ON 
						( r.question_id = p.question_id AND r.ranking_id = {$ranking_id} ) 
					{$users} GROUP BY p.user_id";
		}
		$rows = $wpdb->get_results( $sql, ARRAY_A );
		
		foreach ( $rows as $row ) {
			if ( array_key_exists( $row['user_id'], $num_predictions) ) {
				$num_predictions[$row['user_id']] += (int) $row['num_predictions'];
			} else {
				$num_predictions[$row['user_id']] = (int) $row['num_predictions'];
			}
		}
		
		// return resulting array of user ids with their total number of predictions
		return $num_predictions;
	}
	
	public function print_pool_ranking( $league, $user, $ranking_id = FOOTBALLPOOL_RANKING_DEFAULT
										, $users, $ranking, $type = 'page', $num_users = null ) {
		$output = '';
		
		// get number of predictions per user
		$predictions = $this->get_prediction_count_per_user( $users, $ranking_id );
		
		$userpage = Football_Pool::get_page_link( 'user' );
		$all_user_view = ( $type == 'page' ) && ( $league == FOOTBALLPOOL_LEAGUE_ALL ) && $this->has_leagues;
		$i = 1;
		
		// define templates
		$template_start = sprintf( '<table class="pool-ranking ranking-%s">', $type );
		$template_start = apply_filters( 'footballpool_ranking_template_start'
										, $template_start, $league, $user, $ranking_id, $all_user_view, $type );
		
		$template_end = '</table>';
		$template_end = apply_filters( 'footballpool_ranking_template_end'
										, $template_end, $league, $user, $ranking_id, $all_user_view, $type );
		
		if ( $all_user_view ) {
			$ranking_template = '<tr class="%css_class%">
									<td class="user-rank">%rank%.</td>
									<td class="user-name"><a href="%user_link%">%user_name%</a></td>
									<td class="user-score ranking score">%points%</td>
									<td class="user-league">%league_image%</td>
									</tr>';
		} else {
			$ranking_template = '<tr class="%css_class%">
									<td class="user-rank">%rank%.</td>
									<td class="user-name"><a href="%user_link%">%user_name%</a></td>
									<td class="user-score ranking score">%points%</td>
									</tr>';
		}
		$ranking_template = apply_filters( 'footballpool_ranking_ranking_row_template'
											, $ranking_template, $all_user_view, $type );
		
		// define the start and end template params
		$template_params = array();
		$template_params = apply_filters( 'footballpool_ranking_template_params'
										, $template_params, $league, $user, $ranking_id, $type );
		
		$output .= Football_Pool_Utils::placeholder_replace( $template_start, $template_params );
		
		if ( $num_users === null || ( is_int( $num_users ) && count( $ranking ) < $num_users ) ) {
			// add users to ranking output that are not yet in the scorehistory table
			$l_users = $r_users = array();
			$rank_nr = 1;
			$league_users = $this->get_users( $league );
			foreach ( $league_users as $l_user ) $l_users[] = $l_user['user_id'];
			foreach ( $ranking as $rank ) {
				$r_users[] = $rank['user_id'];
				$rank_nr++;
			}
			$extra_users = array_diff( $l_users, $r_users );
			foreach ( $league_users as $l_user ) {
				if ( in_array( $user['user_id'], $extra_users ) ) {
					$ranking[] = array(
									'ranking' => $rank_nr++,
									'user_id' => $l_user['user_id'],
									'user_name' => $l_user['user_name'],
									'email' => $l_user['email'],
									'points' => 0,
									'last_score' => 0,
									'league_id' => $league
									);
				}
			}
			
			if ( $num_users !== null ) $ranking = array_slice( $ranking, 0, $num_users );
		}
		
		// final chance to change the ranking before printing it
		$ranking = apply_filters( 'footballpool_print_ranking_ranking', $ranking );
		
		$ranking_count = count( $ranking );
		foreach ( $ranking as $row ) {
			$class = ( $i % 2 != 0 ? 'odd' : 'even' );
			if ( $all_user_view ) $class .= ' league-' . $row['league_id'];
			if ( $row['user_id'] == $user ) $class .= ' currentuser';
			
			// define the template param values
			$ranking_template_params = array(
				'rank' => $row['ranking'],
				'user_id' => $row['user_id'],
				'user_name' => Football_Pool_Utils::xssafe( $this->user_name( $row['user_id'] ) ),
				'user_link' => esc_url( add_query_arg( array( 'user' => $row['user_id'] ), $userpage ) ),
				'user_avatar' => $this->get_avatar( $row['user_id'], 'medium' ),
				'num_predictions' => array_key_exists( $row['user_id'], $predictions ) ? $predictions[$row['user_id']] : 0,
				'points' => $row['points'],
				'league_image' => ( isset( $row['league_id'] ) ? $this->league_image( $row['league_id'] ) : '' ),
				'league_name' => ( isset( $row['league_id'] ) ? $this->league_name( $row['league_id'] ) : '' ),
				'css_class' => $class,
				'last_score' => ( isset( $row['last_score'] ) ? $row['last_score'] : '' ),
				'ranking_row_number' => $i++,
				'ranking_count' => $ranking_count,
			);
			$ranking_template_params = apply_filters( 'footballpool_ranking_ranking_row_params'
													, $ranking_template_params, $league, $user, $ranking_id, $all_user_view, $type, $row );
			
			$output .= Football_Pool_Utils::placeholder_replace( $ranking_template, $ranking_template_params );
		}
		$output .= Football_Pool_Utils::placeholder_replace( $template_end, $template_params );
		
		return $output;
	}
	
	public function get_rankings( $which = 'all' ) {
		$only_user_defined = ( $which == 'user defined' || $which == 'user_defined' );
		if ( $only_user_defined === true ) {
			$cache_key = FOOTBALLPOOL_CACHE_RANKINGS_USERDEFINED;
		} else {
			$cache_key = FOOTBALLPOOL_CACHE_RANKINGS_ALL;
		}
		
		$rankings = wp_cache_get( $cache_key );
		
		if ( $rankings === false ) {
			global $wpdb;
			$prefix = FOOTBALLPOOL_DB_PREFIX;
			
			$filter = $only_user_defined ? 'WHERE user_defined = 1' : '';
			
			$sql = "SELECT `id`, `name`, `user_defined`, `calculate` 
					FROM `{$prefix}rankings` {$filter} ORDER BY `user_defined` ASC, `name` ASC";
			$rows = $wpdb->get_results( $sql, ARRAY_A );
			
			$rankings = array();
			foreach ( $rows as $row ) {
				$rankings[$row['id']] = $row;
			}
			wp_cache_set( $cache_key, $rankings );
		}
		
		return $rankings;
	}
	
	public function get_ranking_by_id( $id ) {
		global $wpdb;
		$prefix = FOOTBALLPOOL_DB_PREFIX;
		
		$sql = $wpdb->prepare( "SELECT `name`, `user_defined`, `calculate` FROM `{$prefix}rankings` WHERE `id` = %d", $id );
		return $wpdb->get_row( $sql, ARRAY_A ); // returns null if no ranking found
	}
	
	public function get_ranking_matches( $id ) {
		global $wpdb;
		$prefix = FOOTBALLPOOL_DB_PREFIX;
		
		$sql = $wpdb->prepare( "SELECT `match_id` FROM `{$prefix}rankings_matches` 
								WHERE `ranking_id` = %d", $id );
		return $wpdb->get_results( $sql, ARRAY_A ); // returns null if no ranking found
	}
	
	public function get_ranking_questions( $id ) {
		global $wpdb;
		$prefix = FOOTBALLPOOL_DB_PREFIX;
		
		$sql = $wpdb->prepare( "SELECT question_id FROM {$prefix}rankings_bonusquestions 
								WHERE ranking_id = %d", $id );
		return $wpdb->get_results( $sql, ARRAY_A ); // returns null if no ranking found
	}
	
	public function league_name( $id ) {
		if ( $this->has_leagues && ! empty( $this->leagues[$id]['league_name'] ) ) {
			return $this->leagues[$id]['league_name'];
		} else {
			return '';
		}
	}
	
	private function league_image( $id ) {
		if ( $this->has_leagues && ! empty( $this->leagues[$id]['image'] ) ) {
			$path = '';
			$img = $this->leagues[$id]['image'];
			if ( stripos( $img, 'http://' ) !== 0 && stripos( $img, 'https://' ) !== 0 && stripos( $img, '//' ) !== 0 ) {
				$path = trailingslashit( FOOTBALLPOOL_UPLOAD_URL . 'leagues' );
			}
			$img = sprintf( '<img src="%s" alt="%s" title="%s" />'
							, $path . $img
							, Football_Pool_Utils::xssafe( $this->leagues[$id]['league_name'] )
							, Football_Pool_Utils::xssafe( $this->leagues[$id]['league_name'] )
						);
		} else {
			$img = '';
		}
		return $img;
	}
	
	public function get_leagues( $only_user_defined = false ) {
		if ( $only_user_defined === true ) {
			$cache_key = FOOTBALLPOOL_CACHE_LEAGUES_ALL;
		} else {
			$cache_key = FOOTBALLPOOL_CACHE_LEAGUES_USERDEFINED;
		}
		$leagues = wp_cache_get( $cache_key );
		
		if ( $leagues === false ) {
			global $wpdb;
			$prefix = FOOTBALLPOOL_DB_PREFIX;
			
			$filter = $only_user_defined ? 'WHERE user_defined = 1' : '';
			
			$sql = "SELECT id AS league_id, name AS league_name, user_defined, image 
					FROM {$prefix}leagues {$filter} ORDER BY user_defined ASC, name ASC";
			$rows = $wpdb->get_results( $sql, ARRAY_A );
			
			$leagues = array();
			foreach ( $rows as $row ) {
				$leagues[$row['league_id']] = $row;
			}
			wp_cache_set( $cache_key, $leagues );
		}
		
		return $leagues;
	}
	
	public function league_filter( $league = 0, $select = 'league' ) {
		$output = '';
		
		if ( $this->has_leagues ) {
			$options = array();
			foreach ( $this->leagues as $row ) {
				$options[ $row['league_id'] ] = Football_Pool_Utils::xssafe( $row['league_name'] );
			}
			$output .= Football_Pool_Utils::select( $select, $options, $league, '', 'league-select' );
		}
		
		return $output;
	}
	
	public function league_select( $league = 0, $select = 'league' ) {
		$output = '';
		
		if ( $this->has_leagues ) {
			$output .= sprintf('<select name="%s" id="%s">', $select, $select);
			$output .= '<option value="0"></option>';
			foreach ( $this->leagues as $row ) {
				if ( $row['user_defined'] == 1 ) {
					$output .= sprintf( '<option value="%d"%s>%s</option>'
										, $row['league_id']
										, ( $row['league_id'] == $league ? ' selected="selected"' : '' )
										, Football_Pool_Utils::xssafe( $row['league_name'] )
								);
				}
			}
			$output .= '</select>';
		}
		return $output;
	}
	
	public function update_league_for_user( $user_id, $new_league_id, $old_league = 'update league' ) {
		global $wpdb;
		$prefix = FOOTBALLPOOL_DB_PREFIX;
		
		if ( $old_league == 'no update' ) {
			$sql = $wpdb->prepare( "INSERT INTO {$prefix}league_users ( user_id, league_id ) 
									VALUES ( %d, %d )
									ON DUPLICATE KEY UPDATE league_id = league_id", 
									$user_id, $new_league_id
								);
		} else {
			$sql = $wpdb->prepare( "INSERT INTO {$prefix}league_users ( user_id, league_id ) 
									VALUES ( %d, %d )
									ON DUPLICATE KEY UPDATE league_id = %d", 
									$user_id, $new_league_id, $new_league_id
								);
		}
		$wpdb->query( $sql );
	}
	
	public function get_bonus_questions_for_user( $user_id = 0, $question_ids = array(), $only_non_linked = false ) {
		if ( $user_id == 0 ) return array();
		
		global $wpdb;
		$prefix = FOOTBALLPOOL_DB_PREFIX;
		
		$ids = $non_linked = '';
		if ( is_array( $question_ids ) && count( $question_ids ) > 0 ) {
			$ids = ' AND q.id IN ( ' . implode( ',', $question_ids ) . ' ) ';
		}
		if ( $only_non_linked ) {
			$non_linked = 'WHERE q.match_id = 0';
		}
		// also include user answers
		$sql = $wpdb->prepare( "SELECT 
									q.id, q.question, a.answer, 
									q.points, a.points AS user_points, 
									q.answer_before_date AS question_date, 
									DATE_FORMAT( q.score_date, '%%Y-%%m-%%d %%H:%%i' ) AS score_date, 
									DATE_FORMAT( q.answer_before_date, '%%Y-%%m-%%d %%H:%%i' ) AS answer_before_date, 
									q.match_id, a.correct,
									qt.type, qt.options, qt.image, qt.max_answers
								FROM {$prefix}bonusquestions q 
								INNER JOIN {$prefix}bonusquestions_type qt
									ON ( q.id = qt.question_id {$ids})
								LEFT OUTER JOIN {$prefix}bonusquestions_useranswers a
									ON ( a.question_id = q.id AND a.user_id = %d )
								{$non_linked}
								ORDER BY q.answer_before_date ASC",
							$user_id
						);
		
		$rows = $wpdb->get_results( $sql, ARRAY_A );
		$questions = array();
		
		$this->has_bonus_questions = ( count( $rows ) > 0 );
		
		if ( $this->has_bonus_questions ) {
			$i = 0;
			foreach ( $rows as $row ) {
				$questions[$i] = $row;
				$ts = new DateTime( $row['question_date'] );
				$ts = $ts->format( 'U' );
				$questions[$i]['question_timestamp'] = $ts;
				$i++;
			}
		}
		
		return apply_filters( 'footballpool_bonusquestions_for_user', $questions, $user_id );
	}
	
	private function get_number_of_bonusquestions() {
		$cache_key = 'fp_num_questions';
		$num_questions = wp_cache_get( $cache_key );
		if ( $num_questions === false ) {
			global $wpdb;
			$prefix = FOOTBALLPOOL_DB_PREFIX;
			$sql = "SELECT COUNT( * ) FROM {$prefix}bonusquestions";
			$num_questions = $wpdb->get_var( $sql );
			wp_cache_set( $cache_key, $num_questions );
		}
		
		return $num_questions;
	}
	
	// returns array of questions
	public function get_bonus_questions() {
		$question_info = wp_cache_get( FOOTBALLPOOL_CACHE_QUESTIONS );
		
		if ( $question_info === false ) {
			global $wpdb;
			$prefix = FOOTBALLPOOL_DB_PREFIX;
		
			$sql = "SELECT 
						q.id, q.question, q.answer, q.points, q.answer_before_date AS question_date, 
						DATE_FORMAT( q.score_date, '%Y-%m-%d %H:%i' ) AS score_date, 
						DATE_FORMAT( q.answer_before_date, '%Y-%m-%d %H:%i' ) AS answer_before_date, q.match_id,
						qt.type, qt.options, qt.image, qt.max_answers
					FROM {$prefix}bonusquestions q 
					INNER JOIN {$prefix}bonusquestions_type qt
						ON ( q.id = qt.question_id )
					ORDER BY q.answer_before_date ASC";
		
			$rows = $wpdb->get_results( $sql, ARRAY_A );
			$this->has_bonus_questions = ( count( $rows ) > 0 );
			
			$question_info = array();
			foreach ( $rows as $row ) {
				$i = (int) $row['id'];
				$question_date = new DateTime( $row['question_date'] );
				$ts = $question_date->format( 'U' );
				
				$question_info[$i] = array();
				$question_info[$i]['id'] = $i;
				$question_info[$i]['question'] = $row['question'];
				$question_info[$i]['answer'] = $row['answer'];
				$question_info[$i]['points'] = $row['points'];
				// $question_info[$i]['question_date'] = $ts;
				$question_info[$i]['question_timestamp'] = $ts;
				$question_info[$i]['score_date'] = $row['score_date'];
				$question_info[$i]['answer_before_date'] = $row['answer_before_date'];
				$question_info[$i]['match_id'] = (int) $row['match_id'];
				$question_info[$i]['type'] = (int) $row['type'];
				$question_info[$i]['options'] = $row['options'];
				$question_info[$i]['image'] = $row['image'];
				$question_info[$i]['max_answers'] = $row['max_answers'];
			}
			
			$question_info = apply_filters( 'footballpool_questions', $question_info );
			wp_cache_set( FOOTBALLPOOL_CACHE_QUESTIONS, $question_info );
		}
		
		return $question_info;
	}
	
	public function get_bonus_question( $id ) {
		return $this->get_bonus_question_info( $id );
	}
	
	public function get_bonus_question_info( $id ) {
		$info = false;
		$questions = $this->get_bonus_questions();
		if ( is_array( $questions ) && array_key_exists( $id, $questions ) ) {
			$info = $questions[$id];
			$info['question_is_editable'] = $this->question_is_editable( $info['question_timestamp'] );
		}
		return $info;
	}
	
	private function bonus_question_form_input( $question ) {
		switch ( $question['type'] ) {
			case 2: // multiple 1, radio
				return $this->bonus_question_multiple( $question, 'radio' );
			case 5: // multiple 1, select
				return $this->bonus_question_multiple( $question, 'select' );
			case 3: // multiple n
				return $this->bonus_question_multiple( $question, 'checkbox' );
			case 4: // multiline text
				return $this->bonus_question_single( $question, 'multiline' );
			case 1: // text
			default:
				return $this->bonus_question_single( $question );
		}
	}
	
	private function bonus_question_single( $question, $multiline = false ) {
		if ( $multiline === 'multiline' ) {
			return sprintf( '<textarea class="bonus multiline" name="_bonus_%d">%s</textarea>'
							, esc_attr( $question['id'] )
							, esc_attr( $question['answer'] )
					);
		} else {
			return sprintf( '<input maxlength="200" class="bonus" name="_bonus_%d" type="text" value="%s" />'
							, esc_attr( $question['id'] )
							, esc_attr( $question['answer'] )
					);
		}
	}
	
	// type = radio / checkbox / select
	private function bonus_question_multiple( $question, $type = 'radio' ) {
		$options = explode( ';', $question['options'] );
		// strip out any empty options
		// $options = array_filter( $options, function( $option ) { 
						// return ( str_replace( array( ' ', "\t", "\r", "\n" ), '', $option ) != '' ); 
					// } );
		$temp = array();
		foreach ( $options as $option ) {
			if ( str_replace( array( ' ', "\t", "\r", "\n" ), '', $option ) != '' ) $temp[] = $option;
		}
		$options = $temp;
		// bail out if there are no options
		if ( count( $options ) == 0 ) return '';
		
		$output = '';
		if ( $type == 'select' || $type == 'dropdown' ) {
			// dropdown
			array_unshift( $options, '' );
			if ( $question['answer'] != '' ) array_shift( $options );
			$options = array_combine( $options, $options );
			$output .= '<div class="multi-select dropdown">';
			$output .= Football_Pool_Utils::select( '_bonus_' . esc_attr( $question['id'] ),
													$options, 
													Football_Pool_Utils::xssafe( $question['answer'] ) 
													);
			$output .= '</div>';
		} else {
			// radio or checkbox
			if ( $type == 'checkbox' && $question['max_answers'] > 0 ) {
				// add some javascript for the max number of answers a user may give
				$output .= sprintf( '<script>
									jQuery( document ).ready( function() { 
										FootballPool.set_max_answers( %d, %d ); 
									} );
									</script>'
									, $question['id']
									, $question['max_answers']
							);
			}
			
			$i = 1;
			$output .= '<ul class="multi-select">';
			foreach ( $options as $option ) {
				$js = sprintf( 'onclick="jQuery( \'#_bonus_%d_userinput\' ).val( \'\' )" ', $question['id'] );
				
				if ( $type == 'checkbox' ) {
					$checked = in_array( $option, explode( ';', $question['answer'] ) ) ? 'checked="checked" ' : '';
					$brackets = '[]';
					$user_input = '';
				} else {
					// @TODO: change this very hacky (and therefore undocumented) feature of adding a text input
					//        after a radio input
					if ( substr( $option, -2 ) == '[]' ) {
						$js = '';
						
						$option = substr( $option, 0, -2 );
						$len = strlen( $option );
						$checked = substr( $question['answer'], 0, $len ) == $option ? 'checked="checked" ' : '';
						
						$user_input_name = sprintf( '_bonus_%d_userinput', esc_attr( $question['id'] ) );
						$user_input_value = ( $checked ) ? substr( $question['answer'], $len + 1 ) : '';
						$user_input = sprintf( '<span> <input type="text" id="%1$s" name="%1$s" value="%2$s" onclick="jQuery( \'#_bonus_%3$d_%4$d\' ).attr( \'checked\', \'checked\' )" /></span>'
												, $user_input_name
												, $user_input_value
												, $question['id']
												, $i
											);
					} else {
						$user_input = '';
						$checked = ( $question['answer'] == $option ) ? 'checked="checked" ' : '';
					}
					$brackets = '';
				}
				
				$user_input_class = ( $user_input != '' ) ? ' class="user-input"' : '';

				$output .= sprintf( '<li><label%9$s><input %8$sid="_bonus_%2$d_%7$d" type="%1$s" name="_bonus_%2$d%5$s" value="%3$s" %4$s/><span class="multi-option"> %3$s</span></label>%6$s</li>'
									, $type
									, esc_attr( $question['id'] )
									, esc_attr( $option )
									, $checked
									, $brackets
									, $user_input
									, $i++
									, $js
									, $user_input_class
							);
			}
			
			$output .= '</ul>';
		}
		
		return $output;
	}
	
	public function print_bonus_question( $question, $nr, $is_user_page = false ) {
		// the question with optional image
		if ( is_int( $nr ) ) {
			$nr = sprintf( '<span class="nr">%d.</span> ', $nr );
		}
		$output = sprintf( '<div class="bonus" id="q%d"><p>%s%s</p>'
							, $question['id']
							, $nr, Football_Pool_Utils::xssafe( $question['question'] )
					);
		if ( $question['image'] != '' ) {
			$output .= sprintf( '<p class="bonus image"><img src="%s" alt="%s" /></p>'
								, Football_Pool_Utils::xssafe( $question['image'] )
								, __( 'photo question', 'football-pool' )
						);
		}
		
		$lock_time = ( $this->force_lock_time ) ? $this->lock_datestring : $question['answer_before_date'];
		// to local time
		if ( defined( 'FOOTBALLPOOL_QUESTIONDATETIME_FORMAT' ) ) {
			$question_date_format = FOOTBALLPOOL_QUESTIONDATETIME_FORMAT;
		} else {
			$question_date_format = sprintf( '%s %s'
											, get_option( 'date_format', FOOTBALLPOOL_DATE_FORMAT )
											, get_option( 'time_format', FOOTBALLPOOL_TIME_FORMAT )
										);
			
		}
		$lock_time = Football_Pool_Utils::date_from_gmt( $lock_time, $question_date_format );
		
		//todo: make question and match date format an option
		// $bonus_date_format = Football_Pool_Utils::get_fp_option( 'bonus_date_format' );
		// $lock_time = new DateTime( $lock_time );
		// $lock_time = $lock_time->format( $bonus_date_format );
		
		if ( $this->question_is_editable( $question['question_timestamp'] ) ) {
			if ( ! $is_user_page ) {
				$output .= sprintf( '<p>%s</p>', $this->bonus_question_form_input( $question ) );
				
				$output .= '<p>';
				
				// remind a player if there is only 1 day left to answer the question.
				$timestamp = ( $this->force_lock_time ? $this->lock_timestamp : $question['question_timestamp'] );
				if ( ( $timestamp - current_time( 'timestamp' ) ) <= ( 24 * 60 * 60 ) ) {
					$output .= sprintf( '<span class="bonus reminder">%s </span>', __( 'Important:', 'football-pool' ) );
				}
				$output .= sprintf( '<span class="bonus eindtijd" title="%s">%s ' . $lock_time . '</span>',
								__( 'answer this question before this date', 'football-pool' ),
								__( 'answer before', 'football-pool' )
						);
			}
		} else {
			$output .= sprintf( '<p class="bonus" id="bonus-%d">%s: ',
							$question['id'],
							__( 'answer', 'football-pool' )
					);
			if ( $question['type'] == 4 ) $output .= '<br>';
			if ( $question['answer'] != '' ) {
				$output .= nl2br( Football_Pool_Utils::xssafe( $question['answer'], null, false ) );
			} else {
				$output .= '<span class="no-answer"></span>';
			}
			$output .= '</p>';
			
			$output .= sprintf( '<p><span class="bonus eindtijd" title="%s">%s %s</span>',
							__( "it's is no longer possible to answer this question, or change your answer", 'football-pool' ),
							__( 'closed on', 'football-pool' ),
							$lock_time
					);
		}
		
		$points = $question['points'] == 0 ? __( 'variable', 'football-pool' ) : $question['points'];
		$output .= sprintf( '<span class="bonus points">%s %s'
							, $points
							, __( 'points', 'football-pool' ) 
					);
		if ( ! $this->question_is_editable( $question['question_timestamp'] ) ) {
			$output .= sprintf( '<a title="%s" href="%s">', 
								__( 'view other users answers', 'football-pool' )
								, esc_url(
									add_query_arg( 
										array( 'view' => 'bonusquestion', 'question' => $question['id'] ), 
										Football_Pool::get_page_link( 'statistics' )
									)
								) 
						);
			$output .= sprintf( '<img alt="%s" src="%sassets/images/charts.png" />',
								__( 'view other users answers', 'football-pool' ), FOOTBALLPOOL_PLUGIN_URL );
			$output .= '</a>';
		}
		$output .= '</span></p>';
		
		$output .= '</div>';
		
		return $output;
	}
	
	// updates the predictions for a submitted prediction form
	public function prediction_form_update( $id = null ) {
		global $current_user;
		wp_get_current_user();
		
		$msg = '';
		
		if ( $id == null || Football_Pool_Utils::post_int( '_fp_form_id' ) == $id ) {
			$user_is_player = $this->user_is_player( $current_user->ID );
			
			if ( $current_user->ID != 0 && $user_is_player
										&& Football_Pool_Utils::post_string( '_fp_action' ) == 'update' ) {
				$nonce = Football_Pool_Utils::post_string( FOOTBALLPOOL_NONCE_FIELD_BLOG );
				$success = ( wp_verify_nonce( $nonce, FOOTBALLPOOL_NONCE_BLOG ) !== false );
				if ( $success ) {
					$success = $this->update_predictions( $current_user->ID );
				}
				if ( $success ) {
					//todo: differentiate in messages (was there actually a save?)
					$msg = sprintf( '<p class="fp-notice updated">%s</p>'
									, __( 'Changes saved.', 'football-pool' )
							);
				} else {
					$msg = sprintf( '<p class="fp-notice error">%s</p>'
									, __( 'Something went wrong during the save. Check if you are still logged in. If the problems persist, then contact your webmaster.', 'football-pool' )
							);
				}
			}
		}
		
		return $msg;
	}
	
	private function update_bonus_user_answers( $questions, $answers, $user ) {
		global $wpdb;
		$prefix = FOOTBALLPOOL_DB_PREFIX;
		
		// first get the user's previous answers to questions
		$previous_answers = array();
		$sql = $wpdb->prepare( "SELECT question_id, answer 
								FROM {$prefix}bonusquestions_useranswers WHERE user_id = %d ORDER BY question_id ASC", $user );
		$rows = $wpdb->get_results( $sql, ARRAY_A );
		foreach ( $rows as $row ) {
			$previous_answers[$row['question_id']] = $row['answer'];
		}
		
		foreach ( $questions as $question ) {
			$do_update = true;
			$question_id = $question['id'];
			$answer = $answers[$question_id];
			
			if ( $this->question_is_editable( $question['question_timestamp'] ) && $answer != '' ) {
				$do_update = apply_filters( 'footballpool_prediction_update_question', $do_update, $user, $question_id, $answer );
				if ( $do_update ) {
					if ( array_key_exists( $question_id, $previous_answers ) ) {
						// question exists in previous answers, check if user wants to change the answer
						if ( $previous_answers[$question_id] != $answer ) {
							$sql = $wpdb->prepare( "UPDATE {$prefix}bonusquestions_useranswers SET answer = %s, points = 0
													WHERE user_id = %d AND question_id = %d"
													, $answer, $user, $question_id );
							$wpdb->query( $sql );
						}
					} else {
						// no answer yet, insert it
						$sql = $wpdb->prepare( "INSERT INTO {$prefix}bonusquestions_useranswers 
													( user_id, question_id, answer )
												VALUES ( %d, %d, %s )" 
												, $user, $question_id, $answer );
						$wpdb->query( $sql );
					}
				}
			}
		}
	}
	
	private function update_predictions( $user ) {
		do_action( 'footballpool_prediction_save_before', $user );
		
		// only allow logged in users and players in the pool to update their predictions
		if ( $user <= 0 || ! $this->user_is_player( $user ) ) return false;
		
		global $wpdb;
		$prefix = FOOTBALLPOOL_DB_PREFIX;
		
		$matches = new Football_Pool_Matches;
		$joker = 0;
		$log_time = current_time( 'mysql' );
		
		// only allow setting of joker if it wasn't used before on a played match
		$sql = $wpdb->prepare( "SELECT m.play_date
								FROM {$prefix}predictions p, {$prefix}matches m 
								WHERE p.match_id = m.id AND p.has_joker = 1 AND p.user_id = %d" 
								, $user
							);
		$play_date = $wpdb->get_var( $sql );
		if ( $play_date ) {
			$play_date = new DateTime( $play_date );
			$ts = $play_date->format( 'U' );
			if ( $matches->match_is_editable( $ts ) ) {
				$joker = $this->get_joker();
			}
		} else {
			$joker = $this->get_joker();
		}
		
		// first get the old predictions for this user
		$match_predictions = array();
		$sql = $wpdb->prepare( "SELECT match_id, home_score, away_score, has_joker 
								FROM {$prefix}predictions WHERE user_id = %d ORDER BY match_id ASC", $user );
		$rows = $wpdb->get_results( $sql, ARRAY_A );
		foreach ( $rows as $row ) {
			$match_predictions[$row['match_id']] = array( 
														'home_score' => $row['home_score'],
														'away_score' => $row['away_score'],
														'has_joker' => $row['has_joker'],
													);
		}
		
		// update predictions for all matches
		foreach ( $matches->matches as $row ) {
			$match = $row['id'];
			$home = Football_Pool_Utils::post_integer( '_home_' . $match, 'NULL' );
			$away = Football_Pool_Utils::post_integer( '_away_' . $match, 'NULL' );
			$set_joker = ( $joker == $match ? 1 : 0 );
			$do_update = true;
			
			if ( $row['match_is_editable'] ) {
				$do_update = apply_filters( 'footballpool_prediction_update_match'
											, $do_update, $user, $match, $home, $away, $set_joker );
				
				if ( $do_update ) {
					if ( is_integer( $home ) && is_integer( $away ) ) {
						if ( array_key_exists( $match, $match_predictions ) ) {
							// match exists in predictions, check if user wants to change the prediction
							if ( $match_predictions[$match]['home_score'] != $home
									|| $match_predictions[$match]['away_score'] != $away
									|| $match_predictions[$match]['has_joker'] != $set_joker ) {
								$sql = $wpdb->prepare( "UPDATE {$prefix}predictions SET
															home_score = %d, away_score = %d, has_joker = %d
														WHERE user_id = %d AND match_id = %d"
														, $home, $away, $set_joker, $user, $match );
								$wpdb->query( $sql );
							}
						} else {
							// no prediction yet, insert the prediction
							$sql = $wpdb->prepare( "INSERT INTO {$prefix}predictions
														( user_id, match_id, home_score, away_score, has_joker )
													VALUES ( %d, %d, %d, %d, %d )"
													, $user, $match, $home, $away, $set_joker );
							$wpdb->query( $sql );
						}
					} else {
						do_action( 'footballpool_prediction_save_match_no_prediction'
									, $user, $match, $home, $away, $set_joker );
						// fix for the multiple-joker-bug
						$sql = $wpdb->prepare( "UPDATE {$prefix}predictions
												SET has_joker = %d
												WHERE user_id = %d AND match_id = %d"
												, $set_joker, $user, $match
										);
						$wpdb->query( $sql );
					}
				}
			}
		}
		
		// prepare the answers for the bonusquestions update (get_bonus_questions also sets the has_bonus_questions var)
		$questions = $this->get_bonus_questions();
		if ( $this->has_bonus_questions ) {
			$answers = array();
			foreach ( $questions as $question ) {
				switch ( $question['type'] ) {
					case 3: // multiple n
						$user_answers = Football_Pool_Utils::post_string_array( '_bonus_' . $question['id'] );
						if ( $question['max_answers'] > 0 && count( $user_answers ) > $question['max_answers'] ) {
							// remove answers from the end of the array
							// (user is cheating or admin changed the max possible answers)
							while ( count( $user_answers ) > $question['max_answers'] ) {
								array_pop( $user_answers );
							}
						}
						$answers[$question['id']] = implode( ';', $user_answers );
						break;
					case 1: // text
					case 2: // multiple 1
					default:
						$answers[$question['id']] = Football_Pool_Utils::post_string( '_bonus_' . $question['id'] );
				}
				
				// add user input to answer (for multiple choice questions) if there is some input
				$user_input = Football_Pool_Utils::post_string( '_bonus_' . $question['id'] . '_userinput' );
				if ( $user_input != '' ) $answers[$question['id']] .= " {$user_input}";
			}
			
			// update bonus questions
			$this->update_bonus_user_answers( $questions, $answers, $user );
		}
		
		do_action( 'footballpool_prediction_save_after', $user );
		return true;
	}
	
	public function get_jokers() {
		$num_jokers = Football_Pool_Utils::get_fp_option( 'number_of_jokers', FOOTBALLPOOL_DEFAULT_JOKERS, 'int' );
		return apply_filters( 'footballpool_get_jokers', $num_jokers );
	}
	
	private function get_joker() {
		return Football_Pool_Utils::post_integer( '_joker' );
	}
	
	// outputs a prediction form for bonus questions.
	//    wrap:        (optional) if true, wrap the questions in its own form
	//    start_at_nr: (optional) the bonus question numbering will start at that number
	public function prediction_form_questions( $questions, $wrap = false, $id = 1, $start_at_nr = 1 ) {
		$output = '';
		if ( $this->has_bonus_questions ) {
			if ( $wrap ) $output .= $this->prediction_form_start( $id );
			
			$nr = $start_at_nr;
			foreach ( $questions as $question ) {
				if ( $question['match_id'] == 0 ) {
					$output .= $this->print_bonus_question( $question, $nr++ );
				}
			}
			
			if ( $nr > $start_at_nr ) {
				$output .= $this->save_button( 'questions', $id );
			}
			
			if ( $wrap ) $output .= $this->prediction_form_end( $id );
		}
		
		return apply_filters( 'footballpool_predictionform_questions_html', $output, $questions );
	}
	
	// outputs a prediction form for matches.
	// also includes linked questions (if any).
	//    wrap:        (optional) if true, wrap the matches in its own form
	//    id:          unique form id
	public function prediction_form_matches( $matches, $wrap = false, $id = 1, $type = 'matches' ) {
		$output = '';
		if ( $this->has_matches ) {
			
			if ( $wrap ) $output .= $this->prediction_form_start( $id );
			
			global $current_user;
			wp_get_current_user();
			
			$m = new Football_Pool_Matches;
			$output .= $m->print_matches_for_input( $matches, $id, $current_user->ID );
			
			if ( $this->has_jokers ) {
				$joker = $m->joker_value;
				$output .= sprintf( '<input type="hidden" id="_joker_%d" name="_joker" value="%d" />', $id, $joker );
			}
			
			if ( count( $matches ) > 0 ) {
				$output .= $this->save_button( $type, $id );
			}
			
			if ( $wrap ) $output .= $this->prediction_form_end( $id );
		}
		
		return $output;
	}
	
	public function prediction_form_start( $id = 1) {
		$action_url = '';//( is_page() ? get_page_link() : get_permalink() );
		$output = sprintf( '<form id="predictionform-%d" action="%s" method="post">'
							, $id, $action_url
					);
		$output .= wp_nonce_field( FOOTBALLPOOL_NONCE_BLOG, FOOTBALLPOOL_NONCE_FIELD_BLOG, true, false );
		$output .= sprintf( '<input type="hidden" name="_fp_form_id" value="%d" />', $id );
		return $output;
	}
	
	public function prediction_form_end( $id = 1 ) {
		return sprintf( '<input type="hidden" id="_action_%d" name="_fp_action" value="update" /></form>', $id );
	}
	
	public function print_bonus_question_for_user( $questions ) {
		$output = '';
		if ( ! is_array( $questions ) || count( $questions ) == 0 ) return $output;
		
		$nr = 1;
		$statspage = Football_Pool::get_page_link( 'statistics' );
		
		foreach ( $questions as $question ) {
			if ( $this->always_show_predictions || ! $this->question_is_editable( $question['question_timestamp'] ) ) {
				$output .= '<div class="bonus userview">';
				$output .= sprintf( '<p class="question"><span class="nr">%d.</span> %s</p>'
									, $nr++
									, Football_Pool_Utils::xssafe( $question['question'] )
							);
				$output .= '<span class="bonus points">';
				if ( $question['score_date'] ) {
					// standard points or alternate points as reward for question?
					$points = ( $question['user_points'] != 0 ) ? $question['user_points'] : $question['points'];
					$output .= sprintf( '%d %s ', 
										( $question['correct'] * $points ),
										__( 'points', 'football-pool' )
								);
				}
				$output .= sprintf( '<a title="%s" href="%s">', 
									__( 'view other users answers', 'football-pool' )
									, esc_url(
										add_query_arg( 
											array( 'view' => 'bonusquestion', 'question' => $question['id'] ), 
											$statspage
										)
									) 
							);
				$output .= sprintf( '<img alt="%s" src="%sassets/images/charts.png" />',
									__( 'view other users answers', 'football-pool' ), FOOTBALLPOOL_PLUGIN_URL );
				$output .= '</a></span>';
				$output .= sprintf( '<p>%s: %s</p>',
									__( 'answer', 'football-pool' ),
									( $question['answer'] != '' 
											? Football_Pool_Utils::xssafe( $question['answer'], null, false ) : '...' )
							);
				$output .= '</div>';
			}
		}
		
		return $output;
	}
	
	public function question_is_editable( $ts ) {
		if ( $this->force_lock_time ) {
			$editable = ( current_time( 'timestamp' ) < $this->lock_timestamp );
		} else {
			$diff = $ts - time();
			$editable = ( $diff > $this->lock_timestamp );
		}
		
		return $editable;
	}

	public function get_bonus_question_answers_for_users( $question = 0 ) {
		if ( $question == 0 ) return array();
		
		global $wpdb;
		$prefix = FOOTBALLPOOL_DB_PREFIX;
		
		$sql = "SELECT u.ID AS user_id, u.display_name AS name, a.answer, a.correct, a.points
				FROM {$prefix}bonusquestions_useranswers a 
				RIGHT OUTER JOIN {$wpdb->users} u
					ON ( a.question_id = %d AND a.user_id = u.ID ) ";
		if ( $this->has_leagues ) {
			$sql .= "INNER JOIN {$prefix}league_users lu ON ( u.ID = lu.user_id ) ";
			$sql .= "INNER JOIN {$prefix}leagues l ON ( lu.league_id = l.id ) ";
		} else {
			$sql .= "LEFT OUTER JOIN {$prefix}league_users lu ON ( lu.user_id = u.ID ) ";
			$sql .= "WHERE ( lu.league_id <> 0 OR lu.league_id IS NULL ) ";
		}
		$sql .= "ORDER BY u.display_name ASC";
		$sql = $wpdb->prepare( $sql, $question );
		$rows = $wpdb->get_results( $sql, ARRAY_A );
		return $rows;
	}
	
	public function save_button( $type = 'matches', $id = 0 ) {
		return sprintf( '<div class="buttonblock button-%s form-%d"><input type="submit" name="_submit" value="%s" /></div>'
						, $type
						, $id
						, __( 'Save', 'football-pool' )
				);
	}
}
