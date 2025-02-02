<?php
class Football_Pool_Admin {
	public static function add_body_class( $classes ) {
		global $hook_suffix;
		if ( strpos( $hook_suffix, 'footballpool' ) !== false ) $classes .= 'football-pool';
		return $classes;
	}
	
	public static function adminhook_suffix() {
		// for debugging
		global $hook_suffix;
		echo "<!-- admin hook for current page is: {$hook_suffix} -->";
	}
	
	public static function set_screen_options( $status, $option, $value ) {
		// Football_Pool_Utils::debugf( "status: {$status}; option: {$option}; value: {$value}" );
		return ( strpos( $option, 'footballpool_' ) !== false ) ? $value : $status;
	}
	
	public static function get_screen_option( $option, $type = 'int' ) {
		$screen = get_current_screen();
		
		$screen_option = $screen->get_option( $option, 'option' );
		$option_value = get_user_meta( get_current_user_id(), $screen_option, true );
		
		$default_value = empty ( $option_value ) || $option_value < 1 ;
		if ( ! $default_value && $type == 'int' ) $option_value = (int) $option_value;
		
		if ( $default_value ) $option_value = $screen->get_option( $option, 'default' );
		
		return $option_value;
	}
	
	public static function init_admin() {
		add_action( 'admin_menu', array( __CLASS__, 'admin_menu_init' ) );
		add_filter( 'set-screen-option', array( __CLASS__, 'set_screen_options' ), null, 3 );
		
		// checks if Highcharts settings are correct
		$notice = sprintf( '<strong>%s: </strong>', __( 'Football Pool', 'football-pool' ) ); 
		$chart = new Football_Pool_Chart();
		if ( $chart->stats_enabled && ! $chart->API_loaded ) {
			$notice .= __( 'Charts are enabled but Highcharts API was not found!', 'football-pool' ) . ' ' 
					. sprintf( __( 'See <a href="%s">Help page</a> for details.', 'football-pool' )
								, 'admin.php?page=footballpool-help#charts' );
			self::notice( $notice , 'error', false, true );
		}
	}
	
	private static function add_submenu_page( $parent_slug, $page_title, $menu_title
									, $capability, $menu_slug, $class, $toplevel = false ) {
		if ( is_array( $class ) ) {
			$function = array( $class['admin'], 'admin' );
			$help_class = $class['help'];
			$screen_options_class = $class['screen_options'];
		} else {
			$function = array( $class, 'admin' );
			$help_class = $screen_options_class = $class;
		}
		
		$hook = add_submenu_page( $parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function );
		
		// help tab
		if ( method_exists( $help_class, 'help' ) ) {
			$menu_level = $toplevel ? 'toplevel' : 'football-pool';
			add_action( "admin_head-{$menu_level}_page_{$menu_slug}", array( $help_class, 'help' ) );
		}
		
		// screen options
		if ( $hook && method_exists( $screen_options_class, 'screen_options' ) ) {
			add_action( "load-{$hook}", array( $screen_options_class, 'screen_options' ) );
			// add_action( 'admin_init', array( $screen_options_class, 'screen_options' ) );
		}
		
		do_action( "footballpool_admin_post_menu_{$menu_slug}", $parent_slug, $capability );
	}
	
	public static function admin_menu_init() {
		$slug = 'footballpool-options';
		$capability = 'manage_football_pool';
		
		// main menu item
		add_menu_page(
			__( 'Football Pool', 'football-pool' ),
			__( 'Football Pool', 'football-pool' ),
			$capability, 
			$slug,
			array( 'Football_Pool_Admin_Options', 'admin' ),
			'none'
		);
		
		do_action( 'footballpool_admin_pre_menu_init', $slug, $capability );
		
		// submenu pages
		self::add_submenu_page(
			$slug,
			__( 'Football Pool Options', 'football-pool' ),
			__( 'Plugin Options', 'football-pool' ),
			$capability, 
			'footballpool-options',
			'Football_Pool_Admin_Options',
			true
		);
		
		if ( FOOTBALLPOOL_RANKING_CALCULATION_NOAJAX ) {
			self::add_submenu_page(
				$slug,
				__( 'Score Calculation', 'football-pool' ),
				__( 'Score Calculation', 'football-pool' ),
				$capability, 
				'footballpool-score-calculation',
				'Football_Pool_Admin_Score_Calculation'
			);
		}
		
		self::add_submenu_page(
			$slug,
			__( 'Edit users', 'football-pool' ), 
			__( 'Users', 'football-pool' ), 
			$capability, 
			'footballpool-users',
			'Football_Pool_Admin_Users'
		);

		self::add_submenu_page(
			$slug,
			__( 'Edit matches', 'football-pool' ), 
			__( 'Matches', 'football-pool' ), 
			$capability, 
			'footballpool-games',
			'Football_Pool_Admin_Games'
		);
		
		self::add_submenu_page(
			$slug,
			__( 'Edit bonus questions', 'football-pool' ), 
			__( 'Questions', 'football-pool' ), 
			$capability, 
			'footballpool-bonus',
			'Football_Pool_Admin_Bonus_Questions'
		);
		
		self::add_submenu_page(
			$slug,
			__( 'Edit shoutbox', 'football-pool' ), 
			__( 'Shoutbox', 'football-pool' ), 
			$capability, 
			'footballpool-shoutbox',
			'Football_Pool_Admin_Shoutbox'
		);
		
		self::add_submenu_page(
			$slug,
			__( 'Edit teams', 'football-pool' ), 
			__( 'Teams', 'football-pool' ), 
			$capability, 
			'footballpool-teams',
			'Football_Pool_Admin_Teams'
		);
		
		// self::add_submenu_page(
			// $slug,
			// __( 'Edit teams', 'football-pool' ), 
			// __( 'Teams', 'football-pool' ), 
			// $capability, 
			// 'footballpool-teams-position',
			// 'Football_Pool_Admin_Teams_Position'
		// );
		
		self::add_submenu_page(
			$slug,
			__( 'Edit venues', 'football-pool' ), 
			__( 'Venues', 'football-pool' ), 
			$capability, 
			'footballpool-venues',
			'Football_Pool_Admin_Stadiums'
		);
		
		self::add_submenu_page(
			$slug,
			__( 'Edit leagues', 'football-pool' ), 
			__( 'Leagues', 'football-pool' ), 
			$capability, 
			'footballpool-leagues',
			'Football_Pool_Admin_Leagues'
		);
		
		self::add_submenu_page(
			$slug,
			__( 'Edit rankings', 'football-pool' ), 
			__( 'Rankings', 'football-pool' ), 
			'manage_football_pool', 
			'footballpool-rankings',
			'Football_Pool_Admin_Rankings'
		);
		
		self::add_submenu_page(
			$slug,
			__( 'Edit match types', 'football-pool' ), 
			__( 'Match Types', 'football-pool' ), 
			$capability, 
			'footballpool-matchtypes',
			'Football_Pool_Admin_Match_Types'
		);
		
		self::add_submenu_page(
			$slug,
			__( 'Edit groups', 'football-pool' ), 
			__( 'Groups', 'football-pool' ), 
			$capability, 
			'footballpool-groups',
			'Football_Pool_Admin_Groups'
		);
		
		self::add_submenu_page(
			$slug,
			__( 'Help', 'football-pool' ), 
			__( 'Help', 'football-pool' ), 
			$capability, 
			'footballpool-help',
			'Football_Pool_Admin_Help'
		);
		
		do_action( 'footballpool_admin_post_menu_init', $slug, $capability );
	}
	
