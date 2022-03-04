<?php
/**
 * Created by PhpStorm.
 * User: phucnguyen
 * Date: 07/13/2021
 * Time: 11:23 PM
 */

use \Yivic\WpPlugin\Elce\Elce;

wp_enqueue_style('elce_admin', Elce::plugin_dir_url() . 'assets/dist/css/admin.css');
wp_enqueue_script( 'elce_admin_script', Elce::plugin_dir_url() . 'assets/dist/js/admin.js', [ 'wp-color-picker' ], false, true );
?>
<div class="options">
    <div class="options_header">
        <h1><?php __( 'Easy Live Chat Express', Elce::text_domain() ) ?></h1>
    </div>

    <div class="options">
        <div class="options_left">
            <h3>Options Left</h3>
            <div class="inside">
                <form method="post" action="options.php" id="options">
                    <?php settings_fields( Elce::OPTION_GROUP_NAME ); ?>
                    <h3 class="title"><?php __( 'Contact App Settings', Elce::text_domain() ) ?></h3>
                    <table class="form-table">
                        <tr valign="top">
                            <th scope="row">
                                <label for="phone_app_number"><?php esc_attr_e( 'Phone', Elce::text_domain() ) ?></label>
                            </th>
                            <td>
                                <input placeholder="0123 456 789" id="phone_app_number" class="standard-input" type="text" name="elce[phone_app_number]"
                                       value="<?php esc_html_e( $options['phone_app_number'], Elce::text_domain() ); ?>"/>
                            </td>
                        </tr>

                        <tr valign="top">
                            <th scope="row">
                                <label for="phone_app_color"><?php esc_attr_e( 'Color', Elce::text_domain() ) ?></label>
                            </th>
                            <td>
                                <input id="phone_app_color" class="my-color-field" type="text" name="elce[phone_app_color]"
                                       value="<?php esc_html_e( $options['phone_app_color'], Elce::text_domain() ); ?>"/>
                            </td>
                        </tr>

                        <tr valign="top" style=" border-bottom: 1px dashed #bfbfbf; ">
                            <th scope="row"><label for="phone_app_bar"><?php esc_attr_e( 'Hotline bar (show/hide)', Elce::text_domain() ) ?></label></th>
                            <td>
                                <?php if ( ! isset( $options['phone_app_bar'] ) ) {
                                    $options['phone_app_bar'] = 0;
                                } ?>
                                <input id="phone_app_bar" name="elce[phone_app_bar]" type="checkbox"
                                       value="1" <?php checked( $options['phone_app_bar'], 1 ); ?> />
                                <small><?php esc_attr_e( 'Show phone number next to button or hide.', Elce::text_domain() ) ?></small>
                            </td>
                        </tr>

                        <tr valign="top">
                            <th scope="row">
                                <label for="zalo_app_number"><?php esc_attr_e( 'Zalo', Elce::text_domain() ) ?></label>
                            </th>
                            <td>
                                <input placeholder="0123 456 789" id="zalo_app_number" class="standard-input" type="text" name="elce[zalo_app_number]"
                                       value="<?php esc_html_e( $options['zalo_app_number'], Elce::text_domain() ); ?>"/>
                            </td>
                        </tr>

                        <tr valign="top">
                            <th scope="row">
                                <label for="messenger_app_link"><?php esc_attr_e( 'Messenger', Elce::text_domain() ) ?></label>
                            </th>
                            <td>
                                <input placeholder="fb_id" id="messenger_app_link" class="standard-input" type="text" name="elce[messenger_app_link]"
                                       value="<?php esc_html_e( $options['messenger_app_link'], Elce::text_domain() ); ?>"/>
                            </td>
                        </tr>

                        <tr valign="top" style=" border-bottom: 1px dashed #bfbfbf; ">
                            <th scope="row">
                                <label for="contact_app_link"><?php esc_attr_e( 'Contact link', Elce::text_domain() ) ?></label>
                            </th>
                            <td>
                                <input placeholder="/contact/" id="contact_app_link" class="standard-input" type="text" name="elce[contact_app_link]"
                                       value="<?php esc_html_e( $options['contact_app_link'], Elce::text_domain() ); ?>"/>
                            </td>
                        </tr>
                    </table>

                    <h3 class="title"><?php esc_attr_e( 'Display Settings', Elce::text_domain() ) ?></h3>
                    <table class="form-table">

                        <tr valign="top">
                            <th scope="row"><label
                                        for="location_display"><?php esc_attr_e( 'Location', Elce::text_domain() ) ?></label></th>
                            <td>
                                <select id="location_display" name="elce[location_display]">
                                    <option value="left"<?php if ( $options['location_display'] == 'left' ) {
                                        echo ' selected="selected"';
                                    } ?>>
                                        <?php esc_attr_e( 'Left', Elce::text_domain() ) ?>
                                    </option>
                                    <option value="right"<?php if ( $options['location_display'] == 'right' ) {
                                        echo ' selected="selected"';
                                    } ?>>
                                        <?php esc_attr_e( 'Right', Elce::text_domain() ) ?>
                                    </option>
                                </select>
                            </td>
                        </tr>

                        <tr valign="top">
                            <th scope="row"><label for="hide_on_label">Hide on</label></th>
                            <td>
                                <?php if ( ! isset( $options['hide_app_desktop'] ) ) {
                                    $options['hide_app_desktop'] = 0;
                                } ?>
                                <input id="hide_app_desktop" name="elce[hide_app_desktop]" type="checkbox"
                                       value="1" <?php checked( $options['hide_app_desktop'], 1 ); ?> />
                                <small><?php esc_attr_e( 'Button will not be displayed on desktop sized devices.', Elce::text_domain() ) ?></small>
                            </td>
                            <td>
                                <?php if ( ! isset( $options['hide_app_mobile'] ) ) {
                                    $options['hide_app_mobile'] = 0;
                                } ?>
                                <input id="hide_app_mobile" name="elce[hide_app_mobile]" type="checkbox"
                                       value="1" <?php checked( $options['hide_app_mobile'], 1 ); ?> />
                                <small><?php esc_attr_e( 'Button will not be displayed on small devices like on mobile.', Elce::text_domain() ) ?></small>
                            </td>
                        </tr>

                    </table>

                    <p class="submit">
                        <input type="submit" class="button-primary" value="<?php _e( 'Save Changes' ) ?>"/>
                    </p>
                </form>
            </div>
        </div>
        <div class="options_right">
            <h3>Options Right</h3>
        </div>
    </div>
</div>