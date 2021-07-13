<?php
/**
 * Created by PhpStorm.
 * User: phucnguyen
 * Date: 07/13/2021
 * Time: 11:06 PM
 */

namespace Yivic\WpPlugin\Elce\Base;

use Yivic\WpPlugin\Elce\Elce;

class Main extends BaseObject {

    /**
     * Frontend constructor.
     * Initialize all hook related to admin
     *
     * @param null
     */
    public function __construct() {
        self::init();
    }

    public function init() {
        add_action( 'wp_footer', [ $this , 'get_contact_number_box' ] ); // add frontend to footer
    }

    /**
     * Get Contact Number Plugin box content
     *
     * @return string
     */
    public static function get_contact_number_box() {
        $options = Elce::instance()->options;
        echo '<pre>';
        print_r($options);
        echo '</pre>';
        die("die");
        $result  = '';
        echo $result;
    }
}