	public static function initialize_wp_media() {
		if ( FOOTBALLPOOL_WP_MEDIA ) {
			wp_enqueue_media();
		} else {
			if ( ! wp_script_is( 'media-upload', 'queue' ) ) {
				wp_enqueue_script( 'media-upload' );
			}
			if ( ! wp_script_is( 'thickbox', 'queue' ) ) {
				wp_enqueue_script( 'thickbox' );
			}
			if ( ! wp_style_is( 'thickbox', 'queue' ) ) {
				wp_enqueue_style( 'thickbox' );
			}
		}
	}
	
	// TinyMCE extension
	public static function tinymce_add_plugin() {
		// Don't bother doing this stuff if the current user lacks permissions
		if ( ! current_user_can( 'edit_posts' ) && ! current_user_can( 'edit_pages' ) )
			return;
	 
		// Add only in Rich Editor mode
		if ( get_user_option( 'rich_editing' ) == 'true' ) {
			add_filter( 'mce_external_plugins', array( 'Football_Pool_Admin', 'add_tinymce_footballpool_plugin' ) );
			add_filter( 'mce_buttons', array( 'Football_Pool_Admin', 'register_tinymce_footballpool_button' ) );
			
			/* Only needed for simple tinymce plugin
			$shortcodes = array(
				array( __( 'Ranking', 'football-pool' ), '[fp-ranking ranking=""]' ),
				array( __( 'Predictions', 'football-pool' ), '[fp-predictions match="" question="" text=""]' ),
				array( __( 'Prediction Form', 'football-pool' ), '[fp-predictionform match="" question="" matchtype="" text=""]' ),
				array( __( 'Matches', 'football-pool' ), '[fp-matches match="" matchtype="" group=""]' ),
				array( __( 'Next Matches', 'football-pool' ), '[fp-next-matches date="" matchtype="" group="" num=""]' ),
				array( __( 'Group', 'football-pool' ), '[fp-group id=""]'),
				array( __( 'League Info', 'football-pool' ), '[fp-league-info league="" info="" ranking="" format=""]' ),
				array( __( 'User Score', 'football-pool' ), '[fp-user-score user="" ranking="" date="" text=""]' ),
				array( __( 'User Ranking', 'football-pool' ), '[fp-user-ranking user="" ranking="" date="" text=""]' ),
				array( __( 'Scores', 'football-pool' ), '[fp-scores league="" users="" match="" matchtype=""]' ),
				array( __( 'Countdown', 'football-pool' ), '[fp-countdown date="" match="" texts="" display="" format=""]' ),
				array( __( 'Link to Page', 'football-pool' ), '[fp-link slug=""]' ),
				array( __( 'Link to Registration', 'football-pool' ), '[fp-register title="" new=""]' ),
				array( __( 'Value for ', 'football-pool' ) . __( 'Joker multiplier', 'football-pool' ), '[fp-joker-multiplier]' ),
				array( __( 'Value for ', 'football-pool' ) . __( 'Full points', 'football-pool' ), '[fp-fullpoints]' ),
				array( __( 'Value for ', 'football-pool' ) . __( 'Toto points', 'football-pool' ), '[fp-totopoints]' ),
				array( __( 'Value for ', 'football-pool' ) . __( 'Goal bonus', 'football-pool' ), '[fp-goalpoints]' ),
				array( __( 'Value for ', 'football-pool' ) . __( 'Goal difference bonus', 'football-pool' ), '[fp-diffpoints]' ),
				array( __( 'Show Plugin Option', 'football-pool' ), '[fp-plugin-option option="" default="" type=""]' ),
			);
			*/
			wp_localize_script( 'js-pool-admin'
								, 'FootballPoolTinyMCE'
								, array( 
									'tooltip' => __( 'Add Football Pool Shortcodes. See help page for more info on the parameters.', 'football-pool' ),
									'text' => __( 'Add Shortcode', 'football-pool' ),
									// 'names' => implode( '|', array_map( array( 'self', 'getShortcodeNames' ), $shortcodes ) ),
									// 'shortcodes' => implode( '|', array_map( array( 'self', 'getShortcodeCodes' ), $shortcodes ) ),
									'button_text' => __( 'Add Shortcode', 'football-pool' ),
								)
			);
		}
	}
	
	private static function getShortcodeNames( $a ) {
		return $a[0];
	}
	
	private static function getShortcodeCodes( $a ) {
		return $a[1];
	}
	
	public static function register_tinymce_footballpool_button( $buttons ) {
		array_push( $buttons, 'footballpool' );
		return $buttons;
	}
	
	public static function add_tinymce_footballpool_plugin( $plugin_array ) {
		$suffix = defined( 'FOOTBALLPOOL_LOCAL_MODE' ) ? '' : '.min';
		$plugin_array['footballpool'] = FOOTBALLPOOL_PLUGIN_URL . "assets/admin/tinymce/plugin-advanced{$suffix}.js";
		// $plugin_array['footballpool'] = FOOTBALLPOOL_PLUGIN_URL . "assets/admin/tinymce/plugin-simple{$suffix}.js";
		return $plugin_array;
	}
	// end TinyMCE
	
