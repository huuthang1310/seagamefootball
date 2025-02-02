<?php
// Football Pool uses the Highcharts javascript API
class Football_Pool_Chart_Data {
	/************************************************
	 All the functions to get the data for the charts
	*************************************************/
	private $scorehistory;
	public function __construct() {
		$this->scorehistory = $this->get_score_table();
	}
	
	private function get_score_table() {
		$pool = new Football_Pool_Pool();
		return $pool->get_score_table();
	}
	
	public function predictions_pie_chart_data( $match, $ranking_id = FOOTBALLPOOL_RANKING_DEFAULT ) {
		global $wpdb;
		$prefix = FOOTBALLPOOL_DB_PREFIX;
		$sql = $wpdb->prepare( "SELECT
									  COUNT( IF( full = 1, 1, NULL ) ) AS scorefull
									, COUNT( IF( toto = 1, 1, NULL ) ) AS scoretoto
									, COUNT( IF( goal_bonus = 1, 
												IF( toto = 1, NULL, 1 ), 
												NULL ) 
									  ) AS goalbonus
									, COUNT( IF( goal_diff_bonus = 1, 1, NULL ) ) AS diffbonus
									, COUNT( user_id ) AS scoretotal
								FROM {$prefix}{$this->scorehistory} 
								WHERE `type` = %d AND ranking_id = %d
								GROUP BY source_id HAVING source_id = %d" 
								, FOOTBALLPOOL_TYPE_MATCH
								, $ranking_id
								, $match
						);
		$data = $wpdb->get_row( $sql, ARRAY_A );
		
		return apply_filters( 'footballpool_predictions_pie_chart_data', $data, $match, $ranking_id );
	}
	
	public function score_chart_data( $users = array(), $ranking_id = FOOTBALLPOOL_RANKING_DEFAULT ) {
		$data = array();
		
		if ( count( $users ) > 0 ) {
			global $wpdb;
			$prefix = FOOTBALLPOOL_DB_PREFIX;
			
			$user_ids = implode( ',', $users );
			
			$sql = "SELECT 
						  COUNT( IF( s.full = 1, 1, NULL ) ) AS scorefull
						, COUNT( IF( s.toto = 1, 1, NULL ) ) AS scoretoto
						, COUNT( IF( s.goal_bonus = 1, 1, NULL ) ) AS all_goal_bonus
						, COUNT( IF( s.goal_bonus = 1, IF( s.toto = 1, NULL, 1 ), NULL ) ) AS single_goal_bonus
						, COUNT( IF( s.goal_diff_bonus = 1, 1, NULL ) ) AS goal_diff_bonus
						, COUNT( s.source_id ) AS scoretotal
						, u.display_name AS user_name
						, u.ID AS user_id
					FROM {$prefix}{$this->scorehistory} s 
					INNER JOIN {$wpdb->users} u ON ( u.ID = s.user_id ) 
					WHERE s.ranking_id = {$ranking_id} AND s.type = %d AND s.user_id IN ( {$user_ids} ) 
					GROUP BY s.user_id";
			
			$rows = $wpdb->get_results( $wpdb->prepare( $sql, FOOTBALLPOOL_TYPE_MATCH ), ARRAY_A );
			if ( count( $rows ) > 0 ) $pool = new Football_Pool_Pool();
			foreach ( $rows as $row ) {
				$user_name = $pool->user_name( $row['user_id'] );
				$data[ $user_name ] = array(
											'scorefull'  => $row['scorefull'],
											'scoretoto'  => $row['scoretoto'],
											'scoretotal' => $row['scoretotal'],
											'goalbonus' => $row['single_goal_bonus'], // only counted when no toto score
											'goalbonus_all' => $row['all_goal_bonus'], // all goalbonus rewards
											'diffbonus' => $row['goal_diff_bonus'],
										);
			}
		}
		
		return apply_filters( 'footballpool_score_chart_data', $data, $users, $ranking_id );
	}
	
