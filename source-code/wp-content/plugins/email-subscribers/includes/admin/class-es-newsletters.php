<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * The admin-specific functionality of the plugin.
 *
 * Admin Settings
 *
 * @package    Email_Subscribers
 * @subpackage Email_Subscribers/admin
 * @author     Your Name <email@example.com>
 */
class ES_Newsletters {

	// class instance
	static $instance;

	// class constructor
	public function __construct() {
		//add_filter( 'set-screen-option', array( __CLASS__, 'set_screen' ), 10, 3 );
		// add_action( 'admin_init', array( $this, 'setup_sections' ) );
		add_filter( 'ig_es_refresh_newsletter_content', array( $this, 'refresh_newsletter_content' ), 10, 2 );
	}

	public static function set_screen( $status, $option, $value ) {
		return $value;
	}

	public function es_newsletters_settings_callback() {

		// $this->email_subscribers_settings_fields();
		
		$submitted = ig_es_get_request_data( 'submitted' );
		$preview = ig_es_get_request_data( 'es_broadcast_preview' );
		$broadcast_data = ig_es_get_request_data( 'broadcast_data', array(), false );
		if( 'preview' !== $preview ){
			if ( 'submitted' === $submitted ) {

				// $email_sent_type = __('Active', 'email-subscribers');
				$list_id     = !empty($broadcast_data['list_ids']) ? $broadcast_data['list_ids'] : '' ; 
				$template_id     = !empty($broadcast_data['template_id']) ? $broadcast_data['template_id'] : '' ; 
				$subject = !empty($broadcast_data['subject']) ? $broadcast_data['subject'] : '' ; 
				// $template_id = ig_es_get_request_data( 'ig_es_broadcast_base_template_id' );
				if ( empty( $template_id ) ) {
					$message = __( 'Please select template.', 'email-subscribers' );
					ES_Common::show_message( $message, 'error' );
				} elseif ( empty( $list_id ) ) {
					$message = __( 'Please select list.', 'email-subscribers' );
					ES_Common::show_message( $message, 'error' );
				}  elseif ( empty( $subject ) ) {
					$message = __( 'Please add the subject', 'email-subscribers' );
					ES_Common::show_message( $message, 'error' );
				}else {

					$data = array(
						'base_template_id' => $template_id,
						'list_ids'         => $list_id,
						'status'           => 1
					);
					$broadcast_data['base_template_id'] = $template_id;
					$broadcast_data['list_ids'] = $list_id;
					// $meta = !empty($broadcast_data['meta']) ? $broadcast_data['meta'] : array();
					// $meta['pre_header'] = $broadcast_data['pre_header'];
					// $broadcast_data['meta'] = maybe_serialize($meta);
					self::es_send_email_callback( $broadcast_data );

					$reports_url = admin_url( 'admin.php?page=es_reports' );
					$message     = __( sprintf( 'A new broadcast has been created successfully! Contacts from selected list will be notified within an hour. Want to notify now? <a href="%s" target="_blank">Click here</a>', $reports_url ), 'email-subscribers' );

					ES_Common::show_message( $message, 'success' );

					do_action( 'ig_es_broadcast_created' );
					$broadcast_data = array();
				}

			}

			$this->prepare_newsletter_settings_form();
		}else if('preview' === $preview ){
			// $broadcast_data = ig_es_get_request_data( 'broadcast_data', array(), false );
			if ( empty( $broadcast_data['body'] ) ) {
				$message = __( 'Please add message content', 'email-subscribers' );
				ES_Common::show_message( $message, 'error' );
				$this->prepare_newsletter_settings_form();
			} else{
				//content validation
				$template_data['content'] = !empty($broadcast_data['body']) ? $broadcast_data['body'] : '';
				$template_data['template_id'] = !empty($broadcast_data['template_id']) ? $broadcast_data['template_id'] : '';
				$this->es_broadcast_preview_callback( $template_data );

			}

		}
	}