	public static function add_plugin_settings_link( $links, $file ) {
		if ( $file == plugin_basename( FOOTBALLPOOL_PLUGIN_DIR . 'football-pool.php' ) ) {
			$links[] = '<a href="admin.php?page=footballpool-options">' . __( 'Settings', 'football-pool' ) . '</a>';
			$links[] = '<a href="admin.php?page=footballpool-help">' . __( 'Help', 'football-pool' ) . '</a>';
			$links[] = '<a href="' . FOOTBALLPOOL_DONATE_LINK . '">' . __( 'Donate', 'football-pool' ) . '</a>';
		}

		return $links;
	}
	
	public static function get_value( $key, $default = '' ) {
		return Football_Pool_Utils::get_fp_option( $key, $default );
	}
	
	public static function set_value( $key, $value ) {
		Football_Pool_Utils::update_fp_option( $key, $value );
	}
	
	// use type 'updated' for yellow message and type 'error' or 'important' for the red one
	public static function notice( $msg, $type = 'updated', $fade = true, $is_dismissible = false ) {
		$class = 'notice ';
		switch ( $type ) {
			case 'important':
			case 'error':
				$class .= 'notice-error';
				break;
			case 'info':
				$class .= 'notice-info';
				break;
			case 'warning':
				$class .= 'notice-warning';
				break;
			case 'updated':
			default:
				$class .= 'notice-success';
		}
		
		if ( $fade === true ) $class .= ' fade';
		if ( $is_dismissible === true ) {
			$class .= ' is-dismissible';
			// $msg .= '<button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button>';
		}
		
		echo '<div class="', esc_attr( $class ), '"><p>', $msg, '</p></div>';
	}
	
	private static function image_input_WP3_5( $label, $key, $value, $description, $type ) {
		$key = esc_attr( $key );
		$title = __( 'Choose Image', 'football-pool' );
		// based on http://mikejolley.com/2012/12/using-the-new-wordpress-3-5-media-uploader-in-plugins/
		echo "<script type='text/javascript'>
			jQuery( document ).ready( function() {
				var file_frame;
				jQuery( '#{$key}_button ' ).live( 'click', function( event ) {
					event.preventDefault();
					
					if ( file_frame ) {
						file_frame.open();
						return;
					}
				 
					file_frame = wp.media.frames.file_frame = wp.media( {
						title: '{$title}',//jQuery( this ).data( 'uploader_title' ),
						button: {
							text: jQuery( this ).data( 'uploader_button_text' ),
						},
						multiple: false  
					} );
				 
					file_frame.on( 'select', function() {
						attachment = file_frame.state().get( 'selection' ).first().toJSON();
						// jQuery( '#{$key}' ).val( attachment.sizes.thumbnail.url );
						jQuery( '#{$key}' ).val( attachment.url );
					} );
				 
					file_frame.open();
				} );
			} );
			</script>
		";
		
		$input = sprintf( '<input name="%s" type="text" id="%s" value="%s" title="%s" class="fp-image-upload-value %s">
							<input id="%s_button" type="button" value="%s" class="fp-image-upload-button">'
							, $key
							, $key
							, esc_attr( $value )
							, esc_attr( $value )
							, esc_attr( $type )
							, $key
							, $title
						);
		echo self::option_row( $key, $label, $input, $description );
	}
	
	private static function image_input_old( $label, $key, $value, $description, $type ) {
		$key = esc_attr( $key );
		echo '<script type="text/javascript">
			jQuery( document ).ready( function() {
				window.send_to_editor_restore = window.send_to_editor;
				
				jQuery( "#', $key, '_button" ).click( function() {
					post_id = jQuery( "#post_ID" ).val();
					tb_show( "", "media-upload.php?football_pool_admin=footballpool-bonus&amp;post_id=0&amp;type=image&amp;TB_iframe=true" );
					
					window.send_to_editor = window.send_to_editor_', $key, ';
					
					return false;
				});
				 
				window.send_to_editor_', $key, ' = function( html ) {
					imgurl = jQuery( "img", html ).attr( "src" );
					if ( imgurl == "" && jQuery( "#src" ) ) imgurl = jQuery( "#src" ).val();
					
					jQuery( "#', $key, '" ).val( imgurl );
					tb_remove();
					
					window.send_to_editor = window.send_to_editor_restore;
				}
			});
			</script>';
		
		$input = sprintf( '<input name="%s" type="text" id="%s" value="%s" title="%s" class="fp-image-upload-value %s">
							<input id="%s_button" type="button" value="%s" class="fp-image-upload-button">'
							, $key
							, $key
							, esc_attr( $value )
							, esc_attr( $value )
							, esc_attr( $type )
							, $key
							, __( 'Choose Image', 'football-pool' )
						);
		echo self::option_row( $key, $label, $input, $description );
	}
	
	public static function image_input( $label, $key, $value, $description = '', $type = 'regular-text' ) {
		if ( FOOTBALLPOOL_WP_MEDIA ) {
			self::image_input_WP3_5( $label, $key, $value, $description, $type );
		} else {
			self::image_input_old( $label, $key, $value, $description, $type );
		}
	}
	
	public static function checkbox_input( $label, $key, $checked, $description = ''
									, $extra_attr = '', $depends_on = '' ) {
		$input = sprintf( '<input name="%s" type="checkbox" id="%s" value="1" %s %s>'
							, esc_attr( $key )
							, esc_attr( $key )
							, ( $checked ? 'checked="checked" ' : '' )
							, $extra_attr
						);
		echo self::option_row( $key, $label, $input, $description, $depends_on );
	}
	