	public function bonus_question_for_users_pie_chart_data( $users = array(), 
															$ranking_id = FOOTBALLPOOL_RANKING_DEFAULT ) {
		$data = array();
		if ( count( $users ) > 0 ) {
			$pool = new Football_Pool_Pool();
			$questions = $pool->get_bonus_questions();
			$numquestions = count( $questions );
			
			global $wpdb;
			$prefix = FOOTBALLPOOL_DB_PREFIX;
			$users = implode( ',', $users );
			$sql = "SELECT
						  COUNT( IF( s.score > 0, 1, NULL ) ) AS bonuscorrect
						, COUNT( IF( s.score = 0, 1, NULL ) ) AS bonuswrong
						, COUNT( s.source_id ) AS bonustotal
						, u.display_name AS user_name
						, u.ID AS user_id
					FROM {$prefix}{$this->scorehistory} s
					INNER JOIN {$wpdb->users} u ON ( u.ID = s.user_id ) 
					WHERE s.ranking_id = {$ranking_id} AND s.type = %d AND s.user_id IN ( {$users} ) 
					GROUP BY s.user_id";
			
			$rows = $wpdb->get_results( $wpdb->prepare( $sql, FOOTBALLPOOL_TYPE_QUESTION ), ARRAY_A );
			foreach ( $rows as $row ) {
				$user_name = $pool->user_name( $row['user_id'] );
				$data[ $user_name ] = array(
											'bonustotal'   => $numquestions,
											'bonuscorrect' => $row['bonuscorrect'],
											'bonuswrong'   => $row['bonuswrong']
											);
			}
		}
		
		return $data;
	}

	public function bonus_question_pie_chart_data( $question ) {
		global $wpdb;
		$prefix = FOOTBALLPOOL_DB_PREFIX;
		
		$pool = new Football_Pool_Pool();
		$sql = "SELECT 
					COUNT( IF( ua.correct > 0, 1, NULL ) ) AS bonuscorrect, 
					COUNT( IF( ua.correct = 0, 1, NULL ) ) AS bonuswrong,
					COUNT( u.ID ) AS totalusers 
				FROM {$prefix}bonusquestions_useranswers AS ua 
				RIGHT OUTER JOIN {$wpdb->users} AS u
					ON ( u.ID = ua.user_id AND question_id = %d ) ";
		$sql = $wpdb->prepare( $sql, $question );
		$row = $wpdb->get_row( $sql, ARRAY_A );
		
		$data = array(
					'totalusers'   => $row['totalusers'],
					'bonuscorrect' => $row['bonuscorrect'],
					'bonuswrong'   => $row['bonuswrong']
					);

		return $data;
	}
	
	public function points_total_pie_chart_data( $user, $ranking_id = FOOTBALLPOOL_RANKING_DEFAULT ) {
		global $wpdb;
		$prefix = FOOTBALLPOOL_DB_PREFIX;

		$output = array();
		// get the user's score
		$sql = $wpdb->prepare( "SELECT total_score FROM {$prefix}{$this->scorehistory} 
								WHERE user_id = %d AND ranking_id = %d
								ORDER BY score_date DESC, source_id DESC, type DESC LIMIT 1", 
								$user, $ranking_id
							);
		$data = $wpdb->get_var( $sql );
		$output['total_score'] = ( $data != null ) ? $data : 0;
		// get the number of matches for which there are results
		$sql = $wpdb->prepare( "SELECT COUNT( * ) FROM {$prefix}{$this->scorehistory}
								WHERE type = %d AND user_id = %d AND ranking_id = %d"
								, FOOTBALLPOOL_TYPE_MATCH, $user, $ranking_id );
		$data = $wpdb->get_var( $sql );
		$num_matches = ( $data != null ) ? (int) $data : 0;
		
		// on a full score you get the fullpoints and two times the goal bonus
		$full = Football_Pool_Utils::get_fp_option( 'fullpoints', FOOTBALLPOOL_FULLPOINTS, 'int' ) +
				( 2 * Football_Pool_Utils::get_fp_option( 'goalpoints', FOOTBALLPOOL_GOALPOINTS, 'int' ) );
		$pool = new Football_Pool_Pool();
		$num_jokers = $pool->get_jokers();
		$output['max_score'] = 0;
		if ( $num_jokers > 0 ) {
			// count first match(es) with joker
			$joker_multiplier = Football_Pool_Utils::get_fp_option( 'joker_multiplier', FOOTBALLPOOL_JOKERMULTIPLIER, 'int' );
			if ( $num_jokers <= $num_matches ) {
				$output['max_score'] += $num_jokers * $full * $joker_multiplier;
			} else {
				$output['max_score'] += $num_matches * $full * $joker_multiplier;
			}
			// all other matches if there are matches left
			if ( $num_matches - $num_jokers > 0 ) {
				$output['max_score'] += ( $num_matches - $num_jokers ) * $full;
			}
		} else {
			$output['max_score'] += $num_matches * $full;
		}
		// add the bonusquestions
		$sql = "SELECT SUM( q.points ) FROM {$prefix}bonusquestions q ";
		if ( $ranking_id != FOOTBALLPOOL_RANKING_DEFAULT ) {
			$sql .= $wpdb->prepare( "JOIN {$prefix}rankings_bonusquestions rb 
										ON ( rb.question_id = q.id AND rb.ranking_id = %d ) "
									, $ranking_id );
		}
		$sql .= "WHERE q.score_date IS NOT NULL";
		$data = $wpdb->get_var( $sql );
		$max_points = ( $data != null ) ? (int) $data : 0;
		$output['max_score'] += $max_points;
		
		return apply_filters( 'footballpool_points_total_pie_chart_data', $output, $user, $ranking_id );
	}
	
