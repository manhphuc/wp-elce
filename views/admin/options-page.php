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
        <h1><?= __( 'Easy Live Chat Express', Elce::text_domain() ) ?></h1>
    </div>

    <div class="options">
        <div class="options_left">
            <div class="inside">
                <form method="post" action="options.php" id="options">
                    <?php settings_fields( Elce::OPTION_GROUP_NAME ); ?>
                    <h3 class="title"><?= __( 'Contact App Settings', Elce::text_domain() ) ?></h3>
                    <table class="form-table">
                        <tr valign="top">
                            <th scope="row">
                                <label for="phone_app_number"><?= __( 'Phone', Elce::text_domain() ) ?></label>
                            </th>
                            <td>
                                <input placeholder="0123 456 789" id="phone_app_number" class="standard-input" type="text" name="elce[phone_app_number]"
                                       value="<?php echo $options['phone_app_number']; ?>"/>
                            </td>
                        </tr>

                        <tr valign="top">
                            <th scope="row">
                                <label for="phone_app_color"><?= __( 'Color', Elce::text_domain() ) ?></label>
                            </th>
                            <td>
                                <input id="phone_app_color" class="my-color-field" type="text" name="elce[phone_app_color]"
                                       value="<?php echo $options['phone_app_color']; ?>"/>
                            </td>
                        </tr>

                        <tr valign="top" style=" border-bottom: 1px dashed #bfbfbf; ">
                            <th scope="row"><label for="phone_app_bar"><?= __( 'Hotline bar (show/hide)', Elce::text_domain() ) ?></label></th>
                            <td>
                                <input id="phone_app_bar" name="elce[phone_app_bar]" type="checkbox"
                                       value="1" <?php checked( 1, $options['phone_app_bar'] ); ?> />
                                <small><?= __( 'Show phone number next to button or hide.', Elce::text_domain() ) ?></small>
                            </td>
                        </tr>

                        <tr valign="top">
                            <th scope="row">
                                <label for="zalo_app_number"><?= __( 'Zalo', Elce::text_domain() ) ?></label>
                            </th>
                            <td>
                                <input placeholder="0123 456 789" id="zalo_app_number" class="standard-input" type="text" name="elce[zalo_app_number]"
                                       value="<?php echo $options['zalo_app_number']; ?>"/>
                            </td>
                        </tr>

                        <tr valign="top">
                            <th scope="row">
                                <label for="viber_app_number"><?= __( 'Viber', Elce::text_domain() ) ?></label>
                            </th>
                            <td>
                                <input placeholder="0123 456 789" id="viber_app_number" class="standard-input" type="text" name="elce[viber_app_number]"
                                       value="<?php echo $options['viber_app_number']; ?>"/>
                            </td>
                        </tr>

                        <tr valign="top">
                            <th scope="row">
                                <label for="contact_app_link"><?= __( 'Contact link', Elce::text_domain() ) ?></label>
                            </th>
                            <td>
                                <input placeholder="/contact/" id="contact_app_link" class="standard-input" type="text" name="elce[contact_app_link]"
                                       value="<?php echo $options['contact_app_link']; ?>"/>
                            </td>
                        </tr>

                        <tr valign="top" style=" border-bottom: 1px dashed #bfbfbf; ">
                            <th scope="row">
                                <label for="contact_link_app_color"><?= __( 'Color', Elce::text_domain() ) ?></label>
                            </th>
                            <td>
                                <input id="contact_link_app_color" class="my-color-field" type="text" name="elce[contact_link_app_color]"
                                       value="<?php echo $options['contact_link_app_color']; ?>"/>
                            </td>
                        </tr>
                    </table>

                    <h3 class="title"><?= __( 'Main Settings', Elce::text_domain() ) ?></h3>
                    <table class="form-table">
                        <small><?= __( 'Please come back later!', Elce::text_domain() ) ?></small>
                    </table>

                    <h3 class="title"><?= __( 'Display Settings', Elce::text_domain() ) ?></h3>
                    <table class="form-table">
                        <small><?= __( 'Please come back later!', Elce::text_domain() ) ?></small>
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