	public static function dropdown( $key, $value, $options, $extra_attr = '', $multi = 'single', $class = '' ) {
		$i = 0;
		$class = 'fp-select ' . $class;
		$multiple = '';
		$name = esc_attr( $key );
		if ( $multi == 'multi' ) {
			$multiple = 'multiple="multiple" size="6"';
			$name .= '[]';
			$class .= ' fp-multi-select';
		}
		$output = sprintf( '<select id="%1$s" name="%2$s" class="%4$s" %3$s>', esc_attr( $key ), $name, $multiple, $class );
		
		foreach ( $options as $option ) {
			if ( is_array( $extra_attr ) ) {
				$extra = isset( $extra_attr[$i] ) ? $extra_attr[$i] : '';
			} else {
				$extra = $extra_attr;
			}
			
			$selected = ( self::check_selected_value( $value, $option['value'] ) ? 'selected="selected" ' : '' );
			$output .= sprintf( '<option id="%s_answer_%d" value="%s" %s %s>%s</option>'
								, esc_attr( $key )
								, $i
								, esc_attr( $option['value'] )
								, $selected
								, $extra
								, $option['text']
						);
			$i++;
		}
		$output .= '</select>';
		
		return $output;
	}
	
	private static function check_selected_value( $check_value, $option_value ) {
		if ( is_array( $check_value ) ) {
			return in_array( $option_value, $check_value );
		} else {
			return ( $option_value == $check_value );
		}
	}
	
	public static function multiselect_input( $label, $key, $value, $options, $description = '', 
									$extra_attr = '', $depends_on = '', $class = '' ) {
		echo self::option_row( $key, $label, self::dropdown( $key, $value, $options, $extra_attr, 'multi', $class )
								, $description, $depends_on );
	}
	
	public static function dropdown_input( $label, $key, $value, $options, $description = '', 
									$extra_attr = '', $depends_on = '', $class = '' ) {
		echo self::option_row( $key, $label, self::dropdown( $key, $value, $options, $extra_attr, 'single', $class )
								, $description, $depends_on );
	}
	
	public static function radiolist_input( $label, $key, $value, $options, $description = '', 
									$extra_attr = '', $depends_on = '' ) {
		$hide = self::hide_input( $depends_on ) ? ' style="display:none;"' : '';
		
		$i = 0;
		$label_extra = sprintf( '_answer_%d', $i );
		$input = '';
		foreach ( $options as $option ) {
			if ( is_array( $extra_attr ) ) {
				$extra = isset( $extra_attr[$i] ) ? $extra_attr[$i] : '';
			} else {
				$extra = $extra_attr;
			}
			$selected = ( self::check_selected_value( $value, $option['value'] ) ? 'checked="checked" ' : '' );
			$input .= sprintf( '<label class="radio"><input name="%s" type="radio" id="%s_answer_%d" 
								value="%s" %s %s> %s</label>'
								, esc_attr( $key )
								, esc_attr( $key )
								, $i++
								, esc_attr( $option['value'] )
								, $selected
								, $extra
								, $option['text']
						);
		}
		
		echo self::option_row( $key, $label, $input, $description, $depends_on, $label_extra );
	}
	
	public static function hidden_input( $key, $value, $return = 'echo' ) {
		$output = sprintf( '<input type="hidden" name="%s" id="%s" value="%s">'
						, esc_attr( $key )
						, esc_attr( $key )
						, esc_attr( $value )
					);
		
		if ( $return == 'echo' ) {
			echo $output;
		} else {
			return $output;
		}
	}
	
	public static function no_input( $label, $value, $description ) {
		echo '<tr valign="top">
			<th scope="row"><label>', $label, '</label></th>
			<td>', Football_Pool_Utils::xssafe( $value ), '</td>
			<td><span class="description">', $description, '</span></td>
			</tr>';
	}
	
	// helper function for the date_time input. 
	// returns the combined date(time) string from the individual inputs
	public static function make_date_from_input( $input_name, $type = 'datetime' ) {
		$y = Football_Pool_Utils::post_integer( $input_name . '_y' );
		$m = Football_Pool_Utils::post_integer( $input_name . '_m' );
		$d = Football_Pool_Utils::post_integer( $input_name . '_d' );
		$value = ( $y != 0 && $m != 0 && $d != 0 ) ? sprintf( '%04d-%02d-%02d', $y, $m, $d ) : '';
		
		if ( $value != '' && $type == 'datetime' ) {
			$h = Football_Pool_Utils::post_integer( $input_name . '_h', -1 );
			$i = Football_Pool_Utils::post_integer( $input_name . '_i', -1 );
			$value = ( $h != -1 && $i != -1 ) ? sprintf( '%s %02d:%02d', $value, $h, $i ) : '';
		}
		
		return $value;
	}
	
	public static function the_datetime_input( $key, $value ) {
		if ( $value != '' ) {
			if ( is_object( $value ) ) {
				$date = $value;
			} else {
				//$date = DateTime::createFromFormat( 'Y-m-d H:i', $value );
				$date = new DateTime( Football_Pool_Utils::date_from_gmt ( $value ) );
			}
			$year = $date->format( 'Y' );
			$month = $date->format( 'm' );
			$day = $date->format( 'd');
			$hour = $date->format( 'H' );
			$minute = $date->format( 'i' );
		} else {
			$year = $month = $day = $hour = $minute = '';
		}
		
		$input = sprintf( '<input name="%s_y" type="text" id="%s_y" value="%s" class="with-hint date-y"
							title="yyyy" maxlength="4">'
							, esc_attr( $key ), esc_attr( $key ), esc_attr( $year )
				);
		$input .= '-';
		$input .= sprintf( '<input name="%s_m" type="text" id="%s_m" value="%s" class="with-hint date-m"
							title="mm" maxlength="2">'
							, esc_attr( $key )
							, esc_attr( $key )
							, esc_attr( $month )
				);
		$input .= '-';
		$input .= sprintf( '<input name="%s_d" type="text" id="%s_d" value="%s" class="with-hint date-d"
							title="dd" maxlength="2">'
							, esc_attr( $key )
							, esc_attr( $key )
							, esc_attr( $day )
				);
		$input .= '&nbsp;';
		$input .= sprintf( '<input name="%s_h" type="text" id="%s_m" value="%s" class="with-hint date-h"
							title="hr" maxlength="2">'
							, esc_attr( $key )
							, esc_attr( $key )
							, esc_attr( $hour )
				);
		$input .= ':';
		$input .= sprintf( '<input name="%s_i" type="text" id="%s_d" value="%s" class="with-hint date-i"
							title="mn" maxlength="2">'
							, esc_attr( $key )
							, esc_attr( $key )
							, esc_attr( $minute )
				);
		return $input;
	}
	