	public function prepare_newsletter_settings_form() {
		$newsletter_data = array();
		$templates = ES_Common::prepare_templates_dropdown_options( 'newsletter' );
		$lists = ES_Common::prepare_list_dropdown_options();
		$from_email = ES_Common::get_ig_option( 'from_email' );

		?>

        <div class="wrap">
            <h2 class="wp-heading-inline"><?php _e( 'Campaigns > Broadcast', 'email-subscribers' ); ?>
                <a href="admin.php?page=es_campaigns" class="page-title-action"><?php _e( 'Campaigns', 'email-subscribers' ) ?></a>
                <a href="edit.php?post_type=es_template" class="page-title-action es-imp-button"><?php _e( 'Manage Templates', 'email-subscribers' ) ?></a>
            </h2>
            <div class="es-form" style="width: 100%;">
                <form method="post" action="#">
					<div class="es_newsletters_settings_wrapper">
						<div class="es_campaign_name_wrapper ">
							<input placeholder="Add Broadcast name" type="text" class="es_newsletter_name" name="broadcast_data[name]" value="">
							<input id="ig_es_campaign_submit_button" class="es_primary_btn" type="submit" name="submit" value="Send Broadcast">
							<input type="hidden" name="submitted" value="submitted">
					</div>
						<div class="es_settings_left_pan">
							<div class="es_settings_field">
								<label><?php _e('From Email', 'email-subscribers')?><br/><input type="email"  name="broadcast_data[from_email]" value="<?php echo $from_email; ?>"/></label>
							</div>
							<div class="es_settings_field">
								<label><?php _e('Design template', 'email-subscribers')?><br/><select name="broadcast_data[template_id]" id="base_template_id"><?php echo $templates ?></select></label>
							</div>
							<div class="es_settings_field"><label><?php _e('Subject', 'email-subscribers')?><br/><input type="text" id="ig_es_broadcast_subject" name="broadcast_data[subject]" placeholder="<?php _e('New Broadcast', 'email-subscribers')?>"/></label></div>
							<!-- <div class="es_settings_field"><label><?php _e('Pre Header', 'email-subscribers')?><br/><input type="text" name="broadcast_data[pre_header]"/></label></div> -->
							<div class="es_settings_field">
								<label><?php _e('Body', 'email-subscribers'); ?></label>
								<?php 
									$body = !empty($broadcast_data['body']) ? $broadcast_data['body'] : '';
									$editor_args = array(
										'textarea_name' => 'broadcast_data[body]',
										'textarea_rows' => 40,
										'editor_class' 	=> 'wp-editor-content',
										'media_buttons' => true,
										'tinymce' 		=> true,
										'quicktags'=> true,
										'wpautop' => false,
										'editor_class' => 'wp-editor-boradcast'
									);
								wp_editor( $body, 'edit-es-boradcast-body', $editor_args ); ?>
							</div>
							<?php do_action( 'ig_es_after_broadcast_left_pan_settings'); ?>
						</div>
						<div class="es_settings_right_pan">
							<div class="es_settings_field">
								<label><?php _e('Recipients', 'email-subscribers')?><br/><select name="broadcast_data[list_ids]" id="ig_es_broadcast_list_ids"><?php echo $lists ?></select></label>
							</div>
							<hr>
							<div class="es_settings_field">
								<label>
										<input class="es_secondary_btn" type="submit" id="ig_es_preview_broadcast" value="<?php _e('Preview this email in browser', 'email-subscribers')?>">
										<input type="hidden" name="es_broadcast_preview" id="es_broadcast_preview">
								</label>
							</div>
							<?php do_action( 'ig_es_after_broadcast_right_pan_settings'); ?>
						</div>

					</div>
                </form>
            </div>
            <div clas="es-preview" style="float: right;width: 19%;">
                <div class="es-templ-img"></div>
            </div>
        </div>

		<?php


	}

	// public function setup_sections() {
	// 	add_settings_section( 'newsletters_settings', '', array( $this, 'email_subscribers_settings_callback' ), 'newsletters_settings' );
	// }

	public function email_subscribers_settings_callback( $arguments ) {

		?>
        <!--<div class="email-newsletters">
            <input type="button" id="es_send_email" name="es_send_email" value="Send Email" class="button button-primary">
        </div>-->
		<?php

	}

	// public function email_subscribers_settings_fields() {

	// 	$templates = ES_Common::prepare_templates_dropdown_options( 'newsletter' );
	// 	// $sent_types = ES_Common::prepare_notification_send_type_dropdown_options();
	// 	$groups = ES_Common::prepare_list_dropdown_options();

	// 	$fields = array(
	// 		array(
	// 			'uid'          => 'ig_es_broadcast_base_template_id',
	// 			'label'        => __( 'Select Template', 'email-subscribers' ),
	// 			'section'      => 'newsletters_settings',
	// 			'type'         => 'select',
	// 			'options'      => $templates,
	// 			'placeholder'  => '',
	// 			'helper'       => '',
	// 			'supplemental' => __( 'Content of the selected template will be broadcasted.', 'email-subscribers' ),
	// 			'default'      => ''
	// 		),