	public function score_per_match_line_chart_data( $users, $ranking_id = FOOTBALLPOOL_RANKING_DEFAULT ) {
		return $this->per_match_line_chart_data( $users, 'total_score', $ranking_id );
	}
	
	public function ranking_per_match_line_chart_data( $users, 
														$ranking_id = FOOTBALLPOOL_RANKING_DEFAULT ) {
		return $this->per_match_line_chart_data( $users, 'ranking', $ranking_id );
	}
	
	private function per_match_line_chart_data( $users, $history_data_to_plot, 
												$ranking_id = FOOTBALLPOOL_RANKING_DEFAULT ) {
		$data = array();
		if ( count( $users ) > 0 ) {
			global $wpdb;
			$prefix = FOOTBALLPOOL_DB_PREFIX;
			
			$user_ids = implode( ',', $users );
			$sql = $wpdb->prepare( "SELECT h.source_id, h.{$history_data_to_plot}, u.ID AS user_id, u.display_name, h.type 
									FROM {$prefix}{$this->scorehistory} h, {$wpdb->users} u 
									WHERE h.ranking_id = %d AND u.ID = h.user_id 
										AND h.user_id IN ( {$user_ids} )
									ORDER BY h.score_date ASC, h.type ASC, h.source_id ASC, h.user_id ASC"
									, $ranking_id
								);
			
			$rows = $wpdb->get_results( $sql, ARRAY_A );
			if ( count( $rows ) > 0 ) $pool = new Football_Pool_Pool();
			foreach ( $rows as $row ) {
				$data[] = array(
								'match'    => $row['source_id'],
								'type'     => $row['type'],
								'value'    => $row[$history_data_to_plot],
								'user_name' => $pool->user_name( $row['user_id'] )
							);
			}
		}
		
		return $data;
	}
	
	/*****************************************
	Build data arrays for the series option 
	******************************************/
	public function score_chart_series( $rows ) {
		$goal_bonus = ( Football_Pool_Utils::get_fp_option( 'goalpoints', FOOTBALLPOOL_GOALPOINTS, 'int' ) > 0 );
		$goal_diff_bonus = ( Football_Pool_Utils::get_fp_option( 'diffpoints', FOOTBALLPOOL_DIFFPOINTS, 'int' ) > 0 );
		
		$data = array();
		foreach ( $rows as $name => $row ) {
			$toto = $goal_diff_bonus ? (int) $row['scoretoto'] - (int) $row['diffbonus'] : (int) $row['scoretoto'];
			if ( $toto < 0 ) $toto = 0;
			$data[$name] = array(
								array( __( 'full score', 'football-pool' ), (int) $row['scorefull'] ),
								array( __( 'toto score', 'football-pool' ), $toto ),
								array( __( 'no score', 'football-pool' )
										, (int) $row['scoretotal'] - $row['scorefull'] - $row['scoretoto'] 
											- ( $goal_bonus ? $row['goalbonus'] : 0 ) 
								),
							);
			if ( $goal_bonus ) {
				$data[$name][] = array( __( 'just the goal bonus', 'football-pool' ), (int) $row['goalbonus'] );
			}
			if ( $goal_diff_bonus ) {
				$data[$name][] = array( __( 'goal difference bonus', 'football-pool' )
										, (int) $row['diffbonus'] );
			}
		}
		
		$data = apply_filters( 'footballpool_score_chart_series', $data, $rows );
		return $data;
	}
	
