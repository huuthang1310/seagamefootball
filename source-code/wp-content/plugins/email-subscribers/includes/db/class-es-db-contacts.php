<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ES_DB_Contacts extends ES_DB {
	/**
	 * @since 4.2.4
	 * @var $table_name
	 *
	 */
	public $table_name;
	/**
	 * @since 4.2.4
	 * @var $version
	 *
	 */
	public $version;
	/**
	 * @since 4.2.4
	 * @var $primary_key
	 *
	 */
	public $primary_key;

	/**
	 * ES_DB_Contacts constructor.
	 *
	 * @since 4.2.4
	 */
	public function __construct() {
		global $wpdb;

		parent::__construct();

		$this->table_name = $wpdb->prefix . 'ig_contacts';

		$this->primary_key = 'id';

		$this->version = '1.0';

	}

	/**
	 * Get columns
	 *
	 * @return array
	 *
	 * @since 4.0.0
	 */
	public function get_columns() {
		return array(
			'id'             => '%d',
			'wp_user_id'     => '%d',
			'first_name'     => '%s',
			'last_name'      => '%s',
			'email'          => '%s',
			'source'         => '%s',
			'form_id'        => '%d',
			'status'         => '%s',
			'unsubscribed'   => '%d',
			'hash'           => '%s',
			'created_at'     => '%s',
			'updated_at'     => '%s',
			'is_verified'    => '%d',
			'is_disposable'  => '%d',
			'is_rolebased'   => '%d',
			'is_webmail'     => '%d',
			'is_deliverable' => '%d',
			'is_sendsafely'  => '%d',
			'meta'           => '%s',
		);
	}

	/**
	 * Get default column values
	 *
	 * @since   4.0.0
	 */
	public function get_column_defaults() {
		return array(
			'wp_user_id'     => 0,
			'first_name'     => '',
			'last_name'      => '',
			'email'          => '',
			'source'         => '',
			'form_id'        => 0,
			'status'         => 'verified',
			'unsubscribed'   => 0,
			'hash'           => '',
			'created_at'     => ig_get_current_date_time(),
			'updated_at'     => '',
			'is_verified'    => 1,
			'is_disposable'  => 0,
			'is_rolebased'   => 0,
			'is_webmail'     => 0,
			'is_deliverable' => 1,
			'is_sendsafely'  => 1,
			'meta'           => '',
		);
	}

	/**
	 * Get by id
	 *
	 * @param $id
	 *
	 * @return array|object|void|null
	 *
	 * @since 4.0.0
	 */
	public function get_by_id( $id ) {
		return $this->get( $id );
	}

	/**
	 * Get contact email name map
	 *
	 * @param array $emails
	 *
	 * @return array
	 *
	 * @since 4.2.2
	 */
	public function get_contacts_email_name_map( $emails = array() ) {

		global $wpdb;

		$subscriber_email_name_map = array();
		if ( count( $emails ) > 0 ) {
			function temp( $v ) {
				return "'" . esc_sql( $v ) . "'";
			}

			$emails = array_map( "temp", $emails );

			$ig_contacts_table = IG_CONTACTS_TABLE;

			$emails_str  = $this->array_to_str( $emails );
			$subscribers = $wpdb->get_results( "SELECT email, first_name, last_name FROM $ig_contacts_table WHERE email IN ( " . $emails_str . ")", ARRAY_A );

			if ( count( $subscribers ) > 0 ) {
				foreach ( $subscribers as $subscriber ) {
					$name = ES_Common::prepare_name_from_first_name_last_name( $subscriber['first_name'], $subscriber['last_name'] );

					$subscriber_email_name_map[ $subscriber['email'] ] = array(
						'name'       => $name,
						'first_name' => $subscriber['first_name'],
						'last_name'  => $subscriber['last_name']
					);
				}
			}
		}

		return $subscriber_email_name_map;

	}

	/**
	 * Get contact hash by contact id
	 *
	 * @param $id
	 *
	 * @return array|string|null
	 *
	 * @since 4.0.0
	 */
	public function get_contact_hash_by_id( $id ) {

		if ( ! empty( $id ) ) {
			return $this->get_column( 'hash', $id );
		}

		return '';

	}

	/**
	 * Is contacts exists based on id & email?
	 *
	 * @param string $id
	 * @param string $email
	 *
	 * @return bool
	 *
	 * @since 4.0.0
	 *
	 * @modify 4.2.4
	 */
	public function is_contact_exists( $id = '', $email = '' ) {
		global $wpdb;

		if ( ! empty( $id ) && ! empty( $email ) ) {

			$where = $wpdb->prepare( 'id = %d AND email = %s', $id, $email );
			$count = $this->count( $where );

			if ( $count ) {
				return true;
			}
		}

		return false;
	}

	/**
	 * Get active contacts by list_id
	 *
	 * @param $list_id
	 *
	 * @return array|object|null
	 *
	 * @since 4.2.4
	 *
	 */
	public function get_active_contacts_by_list_id( $list_id ) {

		if ( empty( $list_id ) ) {
			return array();
		}

		global $wpdb;

		$ig_lists_contacts_table = IG_LISTS_CONTACTS_TABLE;

		$where = $wpdb->prepare( "id IN (SELECT contact_id FROM $ig_lists_contacts_table WHERE list_id = %d AND status IN ('subscribed', 'confirmed'))", $list_id );

		return $this->get_by_conditions( $where );

	}

	/**
	 * Get contacts by ids
	 *
	 * @param $ids
	 *
	 * @return array|object|null
	 *
	 * @since 4.2.1
	 *
	 * @modify 4.2.4
	 */
	public function get_contacts_by_ids( $ids ) {

		if ( ! is_array( $ids ) && ! count( $ids ) > 0 ) {
			return array();
		}

		$ids_str = $this->array_to_str( $ids );

		$where = "id IN ($ids_str)";

		return $this->get_by_conditions( $where );
	}

	/**
	 * Count Active Contacts by list id
	 *
	 * @param string $list_id
	 *
	 * @return string|null
	 *
	 * @since 4.2.4
	 */
	public function count_active_contacts_by_list_id( $list_id = '' ) {

		global $wpdb;

		$ig_lists_contacts_table = IG_LISTS_CONTACTS_TABLE;

		$query = $wpdb->prepare( "SELECT count(distinct(contact_id)) as total_subscribers FROM $ig_lists_contacts_table WHERE status = %s", 'subscribed' );

		if ( ! empty( $list_id ) ) {
			$query .= ' AND list_id = %d';
			$query = $wpdb->prepare( $query, $list_id );
		}

		$subscribers = $wpdb->get_var( $query );

		return $subscribers;

	}

	/**
	 * Delete Contacts by ids
	 *
	 * @param $ids
	 *
	 * @return bool|int
	 *
	 * @since 4.2.4
	 */
	public function delete_contacts_by_ids( $ids ) {
		global $wpdb;

		$ids = array_map( 'absint', $ids );

		$ids = $this->array_to_str( $ids );

		$where = "id IN ($ids)";
		$this->delete_by_condition( $where );

		$ig_lists_contacts_table = IG_LISTS_CONTACTS_TABLE;

		$query = "DELETE FROM $ig_lists_contacts_table WHERE contact_id IN ($ids)";

		return $wpdb->query( $query );
	}

	/**
	 * Update Contact Lists
	 *
	 * @param $ids
	 * @param $list_id
	 *
	 * @return bool
	 *
	 * @since 4.0.0
	 */
	public function update_contacts_list( $ids, $list_id ) {
		global $wpdb;

		$ids = array_map( 'absint', $ids );

		$ids_str = $this->array_to_str( $ids );

		$ig_lists_contacts_table = IG_LISTS_CONTACTS_TABLE;

		//delete all list contact entry
		$query = "DELETE FROM $ig_lists_contacts_table WHERE contact_id IN ($ids_str) ";
		$wpdb->query( $query );

		$values            = $place_holders = array();
		$optin_type_option = get_option( 'ig_es_optin_type', true );
		$optin_type        = 1;
		if ( in_array( $optin_type_option, array( 'double_opt_in', 'double_optin' ) ) ) {
			$optin_type = 2;
		}
		$subscribed_at = ig_get_current_date_time();
		$subscribed_ip = '';
		foreach ( $ids as $contact_id ) {
			array_push( $values, $list_id, $contact_id, 'subscribed', $optin_type, $subscribed_at, $subscribed_ip );
			$place_holders[] = "( %d, %d, %s, %s, %s, %s )"; /* In my case, i know they will always be integers */
		}

		$query = "INSERT INTO $ig_lists_contacts_table (`list_id`, `contact_id`, `status`, `optin_type`, `subscribed_at`, `subscribed_ip` ) VALUES ";
		$query .= $this->array_to_str($place_holders);
		$sql   = $wpdb->prepare( "$query ", $values );
		if ( $wpdb->query( $sql ) ) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Add contacts to list
	 *
	 * @param $ids
	 * @param $list_id
	 *
	 * @return bool
	 *
	 * @since 4.0.0
	 */
	public function add_contacts_to_list( $ids, $list_id ) {
		global $wpdb;

		$ids = array_map( 'absint', $ids );

		$ids_str = $this->array_to_str( $ids );

		$ig_lists_contacts_table = IG_LISTS_CONTACTS_TABLE;

		$delete_list_contact = "DELETE FROM $ig_lists_contacts_table WHERE contact_id IN ($ids_str) AND list_id = %s";
		$del_query           = $wpdb->prepare( $delete_list_contact, array( $list_id ) );
		$wpdb->query( $del_query );

		$values            = $place_holders = array();
		$optin_type_option = get_option( 'ig_es_optin_type', true );
		$optin_type        = 1;
		if ( in_array( $optin_type_option, array( 'double_opt_in', 'double_optin' ) ) ) {
			$optin_type = 2;
		}
		$subscribed_at = ig_get_current_date_time();
		$subscribed_ip = '';
		foreach ( $ids as $contact_id ) {
			array_push( $values, $list_id, $contact_id, 'subscribed', $optin_type, $subscribed_at, $subscribed_ip );
			$place_holders[] = "( %d, %d, %s, %s, %s, %s )"; /* In my case, i know they will always be integers */
		}
		$query = "INSERT INTO " . IG_LISTS_CONTACTS_TABLE . " (`list_id`, `contact_id`, `status`, `optin_type`, `subscribed_at`, `subscribed_ip` ) VALUES ";
		$query .= $this->array_to_str( $place_holders );
		$sql   = $wpdb->prepare( "$query ", $values );
		if ( $wpdb->query( $sql ) ) {
			return true;
		} else {
			return false;
		}
	}

	/**
	 * Edit global status of contact
	 *
	 * @param $ids
	 * @param $unsubscribed
	 *
	 * @return bool|int
	 *
	 * @since 4.2.4
	 */
	public function edit_contact_global_status( $ids, $unsubscribed ) {
		global $wpdb;

		$ig_contacts_table = IG_CONTACTS_TABLE;

		$ids = array_map( 'absint', $ids );

		$ids = $this->array_to_str( $ids );

		$sql   = "UPDATE $ig_contacts_table SET unsubscribed = %d WHERE id IN ($ids)";
		$query = $wpdb->prepare( $sql, array( $unsubscribed ) );

		return $wpdb->query( $query );

	}

	/**
	 * Is Contact exists in list?
	 *
	 * @param $email
	 * @param $list_id
	 *
	 * @return array
	 */
	public function is_contact_exist_in_list( $email, $list_id ) {
		global $wpdb;

		$contact_id = $this->get_column_by( 'id', 'email', $email );

		$data = array();
		if ( ! empty( $contact_id ) ) {
			$data['contact_id'] = $contact_id;

			if ( ! is_array( $list_id ) ) {
				$list_id = array( $list_id );
			}

			$ig_lists_contacts_table = IG_LISTS_CONTACTS_TABLE;

			$list_ids_str = $this->array_to_str( $list_id );

			$list_query = "SELECT count(*) as count FROM $ig_lists_contacts_table WHERE list_id IN ($list_ids_str) AND contact_id = %s";
			$list_sql   = $wpdb->prepare( $list_query, $contact_id );

			$list_contact_count = $wpdb->get_var( $list_sql );
			if ( ! empty( $list_contact_count ) ) {
				$data['list_id'] = true;
			}

			return $data;
		}

		return $data;
	}

	/**
	 * Get Email Details Map
	 *
	 * @return array
	 *
	 * @since 4.0.0
	 */
	public function get_email_details_map() {
		global $wpdb;

		$ig_contacts_table = IG_CONTACTS_TABLE;

		$query    = "SELECT id, email, hash FROM $ig_contacts_table";
		$contacts = $wpdb->get_results( $query, ARRAY_A );
		$details  = array();
		if ( count( $contacts ) > 0 ) {
			foreach ( $contacts as $contact ) {
				$details[ $contact['email'] ]['id']   = $contact['id'];
				$details[ $contact['email'] ]['hash'] = $contact['hash'];
			}
		}

		return $details;

	}

	/**
	 * Get contacts id details map
	 *
	 * @param array $contact_ids
	 *
	 * @return array
	 *
	 * @since 4.2.1
	 *
	 * @modify 4.2.4
	 */
	public function get_details_by_ids( $contact_ids = array() ) {

		$contacts = $this->get_contacts_by_ids( $contact_ids );

		$results = array();
		if ( ! empty( $contacts ) && count( $contacts ) > 0 ) {

			foreach ( $contacts as $contact ) {
				$results[ $contact['id'] ] = $contact;
			}
		}

		return $results;
	}

	/**
	 * Get contact ids by emails
	 *
	 * @param array $emails
	 *
	 * @return array
	 *
	 * @sinc 4.0.0
	 */
	public function get_contact_ids_by_emails( $emails = array() ) {
		global $wpdb;

		$ig_contacts_table = IG_CONTACTS_TABLE;

		$query = "SELECT id FROM $ig_contacts_table";

		if ( count( $emails ) > 0 ) {
			$emails_str = $this->array_to_str( $emails );
			$query      .= " WHERE email IN ($emails_str)";
		}

		$ids = $wpdb->get_col( $query );

		return $ids;
	}

	/**
	 * Get contacts Email => id map
	 *
	 * @param array $emails
	 *
	 * @return array
	 *
	 * @since 4.0.0
	 */
	public function get_email_id_map( $emails = array() ) {
		global $wpdb;

		$ig_contacts_table = IG_CONTACTS_TABLE;

		$query = "SELECT id, email FROM $ig_contacts_table";

		if ( count( $emails ) > 0 ) {
			$emails_str = $this->array_to_str( $emails );
			$query      .= " WHERE email IN ($emails_str)";
		}
		$results = $wpdb->get_results( $query, ARRAY_A );

		$map = array();
		if ( count( $results ) > 0 ) {
			foreach ( $results as $result ) {
				$map[ $result['email'] ] = $result['id'];
			}
		}

		return $map;

	}

	/**
	 * Batch Insert Contacts
	 *
	 * @param $contacts
	 *
	 * @since 4.0.0
	 */
	public function do_batch_insert( $contacts ) {

		// Prepare a batch of 50 contacts.
		$batches = array_chunk( $contacts, 50 );

		$columns = $this->get_columns();
		unset( $columns['id'] );
		$fields = array_keys( $columns );
		foreach ( $batches as $batch ) {
			$values = $place_holders = array();
			foreach ( $batch as $key => $contact ) {

				$contact = wp_parse_args( $contact, $this->get_column_defaults() );

				$formats = array();
				foreach ( $columns as $column => $format ) {
					$values[]  = $contact[ $column ];
					$formats[] = $format;
				}

				$place_holders[] = "( " . implode( ', ', $formats ) . " )";
			}

			ES_DB::do_insert( IG_CONTACTS_TABLE, $fields, $place_holders, $values );
		}
	}

	/**
	 * Get contact id by email
	 *
	 * @param $email
	 *
	 * @return string|null
	 */
	public function get_contact_id_by_email( $email ) {

		if ( empty( $email ) ) {
			return null;
		}

		return $this->get_column_by( 'id', 'email', $email );
	}

	/**
	 * Migrate all subscribers from 3.5.x to contacts table
	 *
	 * @since 4.0.0
	 */
	public function migrate_subscribers_from_older_version() {
		global $wpdb;

		$es_email_list_table = ES_EMAILLIST_TABLE;
		//Get Total count of subscribers
		$query = "SELECT count(*) as total FROM $es_email_list_table";
		$total = $wpdb->get_var( $query );

		// If we have subscribers?
		if ( $total > 0 ) {

			// Get all existing Contacts
			$emails = $this->get_column( 'email' );
			if ( ! is_array( $emails ) ) {
				$emails = array();
			}

			// Import subscribers into batch of 100
			$batch_size     = IG_DEFAULT_BATCH_SIZE;
			$total_batches  = ( $total > IG_DEFAULT_BATCH_SIZE ) ? ceil( $total / $batch_size ) : 1;
			$lists_contacts = array();
			//$exclude_status = array( 'Unsubscribed', 'Unconfirmed' );
			$j = 0;
			for ( $i = 0; $i < $total_batches; $i ++ ) {
				$batch_start = $i * $batch_size;
				$query       = "SELECT * FROM $es_email_list_table LIMIT {$batch_start}, {$batch_size} ";
				$results     = $wpdb->get_results( $query, ARRAY_A );
				if ( count( $results ) > 0 ) {
					$contacts = array();
					foreach ( $results as $key => $result ) {
						$email = $result['es_email_mail'];
						if ( ! in_array( $email, $emails ) ) {

							$contacts[ $key ] = $result;

							$names = array(
								'first_name' => '',
								'last_name'  => ''
							);

							if ( ! empty( $result['es_email_name'] ) ) {
								$names = ES_Common::prepare_first_name_last_name( $result['es_email_name'] );
							} else {
								$name = ES_Common::get_name_from_email( $email );

								$names['first_name'] = $name;
							}

							$contacts[ $key ]['first_name']   = $names['first_name'];
							$contacts[ $key ]['last_name']    = $names['last_name'];
							$contacts[ $key ]['email']        = $email;
							$contacts[ $key ]['source']       = 'Migrated';
							$contacts[ $key ]['status']       = ( 'spam' === strtolower( $result['es_email_status'] ) ) ? 'spam' : 'verified';
							$contacts[ $key ]['unsubscribed'] = ( $result['es_email_status'] === 'Unsubscribed' ) ? 1 : 0;
							$contacts[ $key ]['hash']         = $result['es_email_guid'];
							$contacts[ $key ]['created_at']   = $result['es_email_created'];
							$contacts[ $key ]['updated_at']   = ig_get_current_date_time();

							$emails[] = $email;
						}

						//Collect all contacts based on Lists
						//if ( ! in_array( $result['es_email_status'], $exclude_status ) ) {
						$lists_contacts[ $result['es_email_group'] ][ $j ]['email']         = $email;
						$lists_contacts[ $result['es_email_group'] ][ $j ]['status']        = $result['es_email_status'];
						$lists_contacts[ $result['es_email_group'] ][ $j ]['subscribed_at'] = $result['es_email_created'];
						$lists_contacts[ $result['es_email_group'] ][ $j ]['subscribed_ip'] = null;
						$j ++;
						//}
					}

					$this->do_batch_insert( $contacts );
				}

			}

			//Do import Lists Contacts
			if ( count( $lists_contacts ) > 0 ) {
				$list_name_id_map = ES()->lists_db->get_list_id_name_map( '', true );
				foreach ( $lists_contacts as $list_name => $contacts ) {
					if ( ! empty( $list_name_id_map[ $list_name ] ) ) {
						ES_DB_Lists_Contacts::import_contacts_into_lists( $list_name_id_map[ $list_name ], $contacts );
					}
				}
			}
		}
	}

	/**
	 * Edit List Contact Status
	 *
	 * @param $contact_ids
	 * @param $list_ids
	 * @param $status
	 *
	 * @return bool|int
	 *
	 * @since 4.2.0
	 */
	public function edit_list_contact_status( $contact_ids, $list_ids, $status ) {
		global $wpdb;

		$ids      = array_map( 'absint', $contact_ids );
		$ids      = $this->array_to_str($ids);

		$list_ids = array_map( 'absint', $list_ids );
		$list_ids = $this->array_to_str($list_ids);

		$current_date = ig_get_current_date_time();

		$ig_contacts_table = IG_LISTS_CONTACTS_TABLE;

		if ( 'subscribed' === $status ) {
			$sql   = "UPDATE $ig_contacts_table SET status = %s, subscribed_at = %s WHERE contact_id IN ($ids) AND list_id IN ($list_ids)";
			$query = $wpdb->prepare( $sql, array( $status, $current_date ) );
		} elseif ( 'unsubscribed' === $status ) {
			$sql   = "UPDATE $ig_contacts_table SET status = %s, unsubscribed_at = %s WHERE contact_id IN ($ids) AND list_id IN ($list_ids)";
			$query = $wpdb->prepare( $sql, array( $status, $current_date ) );
		} elseif ( 'unconfirmed' === $status ) {
			$sql   = "UPDATE $ig_contacts_table SET status = %s, optin_type = %d, subscribed_at = NULL, unsubscribed_at = NULL WHERE contact_id IN ($ids) AND list_id IN ($list_ids)";
			$query = $wpdb->prepare( $sql, array( $status, IG_DOUBLE_OPTIN ) );
		}

		return $wpdb->query( $query );

	}
}
