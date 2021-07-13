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
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] ); //add style to frontend
    }

    //add style to frontend
    public function enqueue_scripts() {
        wp_enqueue_style('elce_style', Elce::plugin_dir_url() . 'assets/dist/css/elce-style.css');
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
//        die("die");
        $elcePhone = $options['phone_app_number'] ? $options['phone_app_number'] : '';
        $result  = '';
        $result .= '<div class="wp-elce">';
        if( !empty( $elcePhone ) ) :
        $result .= '   <div id="elce-phone" class="elce-contact">';
        $result .= '        <div class="elce-phone">';
        $result .= '            <div class="elce-phone-circle-fill"></div>';
        $result .= '            <div class="elce-phone-img-circle">';
        $result .= '                <a href="tel:'.$elcePhone.'">';
        $result .= '                    <img src="'.Elce::plugin_dir_url().'assets/src/images/phone.png">';
        $result .= '                </a>';
        $result .= '            </div>';
        $result .= '        </div>';
        $result .= '   </div>';
        if( $options['phone_app_bar'] == true ) {
            $result .= '   <div class="phone-bar phone-bar-n">';
            $result .= '        <div class="phone-bar phone-bar-n">';
            $result .= '            <a href="tel:'.$elcePhone.'">';
            $result .= '                <span class="text-phone">'.$elcePhone.'</span>';
            $result .= '            </a>';
            $result .= '        </div>';
            $result .= '   </div>';
        }
        $phoneColor = !empty( $options['phone_app_color'] ) ? $options['phone_app_color'] : '#dd382d';
        $result .= '
            <style>
                .phone-bar a, #elce-phone .elce-phone-circle-fill, #elce-phone .elce-phone-img-circle, #elce-phone .phone-bar a {
                    background-color: '.$phoneColor.';
                }
                #elce-phone .elce-phone-circle-fill {
                    opacity: 0.7;box-shadow: 0 0 0 0 '.$phoneColor.';
                }
            </style>
        ';

        endif;
        $result .= '</div>';
        echo $result;
    }
}