	public function predictions_pie_series( $row ) {
		$goal_bonus = ( Football_Pool_Utils::get_fp_option( 'goalpoints', FOOTBALLPOOL_GOALPOINTS, 'int' ) > 0 );
		$goal_diff_bonus = ( Football_Pool_Utils::get_fp_option( 'diffpoints', FOOTBALLPOOL_DIFFPOINTS, 'int' ) > 0 );
		
		$toto = $goal_diff_bonus ? (int) $row['scoretoto'] - (int) $row['diffbonus'] : (int) $row['scoretoto'];
		
		$data = array(
					array( __( 'full score', 'football-pool' ), (int) $row['scorefull'] ),
					array( __( 'toto score', 'football-pool' ), $toto ),
					array( __( 'no score', 'football-pool' )
							, (int) $row['scoretotal'] - $row['scorefull'] - $row['scoretoto'] 
								- ( $goal_bonus ? $row['goalbonus'] : 0 ) 
					),
				);
		if ( $goal_bonus ) {
			$data[] = array( __( 'just the goal bonus', 'football-pool' ), (int) $row['goalbonus'] );
		}
		if ( $goal_diff_bonus ) {
			$data[] = array( __( 'toto score with goal difference bonus', 'football-pool' )
							, (int) $row['diffbonus'] );
		}
		
		$data = apply_filters( 'footballpool_predictions_pie_series', $data, $row );
		return $data;
	}
	
	public function points_total_pie_series( $row ) {
		$data = array(
					array( __( 'points scored', 'football-pool' ), (int) $row['total_score'] ),
					array( __( 'points missed', 'football-pool' ), (int) $row['max_score'] - $row['total_score'] )
				);
		$data = apply_filters( 'footballpool_points_total_pie_series', $data, $row );
		return $data;
	}
	
	public function bonus_question_pie_series( $rows, $open = 'open' ) {
		$data = array();
		foreach ( $rows as $name => $row ) {
			$data[$name] = array(
								array( __( 'correct', 'football-pool' ), (int) $row['bonuscorrect'] ), 
								array( __( 'wrong', 'football-pool' ), (int) $row['bonuswrong'] ),
								//array( __( 'no answer', 'football-pool' ), (int) $row['bonusnoanswer'] )
							);
			if ( $open == 'open' ) {
				$data[$name][] = array( __( 'still open', 'football-pool' )
										, (int) $row['bonustotal'] - $row['bonuscorrect'] - $row['bonuswrong'] );
			}
		}
		$data = apply_filters( 'footballpool_bonus_question_pie_series', $data, $rows, $open );
		return $data;
	}
	
	public function bonus_question_pie_series_one_question( $row ) {
		$data = array(
					array( __( 'correct', 'football-pool' ), (int) $row['bonuscorrect'] ), 
					array( __( 'wrong', 'football-pool' ), (int) $row['bonuswrong'] ),
					array( __( 'no answer', 'football-pool' ), (int) $row['totalusers'] - $row['bonuscorrect'] - $row['bonuswrong'] )
				);
		$data = apply_filters( 'footballpool_bonus_question_pie_series_one_question', $data, $row );
		return $data;
	}
	
	private function per_match_line_series( $lines ) {
		$output = array(
						'categories' => array(), 
						'series' => array()
						);
		
		if ( count( $lines ) > 0 ) {
			$match_obj = new Football_Pool_Matches();
			$categoriesdata = array();
			$seriesdata = array();
			
			$users = array();
			$match_id = 0;
			$question_id = 0;
			$match = '';
			$type = '';
			foreach ( $lines as $datarow ) {
				// if new user, then start a new series
				$user = $datarow['user_name'];
				if ( ! array_key_exists( $user, $seriesdata ) ) {
					$seriesdata[$user] = array(
												'name' => $user, 
												'data' => array() 
											);
				}
				// new match or question?
				if ( $match != $datarow['match'] || $type != $datarow['type'] ) {
					$match = (int) $datarow['match'];
					$type = $datarow['type'];
					if ( $type == 0 ) {
						$matchinfo = $match_obj->get_match_info( $match );
						$category_data = __( 'match', 'football-pool' ) . ' ' . ++$match_id;
						if ( isset( $matchinfo['home_team'] ) ) {
							$category_data .= ': ' . $matchinfo['home_team'] . ' - ' . $matchinfo['away_team'];
						}
						$categoriesdata[] = $category_data;
					} else {
						$categoriesdata[] = __( 'bonus question', 'football-pool' ) . ' ' . ++$question_id;
					}
				}
				$seriesdata[$user]['data'][] = (int) $datarow['value'];
			}
			
			$output = array(
							'categories' => $categoriesdata, 
							'series' => $seriesdata
							);
		}
		
		$output = apply_filters( 'footballpool_per_match_line_series', $output, $lines );
		return $output;	
	}
	
	public function score_per_match_line_series( $lines ) {
		return $this->per_match_line_series( $lines );
	}

	public function ranking_per_match_line_series( $lines ) {
		return $this->per_match_line_series( $lines );
	}
}