	// 		array(
	// 			'uid'          => 'ig_es_broadcast_list_ids',
	// 			'label'        => __( 'Select List', 'email-subscribers' ),
	// 			'section'      => 'newsletters_settings',
	// 			'type'         => 'select',
	// 			'options'      => $groups,
	// 			'placeholder'  => '',
	// 			'helper'       => '',
	// 			'supplemental' => __( 'Contacts from the selected list will be notified.', 'email-subscribers' ),
	// 			'default'      => ''
	// 		),

	// 		array(
	// 			'uid'     => 'ig_es_total_contacts',
	// 			'label'   => __( 'Total Contacts', 'email-subscribers' ),
	// 			'section' => 'newsletters_settings',
	// 			'type'    => 'label',
	// 			'default' => 0
	// 		),
	// 	);
	// 	$fields = apply_filters( 'email_newsletter_settings_fields', $fields );
	// 	foreach ( $fields as $field ) {
	// 		add_settings_field( $field['uid'], $field['label'], array( $this, 'field_callback' ), $field['section'], $field['section'], $field );
	// 		register_setting( 'es_newsletters_settings', $field['uid'] );
	// 	}

	// }

	// public function field_callback( $arguments ) {
	// 	$value = get_option( $arguments['uid'] ); // Get the current value, if there is one
	// 	if ( ! $value && isset( $arguments['default'] ) ) { // If no value exists
	// 		$value = $arguments['default']; // Set to our default
	// 	}

	// 	// Check which type of field we want
	// 	switch ( $arguments['type'] ) {

	// 		case 'label': // If it is a text field
	// 			printf( '<p id="%1$s">%2$s</p>', $arguments['uid'], $value );
	// 			break;

	// 		case 'textarea':
	// 			printf( '<textarea name="%1$s" id="%1$s" placeholder="%2$s" rows="5" cols="50">%3$s</textarea>', $arguments['uid'], $arguments['placeholder'], $value );
	// 			break;
	// 		case 'file':
	// 			echo '<input type="text" id="logo_url" name="' . $arguments['uid'] . '" value="' . $value . '" />
	// 			<input id="upload_logo_button" type="button" class="button" value="Upload Logo" />';
	// 			break;
	// 		case 'select':
	// 			if ( ! empty ( $arguments['options'] ) ) {
	// 				printf( '<select name="%1$s" id="%1$s">%2$s</select>', $arguments['uid'], $arguments['options'] );
	// 			}
	// 			break;

	// 		case 'text':
	// 		case 'email':
	// 		default:
	// 			printf( '<input name="%1$s" id="%1$s" type="%2$s" placeholder="%3$s" value="%4$s" />', $arguments['uid'], $arguments['type'], $arguments['placeholder'], $value );

	// 	}

	// 	// If there is help text
	// 	if ( isset( $arguments['helper'] ) ) {
	// 		printf( '<span class="helper"> %s</span>', $arguments['helper'] ); // Show it
	// 	}

	// 	// If there is supplemental text
	// 	if ( isset( $arguments['supplemental'] ) ) {
	// 		printf( '<p class="description">%s</p>', $arguments['supplemental'] ); // Show it
	// 	}

	// }

	public static function es_send_email_callback( $data ) {

		//$template_id = ! empty( $data['base_template_id'] ) ? $data['base_template_id'] : '';
        $list_id     = ! empty( $data['list_ids'] ) ? $data['list_ids'] : '';

		$title = get_the_title( $data['base_template_id'] );

		$data['type']             = 'newsletter';
		$data['name']             = !empty( $data['name'] ) ? $data['name'] : $data['subject'] ;
		// $data['subject']          = $title;
		$data['slug']             = sanitize_title( sanitize_text_field( $data['name'] ) );
		// $data['list_ids']         = $list_id;
		// $data['base_template_id'] = $template_id;

		$data = apply_filters( 'ig_es_broadcast_data', $data );

		if ( ! empty( $data['base_template_id'] ) ) {

			$post_temp_arr = get_post( $data['base_template_id'] );
			$campaign_id = ES()->campaigns_db->save_campaign( $data );

			if ( is_object( $post_temp_arr ) ) {

				// $post_subject          = ! empty( $post_temp_arr->post_title ) ? $post_temp_arr->post_title : '';
				// $post_template_content = ! empty( $post_temp_arr->post_content ) ? $post_temp_arr->post_content : '';
				$data['body'] = ES_Common::es_process_template_body( $data['body'], $data['base_template_id'], $campaign_id );

				$subscribers = ES()->contacts_db->get_active_contacts_by_list_id( $list_id );

				if ( ! empty( $subscribers ) && count( $subscribers ) > 0 ) {
					$guid = ES_Common::generate_guid( 6 );
					$data = array(
						'hash'        => $guid,
						'campaign_id' => $campaign_id,
						'subject'     => $data['subject'],
						'body'        => $data['body'],
						'count'       => count( $subscribers ),
						'status'      => 'In Queue',
						'start_at'    => ! empty( $data['start_at'] ) ? $data['start_at'] : '',
						'finish_at'   => '',
						'created_at'  => ig_get_current_date_time(),
						'updated_at'  => ig_get_current_date_time(),
						'meta'        => maybe_serialize( array( 'type' => 'newsletter' ) )
					);

					$last_report_id = ES_DB_Mailing_Queue::add_notification( $data );

					$delivery_data                     = array();
					$delivery_data['hash']             = $guid;
					$delivery_data['subscribers']      = $subscribers;
					$delivery_data['campaign_id']      = $campaign_id;
					$delivery_data['mailing_queue_id'] = $last_report_id;
					ES_DB_Sending_Queue::do_batch_insert( $delivery_data );
				}
			}
		}

		return;

	}

