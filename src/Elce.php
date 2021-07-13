<?php
/**
 * Created by PhpStorm.
 * User: phucnguyen
 * Date: 07/13/2021
 * Time: 9:59 PM
 */

namespace Yivic\WpPlugin\Elce;


use Yivic\WpPlugin\Elce\Base\Admin;
use Yivic\WpPlugin\Elce\Base\Main;

class Elce {
	const OPTION_KEY = 'elce';
	const OPTION_GROUP_NAME = 'elce_options';

	/**
	 * @var null|Elce
	 */
	static protected $_instance = null;

	/**
	 * @var null|Admin
	 */
	public $admin = null;

	/**
	 * @var null|Main
	 */
	public $main = null;
	public $wp_cli_command = null;

	public $text_domain = null;
	public $plugin_dir_path = null;
	public $plugin_dir_url = null;

	/**
	 * @var mixed|null options of the plugin from database
	 */
	public $options = null;

	/**
	 * Elce constructor.
	 * Only invoked for singleton object
	 *
	 * @param null $config
	 */
	private function __construct( $config = null ) {
		foreach ( $config as $config_key => $config_val ) {
			if ( property_exists( $this, $config_key ) ) {
				$this->$config_key = $config_val;
			}
		}

		$this->options = get_option( static::OPTION_KEY );
	}

	/**
	 * Get singleton instance
	 *
	 * @param $config null|array config params for the instance
	 *
	 * @return static|null
	 */
	public static function instance( $config = null ) {
		if ( null === static::$_instance ) {
			static::$_instance = new static( $config );
		}

		return static::$_instance;
	}

	/**
	 * Get the text domain of the plugin
	 *
	 * @return null|string
	 */
	public static function text_domain() {
		return static::instance()->text_domain;
	}

	/**
	 * Get the plugin directory
	 *
	 * @return null|string
	 */
	public static function plugin_dir_path() {
		return static::instance()->plugin_dir_path;
	}

	/**
	 * Get the plugin url
	 *
	 * @return null|string
	 */
	public static function plugin_dir_url() {
		return static::instance()->plugin_dir_url;
	}

	/**
	 * Add more links to plugin links in Admin Plugin screen
	 *
	 * @param $links
	 *
	 * @return mixed
	 */
	public static function plugin_action_links( $links ) {
		$file_name     = 'options-general.php';
		$settings_link = '<a href="' . $file_name . '?page=elce">' . __( 'Settings', static::text_domain() ) . '</a>';
		array_unshift( $links, $settings_link );

		return $links;
	}

	/**
	 * Get default option values for the plugin
	 *
	 * @return array
	 */
	public static function default_options() {
		return [
			'title_text'           => __( 'Easy Live Chat Express', static::text_domain() ),
			'title_class'          => null,
			'title_id'             => null,
		];
	}

	public function init() {
		if ( is_admin() ) {
			if ( null === static::$_instance->admin ) {
				static::$_instance->admin = new Admin();
			}
		}

		if ( null === static::$_instance->main ) {
			static::$_instance->main = new Main();
		}
	}

}