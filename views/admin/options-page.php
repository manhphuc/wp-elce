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
            <div class="inside">
                <form method="post" action="options.php" id="options">
                    <?php settings_fields( Elce::OPTION_GROUP_NAME ); ?>
                    <h3 class="title"><?php __( 'Contact App Settings', Elce::text_domain() ) ?></h3>
                    <table class="form-table">
                        <tr valign="top">
                            <th scope="row">
                                <label for="phone_app_number"><?php __( 'Phone', Elce::text_domain() ) ?></label>
                            </th>
                            <td>
                                <input placeholder="0123 456 789" id="phone_app_number" class="standard-input" type="text" name="elce[phone_app_number]"
                                       value="<?php echo $options['phone_app_number']; ?>"/>
                            </td>
                        </tr>

                        <tr valign="top">
                            <th scope="row">
                                <label for="phone_app_color"><?php __( 'Color', Elce::text_domain() ) ?></label>
                            </th>
                            <td>
                                <input id="phone_app_color" class="my-color-field" type="text" name="elce[phone_app_color]"
                                       value="<?php echo $options['phone_app_color']; ?>"/>
                            </td>
                        </tr>

                        <tr valign="top" style=" border-bottom: 1px dashed #bfbfbf; ">
                            <th scope="row"><label for="phone_app_bar"><?php __( 'Hotline bar (show/hide)', Elce::text_domain() ) ?></label></th>
                            <td>
                                <input id="phone_app_bar" name="elce[phone_app_bar]" type="checkbox"
                                       value="1" <?php checked( 1, $options['phone_app_bar'] ); ?> />
                                <small><?php __( 'Show phone number next to button or hide.', Elce::text_domain() ) ?></small>
                            </td>
                        </tr>

                        <tr valign="top">
                            <th scope="row">
                                <label for="zalo_app_number"><?php __( 'Zalo', Elce::text_domain() ) ?></label>
                            </th>
                            <td>
                                <input placeholder="0123 456 789" id="zalo_app_number" class="standard-input" type="text" name="elce[zalo_app_number]"
                                       value="<?php echo $options['zalo_app_number']; ?>"/>
                            </td>
                        </tr>

                        <tr valign="top">
                            <th scope="row">
                                <label for="messenger_app_link"><?php __( 'Messenger', Elce::text_domain() ) ?></label>
                            </th>
                            <td>
                                <input placeholder="fb_id" id="messenger_app_link" class="standard-input" type="text" name="elce[messenger_app_link]"
                                       value="<?php echo $options['messenger_app_link']; ?>"/>
                            </td>
                        </tr>

                        <tr valign="top" style=" border-bottom: 1px dashed #bfbfbf; ">
                            <th scope="row">
                                <label for="contact_app_link"><?php __( 'Contact link', Elce::text_domain() ) ?></label>
                            </th>
                            <td>
                                <input placeholder="/contact/" id="contact_app_link" class="standard-input" type="text" name="elce[contact_app_link]"
                                       value="<?php echo $options['contact_app_link']; ?>"/>
                            </td>
                        </tr>
                    </table>

                    <h3 class="title"><?php __( 'Display Settings', Elce::text_domain() ) ?></h3>
                    <table class="form-table">

                        <tr valign="top">
                            <th scope="row"><label
                                        for="location_display"><?php __( 'Location', Elce::text_domain() ) ?></label></th>
                            <td>
                                <select id="location_display" name="elce[location_display]">
                                    <option value="left"<?php if ( $options['location_display'] == 'left' ) {
                                        echo ' selected="selected"';
                                    } ?>>
                                        <?php __( 'Left', Elce::text_domain() ) ?>
                                    </option>
                                    <option value="right"<?php if ( $options['location_display'] == 'right' ) {
                                        echo ' selected="selected"';
                                    } ?>>
                                        <?php __( 'Right', Elce::text_domain() ) ?>
                                    </option>
                                </select>
                            </td>
                        </tr>

                        <tr valign="top">
                            <th scope="row"><label for="hide_on_label">Hide on</label></th>
                            <td>
                                <input id="hide_app_desktop" name="elce[hide_app_desktop]" type="checkbox"
                                       value="1" <?php checked( 1, $options['hide_app_desktop'] ); ?> />
                                <small><?php __( 'Button will not be displayed on desktop sized devices.', Elce::text_domain() ) ?></small>
                            </td>
                            <td>
                                <input id="hide_app_mobile" name="elce[hide_app_mobile]" type="checkbox"
                                       value="1" <?php checked( 1, $options['hide_app_mobile'] ); ?> />
                                <small><?php __( 'Button will not be displayed on small devices like on mobile.', Elce::text_domain() ) ?></small>
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