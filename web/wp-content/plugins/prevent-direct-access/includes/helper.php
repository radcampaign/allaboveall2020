<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Pda_Helper {

	public static function generate_unique_string() {
		return uniqid();
	}

	public static function get_plugin_configs() {
		return array('endpoint' => 'pda_v3_pf');
	}

	public static function get_guid($file_name, $request_url, $file_type) {
		$guid = preg_replace("/-\d+x\d+.$file_type$/", ".$file_type", $request_url);
	}

	/**
	 * Get value of a param.
	 *
	 * @param array|bool  $params  Value need to get.
	 * @param string $key     Key of value.
	 * @param string $default Default value.
	 *
	 * @return string Return $default or value.
	 */
	public static function get( $params, $key, $default = '' ) {
		if ( ! is_array( $params ) || ! isset( $params[ $key ] ) ) {
			return $default;
		}

		return $params[ $key ];
	}

	public static function get_fap_setting( $pda_settings = false ) {
		if ( ! $pda_settings ) {
			$pda_settings = get_option( 'FREE_PDA_SETTINGS', array() );
		}
		$file_access = Pda_Helper::get( $pda_settings, 'file_access_permission', 'author' );

		return empty( $file_access ) ? 'author' : $file_access;
	}

	/**
	 * @return array
	 */
	public static function get_current_roles() {
		if ( is_multisite() && is_super_admin( wp_get_current_user()->ID ) ) {
			$current_roles = array( 'administrator' );
		} else {
			$current_roles = wp_get_current_user()->roles;
		}

		return is_array( $current_roles ) ? $current_roles: array();
	}

	/**
	 * Is admin user role.
	 *
	 * @return bool
	 */
	public static function is_admin_user_role() {
		if ( ! is_user_logged_in() ) {
			return false;
		}

		$current_roles = self::get_current_roles();

		return in_array( 'administrator', $current_roles, true );
	}
}

?>
