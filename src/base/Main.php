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
        $result  = '';
        $result .= '<div class="wp-elce">';

        // Contact section
        $elceContact          = $options['contact_app_link'] ? $options['contact_app_link'] : '';
        if( !empty( $elceContact ) ) :
            $result .= '   <div id="elce-contact" class="elce-contact">';
            $result .= '        <div class="elce-phone">';
            $result .= '            <div class="elce-phone-circle-fill"></div>';
            $result .= '            <div class="elce-phone-img-circle">';
            $result .= '                <a target="_blank" href="'.$elceContact.'">';
            $result .= '                    <img src="'.Elce::plugin_dir_url().'assets/src/images/contact.png">';
            $result .= '                </a>';
            $result .= '            </div>';
            $result .= '        </div>';
            $result .= '   </div>';
        endif;
        // End Contact section

        // Messenger section
        $elceMessenger          = $options['messenger_app_link'] ? $options['messenger_app_link'] : '';
        if( !empty( $elceMessenger ) ) :
            $result .= '   <div id="elce-messenger" class="elce-contact">';
            $result .= '        <div class="elce-phone">';
            $result .= '            <div class="elce-phone-circle-fill"></div>';
            $result .= '            <div class="elce-phone-img-circle">';
            $result .= '                <a target="_blank" href="http://m.me/'.$elceMessenger.'">';
            $result .= '                    <img src="'.Elce::plugin_dir_url().'assets/src/images/messenger.png">';
            $result .= '                </a>';
            $result .= '            </div>';
            $result .= '        </div>';
            $result .= '   </div>';
        endif;
        // End messenger section

        // Zalo section
        $elceZalo       = $options['zalo_app_number'] ? $options['zalo_app_number'] : '';
        $getElceZalo    = preg_replace( '/\D/', '', $elceZalo);
        if( !empty( $elceZalo ) ) :
            $result .= '   <div id="elce-zalo" class="elce-contact">';
            $result .= '        <div class="elce-phone">';
            $result .= '            <div class="elce-phone-circle-fill"></div>';
            $result .= '            <div class="elce-phone-img-circle">';
            $result .= '                <a target="_blank" href="https://zalo.me/'.$getElceZalo.'">';
            $result .= '                    <img src="'.Elce::plugin_dir_url().'assets/src/images/zalo.png">';
            $result .= '                </a>';
            $result .= '            </div>';
            $result .= '        </div>';
            $result .= '   </div>';
        endif;
        // End zalo section

        // Phone section
        $elcePhone = $options['phone_app_number'] ? $options['phone_app_number'] : '';
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
        if( !empty( $options['phone_app_bar'] ) == true ) {
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
        // End phone section

        // Check select location
        if( $options['location_display'] == 'right' ) :
        $result .= '
            <style>
                .wp-elce {right:0;}
			    .phone-bar a {left: auto;right: 30px;padding: 8px 55px 7px 15px;}
            </style>
        ';
        endif;

        // Check hide device mobile
        if( !empty( $options['hide_app_mobile'] ) == true ) :
            $result .= '
            <style>
                @media(max-width: 736px){
                    .wp-elce {display: none;}
                }
            </style>
        ';
        endif;

        // Check hide device desktop
        if( !empty( $options['hide_app_desktop'] ) == true ) :
            $result .= '
            <style>
                @media(min-width: 736px){
				    .wp-elce {display: none;}
			    }
            </style>
        ';
        endif;

        $result .= '</div>';
        _e( $result, Elce::text_domain() );
    }
}