	public static function refresh_newsletter_content( $content, $args) {
		$campaign_id = $args['campaign_id'];
		$template_id        = ES()->campaigns_db->get_template_id_by_campaign( $campaign_id );
		$content['subject'] = ES()->campaigns_db->get_column( 'subject', $campaign_id );
		$content['body'] = ES()->campaigns_db->get_column( 'body', $campaign_id );
		$content['body']    = ES_Common::es_process_template_body( $content['body'], $template_id, $campaign_id );
		return $content;
	}

	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

    public function es_broadcast_preview_callback( $template_data ) {

		$template_id = $template_data['template_id'];

		// $template = get_post( $template_id, ARRAY_A );

		if ( !empty($template_data['content'] )) {
			$current_user = wp_get_current_user();
			$username     = $current_user->user_login;
			$useremail    = $current_user->user_email;

			$es_template_body = $template_data['content'] ;

			// $es_template_type = get_post_meta( $template_id, 'es_template_type', true );


			// if ( 'post_notification' === $es_template_type ) {
			// 	$args         = array( 'numberposts' => '1', 'order' => 'DESC', 'post_status' => 'publish' );
			// 	$recent_posts = wp_get_recent_posts( $args );

			// 	if ( count( $recent_posts ) > 0 ) {
			// 		$recent_post = array_shift( $recent_posts );

			// 		$post_id          = $recent_post['ID'];
			// 		$es_template_body = ES_Handle_Post_Notification::prepare_body( $es_template_body, $post_id, $template_id );
			// 	}
			// } else {
			// $es_template_body = ES_Common::es_process_template_body( $es_template_body, $template_id );
			// }

			$es_template_body = ES_Common::es_process_template_body( $es_template_body , $template_id );
			$es_template_body = str_replace( '{{NAME}}', $username, $es_template_body );
			$es_template_body = str_replace( '{{EMAIL}}', $useremail, $es_template_body );

			if ( has_post_thumbnail( $template_id ) ) {
				$image_array = wp_get_attachment_image_src( get_post_thumbnail_id( $template_id ), 'full' );
				$image       = '<img src="' . $image_array[0] . '" class="img-responsive" alt="Image for Post ' . $template_id . '" />';
			} else {
				$image = '';
			}

			$html = '';
			$html .= '<style type="text/css">
							.es-sidebar {
								width: 23%;
							    background-color: rgb(230, 230, 230);
							    padding:15px;
							    border-right: 1px solid #bdbdbd;
							}
							.es-preview {
							    float: left;
								padding:15px;
								width: 70%;
								background-color:#FFF;
								font-size:16px;
							}
						</style>
						<div class="wrap">
							<div class="tool-box">
								<div class="es-main" style="display:flex;">
									<div class="es-sidebar">
										<h2 style="margin-bottom:1em;">
											Template Preview					<a class="add-new-h2" target="_blank" href="' . admin_url() . 'admin.php?page=es-general-information">Help</a>
										</h2>
										<p>
											This is how your email may look.<br><br>Note: Different email services (like gmail, yahoo etc) display email content differently. So there could be a slight variation on how your customer will view the email content.				</p>
									</div>
									<div class="es-preview">' . $es_template_body . '</div>
									<div style="clear:both;"></div>
								</div>
								<div style="clear:both;"></div>
								</div>
								</div>';
			echo apply_filters( 'the_content', $html );
		} else {
			echo 'Please publish it or save it as a draft';
		}

	}


}