	public static function datetime_input( $label, $key, $value, $description = '', $extra_attr = ''
									, $depends_on = '' ) {
		$input = self::the_datetime_input( $key, $value );
		echo self::option_row( $key, $label, $input, $description, $depends_on );
	}
	
	public static function datetimepicker_input( $label, $key, $value, $description = '', $extra_attr = ''
									, $depends_on = '' ) {
		$input = self::datetimepicker( $key, $value, null, 'return' );
		echo self::option_row( $key, $label, $input, $description, $depends_on );
	}
	
	public static function datepicker( $key, $value, $return = 'echo' ) {
		$input = sprintf( '<input type="text" id="%s" name="%s" size="10" maxlength="10" value="%s" />'
							, esc_attr( $key ), esc_attr( $key ), esc_attr( $value ) );
		$input .= sprintf( '<script>jQuery( function() { jQuery( "#%s" ).datetimepicker( { format: "Y-m-d", timepicker: false, closeOnDateSelect: true, lazyInit: false } ); } );</script>'
							, esc_attr( $key ) );
		
		if ( $return == 'echo' ) {
			echo $input;
		} else {
			return $input;
		}
	}
	
	public static function datetimepicker( $key, $value, $step = 60, $return = 'echo' ) {
		$input = sprintf( '<input type="text" id="%s" name="%s" size="16" maxlength="16" value="%s" />'
							, esc_attr( $key ), esc_attr( $key ), esc_attr( $value ) );
		$input .= sprintf( '<script>jQuery( function() { jQuery( "#%s" ).datetimepicker( { format: "Y-m-d H:i", step: %d, lazyInit: false } ); } );</script>'
							, esc_attr( $key ), $step );
		
		if ( $return == 'echo' ) {
			echo $input;
		} else {
			return $input;
		}
	}
	
	public static function textarea_field( $key, $value, $type = '' ) {
		return sprintf( '<textarea name="%s" class="%s" cols="50" rows="5">%s</textarea>'
							, esc_attr( $key ), $type, $value
					);
	}
	
	public static function textarea_input( $label, $key, $value, $description = '', $type = '', $depends_on = '' ) {
		echo self::option_row( $key, $label, self::textarea_field( $key, $value, $type )
								, $description, $depends_on );
	}
	
	public static function text_input_field( $key, $value, $type = 'regular-text', $capability = '' ) {
		if ( $capability == '' || ( $capability != '' && current_user_can( $capability ) ) ) {
			$output = '<input name="' . esc_attr( $key ) . '" type="text" id="' . esc_attr( $key ) 
					. '" value="' . esc_attr( $value ) . '" class="' . esc_attr( $type ) . '" />';
		} else {
			$output = $value;
		}
		return $output;
	}
	
	public static function text_input( $label, $key, $value, $description = ''
								, $type = 'regular-text', $depends_on = '' ) {
		echo self::option_row( $key, $label, self::text_input_field( $key, $value, $type )
								, $description, $depends_on );
	}
	
	private static function hide_input( $depends_on ) {
		if ( is_bool( $depends_on ) ) {
			$hide = $depends_on;
		} elseif ( is_array( $depends_on ) ) {
			$hide = true;
			foreach ( $depends_on as $key => $val ) {
				$hide &= (string)self::get_value( $key ) == (string)$val;
			}
		} else {
			$hide = ( $depends_on != '' && (string)self::get_value( $depends_on ) == '0' );
		}
		
		return $hide;
	}
	
	private static function option_row( $id, $label, $input, $description, $depends_on = '', $label_extra = '' ) {
		$hide = self::hide_input( $depends_on ) ? ' style="display: none"' : '';
		$class = ( $depends_on == '' ) ? '' : ' class="no-border"';
		
		$option = sprintf( '<th scope="row"><label for="%s%s">%s</label></th>'
							, esc_attr( $id ), $label_extra, $label );
		$input = sprintf( '<td>%s</td>', $input );
		$description = sprintf( '<td><span class="description">%s</span></td>', $description );
		
		return sprintf( '<tr%s%s id="r-%s" valign="top">%s%s%s</tr>'
						, $hide, $class, esc_attr( $id ), $option, $input, $description
				);
	}
	
	public static function show_option( $option ) {
		switch ( $option['type'] ) {
			case 'multi-list':
			case 'multi-select':
			case 'multi-selectbox':
				self::multiselect_input( $option['label'], $option['id'], self::get_value( $option['id'] ), $option['options'], $option['desc'], $option['extra_attr'], $option['depends_on'], $option['class'] );
				break;
			case 'dropdownlist':
			case 'dropdown':
			case 'select':
			case 'selectbox':
				self::dropdown_input( $option['label'], $option['id'], self::get_value( $option['id'] ), $option['options'], $option['desc'], $option['extra_attr'], $option['depends_on'], $option['class'] );
				break;
			case 'radiolist':
				self::radiolist_input( $option['label'], $option['id'], self::get_value( $option['id'] ), $option['options'], $option['desc'], $option['extra_attr'], $option['depends_on'] );
				break;
			case 'checkbox':
				self::checkbox_input( $option['label'], $option['id'], (boolean) self::get_value( $option['id'] ), $option['desc'], $option['extra_attr'], $option['depends_on'] );
				break;
			case 'datetimepicker':
				self::datetimepicker_input( $option['label'], $option['id'], self::get_value( $option['id'] ), $option['desc'], $option['extra_attr'], $option['depends_on'] );
				break;
			case 'datetime':
				self::datetime_input( $option['label'], $option['id'], self::get_value( $option['id'] ), $option['desc'], $option['extra_attr'], $option['depends_on'] );
				break;
			case 'textarea':
			case 'multiline':
				self::textarea_input( $option['label'], $option['id'], self::get_value( $option['id'] ), $option['desc'], '', $option['depends_on'] );
				break;
			case 'integer':
			case 'string':
			case 'text':
			default:
				self::text_input( $option['label'], $option['id'], self::get_value( $option['id'] ), $option['desc'], 'regular-text', $option['depends_on'] );
				break;
		}
	}
	
