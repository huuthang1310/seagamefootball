<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class ES_DB_Actions extends ES_DB {
	/**
	 * @since 4.2.1
	 * @var $table_name
	 *
	 */
	public $table_name;
	/**
	 * @since 4.2.1
	 * @var $version
	 *
	 */
	public $version;
	/**
	 * @since 4.2.1
	 * @var $primary_key
	 *
	 */
	public $primary_key;

	/**
	 * ES_DB_Lists constructor.
	 *
	 * @since 4.2.1
	 */
	public function __construct() {
		global $wpdb;

		$this->table_name = $wpdb->prefix . 'ig_actions';

		$this->version = '1.0';

	}

	/**
	 * Get table columns
	 *
	 * @return array
	 *
	 * @since 4.2.1
	 */
	public function get_columns() {
		return array(
			'contact_id'  => '%d',
			'message_id'  => '%d',
			'campaign_id' => '%d',
			'type'        => '%d',
			'count'       => '%d',
			'link_id'     => '%d',
			'list_id'     => '%d',
			'created_at'  => '%d',
			'updated_at'  => '%d'
		);
	}

	/**
	 * Get default column values
	 *
	 * @since  4.2.1
	 */
	public function get_column_defaults() {
		return array(
			'contact_id'  => null,
			'message_id'  => null,
			'campaign_id' => null,
			'type'        => 0,
			'count'       => 0,
			'link_id'     => 0,
			'list_id'     => 0,
			'created_at'  => ig_es_get_current_gmt_timestamp(),
			'updated_at'  => ig_es_get_current_gmt_timestamp()
		);
	}

	/**
	 * Track action
	 *
	 * @param $args
	 * @param bool $explicit
	 *
	 * @return bool
	 *
	 * @since 4.2.4
	 */
	public function add( $args, $explicit = true ) {

		global $wpdb;

		$ig_actions_table = IG_ACTIONS_TABLE;

		$args_keys     = array_keys( $args );
		$args_keys_str = $this->array_to_str( $args_keys );

		$sql = "INSERT INTO $ig_actions_table ($args_keys_str)";

		$args_values = array_values( $args );

		$args_values_str = $this->array_to_str( $args_values, "', '" );

		$sql .= " VALUES ('{$args_values_str}') ON DUPLICATE KEY UPDATE";

		$sql .= ( $explicit ) ? $wpdb->prepare( " created_at = created_at, count = count+1, updated_at = %d", ig_es_get_current_gmt_timestamp() ) : ' count = values(count)';

		$result = $wpdb->query( $sql );

		if ( false !== $result ) {
			return true;
		}

		return false;
	}
}
