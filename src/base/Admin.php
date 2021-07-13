<?php
/**
 * Created by PhpStorm.
 * Author: manhphucofficial@yahoo.com
 * Date time: 07/13/2021 11:20 AM
 */

namespace Yivic\WpPlugin\Elce\Base;


use Yivic\WpPlugin\Elce\Elce;

class Admin extends BaseObject {

	/**
	 * Admin constructor.
	 * Initialize all hook related to admin
	 *
	 * @param null $config
	 */
	public function __construct( $config = null ) {
		add_action( 'admin_init', [ $this, 'admin_init' ] );
		add_action( 'admin_menu', [ $this, 'admin_menu' ] );
	}

	/**
	 * Hook to attach to admin_init action
	 * Import old options to group option
	 */
	function admin_init() {
		register_setting( Elce::OPTION_GROUP_NAME, Elce::OPTION_KEY );
	}

	/**
	 * Hook to attach to admin_menu action
	 * Add more menu item to admin menu
	 */
	function admin_menu() {
		add_submenu_page( 'options-general.php', 'Yivic - Easy Live Chat Express', 'Yivic - ELCE Options', 'manage_options', 'elce', [
			$this,
			'display_options_page'
		] );
	}

	/**
	 * Display options page in Admin Panel
	 */
	function display_options_page() {
		$options = get_option( Elce::OPTION_KEY );
		if ( empty($options)  ) {
			$options = Elce::default_options();
		}

		include( Elce::plugin_dir_path() . '/views/admin/options-page.php' );
	}

	/**
	 * Hook to attach to admin_menu action
	 * Add more menu item to admin menu
	 */
	function display_options() {
		add_menu_page( 'Easy Live Chat Express Options', 'Shopback - Easy Live Chat Express', 'manage_options', 'elce', [
			$this,
			'options'
		] );
	}

}