	public static function show_value( $option ) {
		if ( is_array( $option[0] ) ) {
			$type = $option[0][0];
		} else {
			$type = $option[0];
		}
		
		switch ( $type ) {
			case 'no_input':
				self::no_input( $option[1], $option[3], $option[4] );
				break;
			case 'dropdownlist':
			case 'dropdown':
			case 'select':
			case 'selectbox':
				self::dropdown_input( $option[1], $option[2], $option[3], $option[4], $option[5], isset( $option[6] ) ? $option[6] : '', '', isset( $option[7] ) ? $option[7] : '' );
				break;
			case 'radiolist':
				self::radiolist_input( $option[1], $option[2], $option[3], $option[4], isset( $option[5] ) ? $option[5] : '', isset( $option[6] ) ? $option[6] : '' );
				break;
			case 'checkbox':
				self::checkbox_input( $option[1], $option[2], $option[3], $option[4], isset( $option[5] ) ? $option[5] : '' );
				break;
			case 'hidden':
				self::hidden_input( $option[2], $option[3] );
				break;
			case 'image':
				self::image_input( $option[1], $option[2], $option[3], $option[4] );
				break;
			case 'date':
			case 'datetime':
				self::datetime_input( $option[1], $option[2], $option[3], ( isset( $option[4] ) ? $option[4] : '' ) );
				break;
			case 'datetimepicker':
				self::datetimepicker_input( $option[1], $option[2], $option[3], ( isset( $option[4] ) ? $option[4] : '' ) );
				break;
			case 'multiline':
			case 'textarea':
				self::textarea_input( $option[1], $option[2], $option[3], $option[4], ( isset( $option[5] ) ? $option[5] : '' ), ( isset( $option[6] ) ? $option[6] : '' ) );
				break;
			case 'integer':
			case 'string':
			case 'text':
			default:
				self::text_input( $option[1], $option[2], $option[3], $option[4], ( isset( $option[5] ) ? $option[5] : 'regular-text' ), ( isset( $option[6] ) ? $option[6] : '' ) );
				break;
		}
	}
	
	public static function intro( $txt ) {
		echo sprintf( '<p>%s</p>', $txt );
	}
	
	// overwrite in the individual help pages
	public static function help() {
		self::add_help_tabs();
	}
	
	// Define a method named 'help' on each admin page that calls this method with 
	// the tab definition (array of tabs) and an optional sidebar.
	// Don't forget to add the admin_head-hook!
	public static function add_help_tabs( $help_tabs = '', $help_sidebar = '' ) {
		if ( ! is_array( $help_tabs ) ) return;
		
		$screen = get_current_screen();
		foreach ( $help_tabs as $help_tab ) {
			$screen->add_help_tab(
						array(
							'id' => $help_tab['id'],
							'title' => $help_tab['title'],
							'content' => $help_tab['content']
						)
					);
		}
		
		if ( $help_sidebar != '' ) {
			$screen->set_help_sidebar(
							sprintf( 
									'<p><strong>%s</strong></p><p>%s</p>' 
									, __( 'For more information:', 'football-pool' )
									, $help_sidebar
							)
						);
		}
	}
	
	public static function admin_sectiontitle( $title ) {
		echo '<h3>', $title, '</h3>';
	}
	
	public static function admin_header( $title, $subtitle = '', $addnew = '', $extra = '' ) {
		echo '<div class="wrap fp-admin">';
		
		$page = Football_Pool_Utils::get_string( 'page' );
		if ( $addnew == 'add new' ) {
			$addnew = "<a class='add-new-h2' href='?page={$page}&amp;action=edit'>" 
					. __( 'Add New', 'football-pool' ) . "</a>";
		}
		
		if ( $subtitle != '' ) {
			$subtitle = sprintf( '<span class="subtitle">%s</span>', $subtitle );
		}
		
		printf( '<h2>%s%s%s</h2>', $title, $subtitle, $addnew );

		echo $extra;
		
		$current_url = set_url_scheme( 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] );
		$current_url = esc_url( remove_query_arg( array( 'action', 'item_id' ), $current_url ) );
		// $current_url = esc_url( remove_query_arg( array( 'item_id' ), $current_url ) );
		printf( '<form action="%s" method="post">', $current_url );
		echo '<input type="hidden" name="action" id="action" value="update" />';
		wp_nonce_field( FOOTBALLPOOL_NONCE_ADMIN );
	}
	
	public static function admin_footer() {
		echo '</form></div>';
	}
	
	public static function bulk_actions( $actions, $name = 'action'
										, $pagination = false, $search = false, $extra = false ) {
		if ( $search !== false ) {
			echo '<p class="search-box">';
			printf( '<label class="screen-reader-text" for="search-input">%s:</label>', $search['text'] );
			printf( '<input type="search" id="search-input" name="s" value="%s">', esc_attr( $search['value'] ) );
			if ( isset( $search['search_by'] ) ) {
				printf( '<span class="search-by">%s</span>', $search['search_by'] );
			}
			printf( '<input type="submit" name="" id="search-submit" class="button" value="%s"></p>'
					, esc_attr( $search['text'] ) );
			if ( isset( $search['extra_search'] ) ) {
				echo '<p class="search-box extra-search"><label>';
				if ( isset( $search['extra_search_text'] ) ) printf( '%s: ', $search['extra_search_text'] );
				printf( '%s</label></p>', $search['extra_search'] );
			}
		}
		
		echo '<div class="tablenav top">';
		if ( count($actions) > 0 ) {
			echo '<div class="alignleft actions"><select id="', $name, '" name="', $name, '">';
			echo '<option selected="selected" value="-1">Bulk Actions</option>';
			foreach ( $actions as $action ) {
				printf( '<option value="%s" bulk-msg="%s">%s</option>'
						, $action[0]
						, ( isset( $action[2] ) ? $action[2] : '' )
						, $action[1]
				);
			}
			printf( "</select><input onclick=\"return FootballPoolAdmin.bulk_action_warning( '%s' )\" type='submit' value='%s' class='button-secondary action' id='do%s' name='' />"
					, $name, __( 'Apply' ), $name );
			echo '</div>';
		}
		if ( $extra !== false ) {
			if ( ! isset( $extra['name'] ) ) $extra['name'] = $extra['id'];
			echo '<div class="alignleft actions">';
			printf( '<label class="screen-reader-text" for="%s">%s</label>'
					, esc_attr( $extra['id'] )
					, $extra['text']
			);
			$options = array( '' => $extra['text'] );
			foreach( $extra['options'] as $val => $option ) $options[$val] = $option;
			echo Football_Pool_Utils::select( $extra['id'], $options, '', $extra['name'] );
			printf( '<input type="submit" name="changeit" id="changeit" class="button" value="%s">'
					, __( 'Change' ) );
			echo '</div>';
		}
		
		if ( is_object( $pagination ) ) {
			$pagination->show();
		}
		echo '<br class="clear"></div>';
	}
	
	protected static function list_table( $cols, $rows, $bulkactions = array(), $rowactions = array()
										, $pagination = false ) {
		self::bulk_actions( $bulkactions, 'action', $pagination );
		echo "<table cellspacing='0' class='wp-list-table widefat fixed'>";
		self::list_table_def( $cols, 'head' );
		self::list_table_def( $cols, 'foot' );
		self::list_table_body( $cols, $rows, $rowactions );
		echo '</table>';
		self::bulk_actions( $bulkactions, 'action2' );
	}
	
	protected static function list_table_def( $cols, $tag ) {
		echo "<t{$tag}><tr>";
		echo '
			<th class="manage-column column-cb check-column" id="cb" scope="col">
				<input type="checkbox">
			</th>';
		
		foreach ( $cols as $col ) {
			echo '<th id="', esc_attr( $col[2] ), '-', $tag, '" class="manage-column column-', esc_attr( $col[2] ), '" scope="col">', $col[1], '</th>';
		}
		echo "</tr></t{$tag}>";
	}

	protected static function list_table_body( $cols, $rows, $rowactions ) {
		echo "<tbody id='the-list'>";
		
		$r = count( $rows );
		$c = count( $cols );
		$page = Football_Pool_Utils::get_string( 'page' );
		
		if ( $r == 0 ) {
			echo "<tr><td colspan='", $c+1, "'>", __( 'no data', 'football-pool' ), "</td></tr>";
		} else {
			for ( $i = 0; $i < $r; $i++ ) {
				$row_class = ( $i % 2 == 0 ) ? 'alternate' : '';
				echo "
					<tr valign='middle' class='{$row_class}' id='row-{$i}'>
					<th class='check-column' scope='row'>
						<input type='checkbox' value='{$rows[$i][$c]}' name='itemcheck[]'>
					</th>";
				for ( $j = 0; $j < $c; $j++ ) {
					echo "<td class='column-{$cols[$j][2]}'>";
					if ( $j == 0 ) {
						echo '<strong><a title="Edit “', esc_attr( $rows[$i][$j] ), '”" href="?page=', esc_attr( $page ), '&amp;action=edit&amp;item_id=', esc_attr( $rows[$i][$c] ), '" class="row-title">';
					}
					
					switch ( $cols[$j][0] ) {
						case 'boolean':
							$value = $rows[$i][$j] == 1 ? 
											__( 'yes', 'football-pool' ) : 
											__( 'no', 'football-pool' );
							break;
						case 'image':
							$value = $rows[$i][$j];
							break;
						case 'text':
						default:
							$value = Football_Pool_Utils::xssafe( $rows[$i][$j] );
					}
					echo $value;
					
					if ( $j == 0 ) {
						$row_action_url = sprintf( '?page=%s&amp;action=edit&amp;item_id=%s'
													, esc_attr( $page )
													, esc_attr( $rows[$i][$c] )
											);
						$row_action_url = wp_nonce_url( $row_action_url, FOOTBALLPOOL_NONCE_ADMIN );
						echo '</a></strong><br>
								<div class="row-actions">
									<span class="item-id">', __( 'id', 'football-pool' ), ': '
										, $rows[$i][$c], '</span>&nbsp;|&nbsp;
									<span class="edit">
										<a href="', $row_action_url, '">', __( 'Edit' ), '</a> | 
									</span>';
						foreach ( $rowactions as $action ) {
							$row_action_url = sprintf( '?page=%s&amp;action=%s&amp;item_id=%s'
														, esc_attr( $page )
														, esc_attr( $action[0] )
														, esc_attr( $rows[$i][$c] )
												);
							$row_action_url = wp_nonce_url( $row_action_url, FOOTBALLPOOL_NONCE_ADMIN );
							echo '<span class="edit">
									<a href="', $row_action_url, '">', $action[1], '</a> | 
								</span>';
						}
						$row_action_url = sprintf( '?page=%s&amp;action=delete&amp;item_id=%s'
													, esc_attr( $page )
													, esc_attr( $rows[$i][$c] )
											);
						$row_action_url = wp_nonce_url( $row_action_url, FOOTBALLPOOL_NONCE_ADMIN );
						echo "<span class='delete'>
									<a onclick=\"return confirm( '", __( 'You are about to delete this item. \'Cancel\' to stop, \'OK\' to delete.', 'football-pool' ), "' )\" href='{$row_action_url}' class='submitdelete'>", __( 'Delete' ), "</a>
								</span>
							</div>";
					}
					
					echo "</td>";
				}
				echo "</tr>";
			}
		}
		echo '</tbody>';
	}
	
	public static function value_form( $values ) {
		echo '<table class="form-table">';
		foreach ( $values as $value ) {
			self::show_value( $value );
		}
		echo '</table>';
	}

	public static function options_form( $values ) {
		echo '<table class="form-table fp-options">';
		foreach ( $values as $value ) {
			self::show_option( $value );
		}
		echo '</table>';
	}
	
	public static function empty_scorehistory( $ranking_id = 'all', $scorehistory = null ) {
		global $wpdb;
		$prefix = FOOTBALLPOOL_DB_PREFIX;
		
		if ( $scorehistory === null ) {
			$pool = new Football_Pool_Pool();
			$scorehistory = $pool->get_score_table();
		}
		
		if ( $ranking_id === 'all' ) {
			$check = self::empty_table( $scorehistory );
		} elseif ( is_int( $ranking_id ) && $ranking_id > 0 ) {
			$sql = $wpdb->prepare( "DELETE FROM {$prefix}{$scorehistory} WHERE ranking_id = %d", $ranking_id );
			$check = ( $wpdb->query( $sql ) !== false );
		} else {
			$check = false;
		}
		
		return $check;
	}
	
	public static function empty_table( $table_name = '' ) {
		global $wpdb;
		$prefix = FOOTBALLPOOL_DB_PREFIX;
		
		if ( $table_name == '' ) return false;
		
		$cache_key = 'fp_delete_method';
		$delete_method = wp_cache_get( $cache_key );
		
		if ( $delete_method === false ) {
			$delete_method = 'TRUNCATE TABLE';
			wp_cache_set( $cache_key, $delete_method );
		}
		
		$sql  = "{$delete_method} {$prefix}{$table_name}";
		$check = ( $wpdb->query( $sql ) !== false );
		// fix if user has no TRUNCATE rights
		if ( $check === false ) {
			$delete_method = 'DELETE FROM';
			wp_cache_set( $cache_key, $delete_method );
			
			$sql  = "{$delete_method} {$prefix}{$table_name}";
			$check = ( $wpdb->query( $sql ) !== false );
		}
		
		return $check;
	}
	
	private static function recalculate_scorehistory_lightbox() {
		echo "<script> FootballPoolAdmin.calculate() </script>";
	}
	
	public static function recalculate_button() {
		if ( FOOTBALLPOOL_RANKING_CALCULATION_NOAJAX ) {
			$nonce = wp_create_nonce( FOOTBALLPOOL_NONCE_SCORE_CALC );
			self::secondary_button( 
						__( 'Recalculate Scores', 'football-pool' )
						, "admin.php?page=footballpool-score-calculation&fp_recalc_nonce={$nonce}"
						, false
						, 'link'
					);
		} else {
			self::secondary_button( __( 'Recalculate Scores', 'football-pool' )
									, array( '', "FootballPoolAdmin.calculate()" )
									, false
									, 'js-button' 
			);
		}
	}
	
	public static function update_score_history( $force = 'no' ) {
		$auto_calc = Football_Pool_Utils::get_fp_option( 'auto_calculation'
														, FOOTBALLPOOL_RANKING_AUTOCALCULATION
														, 'int' );
		
		if ( ! FOOTBALLPOOL_RANKING_CALCULATION_NOAJAX && ( $auto_calc == 1 || $force == 'force' ) ) {
			self::recalculate_scorehistory_lightbox();
		} else {
			self::recalculate_button();
		}
		
		return true;
	}
	
	private static function get_button_action_val( $action ) {
		$onclick_val = '';
		
		if ( is_array( $action ) ) {
			$action_val = array_shift( $action );
			if ( count( $action ) > 0 ) {
				foreach ( $action as $val ) {
					$onclick_val .= "{$val};";
				}
			}
		} else {
			$action_val = $action;
		}
		return array( $action_val, $onclick_val );
	}
	
	// this function returns HTML for a secondary button, rather than echoing it
	public static function link_button( $text, $action, $wrap = false, $other_attributes = null, $type = 'secondary' ) {
		$actions = self::get_button_action_val( $action );
		$action_val  = $actions[0];
		$onclick_val = $actions[1];
		
		$attributes = '';
		if ( is_array( $other_attributes ) ) {
			foreach( $other_attributes as $key => $value ) {
				$attributes .= $key . '="' . esc_attr( $value ) . '" ';
			}
		} elseif ( ! empty( $other_attributes ) ) {
			$attributes = $other_attributes;
		}
		
		if ( $action_val != '' ) $action_val = "location.href = '{$action_val}';";
		$button = sprintf( '<input type="button" onclick="%s%s" 
									class="button button-%s" value="%s" %s/>'
							, $action_val
							, $onclick_val
							, $type
							, esc_attr( $text )
							, $attributes
					);
		if ( $wrap ) {
			$button = '<p class="submit">' . $button . '</p>';
		}
		
		return $button;
	}
	
	public static function secondary_button( $text, $action, $wrap = false, $type = 'button'
									, $other_attributes = null ) {
		$actions = self::get_button_action_val( $action );
		$action_val  = $actions[0];
		$onclick_val = $actions[1];
				
		if ( $type == 'button' ) {
			$onclick_val = "jQuery( '#action, #form_action' ).val( '{$action_val}' );" . $onclick_val;
			$atts = array( "onclick" => $onclick_val );
			
			if ( is_array( $other_attributes ) ) {
				foreach( $other_attributes as $key => $value ) {
					$atts[$key] = $value;
				}
			}
			
			submit_button( 
					$text, 
					'secondary', 
					$action_val, 
					$wrap, 
					$atts 
			);
		} elseif ( $type == 'link' || $type == 'js-button' ) {
			echo self::link_button( $text, $action, $wrap, $other_attributes );
		}
	}
	
	public static function primary_button( $text, $action, $wrap = false ) {
		$onclick_val = '';
		
		if ( is_array( $action ) ) {
			$action_val = array_shift( $action );
			if ( count( $action ) > 0 ) {
				foreach ( $action as $val ) {
					$onclick_val .= "{$val};";
				}
			}
		} else {
			$action_val = $action;
		}
		
		$onclick_val = "jQuery('#action, #form_action').val('{$action_val}');" . $onclick_val;
		
		submit_button( 
				$text, 
				'primary', 
				$action_val, 
				$wrap, 
				array( "onclick" => $onclick_val ) 
		);
	}
	
	public static function cancel_button( $wrap = false, $text = '' ) {
		if ( $text == '' ) $text = __( 'Cancel', 'football-pool' );
		self::secondary_button( $text, 'cancel', $wrap );
	}
	
	public static function donate_button( $return_type = 'echo' ) {
		$str = '<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
				<input type="hidden" name="cmd" value="_s-xclick">
				<input type="hidden" name="hosted_button_id" value="MA9S7MSZRN3YJ">
				<input type="image" src="https://www.paypalobjects.com/en_US/NL/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
				<img alt="" border="0" src="https://www.paypalobjects.com/nl_NL/i/scr/pixel.gif" width="1" height="1">
				</form>';
		if ( $return_type == 'echo' ) {
			echo $str;
		} else {
			return $str;
		}
	}
	
	public static function example_date( $gmt = 'false', $offset = -1 ) {
		if ( $offset == -1 ) $offset = 14 * 24 * 60 * 60;
		$date = date( 'Y-m-d 18:00', time() + $offset );
		if ( $gmt == 'gmt' ) $date = Football_Pool_Utils::gmt_from_date( $date );
		return $date;
	}
}
