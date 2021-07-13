<?php
/**
 * Created by PhpStorm.
 * User: phucnguyen
 * Date: 07/13/2021
 * Time: 11:23 PM
 */

use \Yivic\WpPlugin\Elce\Elce;

//wp_enqueue_style('elce_admin', Elce::plugin_dir_url() . '/assets/dist/css/admin.css');
?>
<div class="options">
    <div class="options_header">
        <h1><?= __( 'Easy Live Chat Express', Elce::text_domain() ) ?></h1>
    </div>

    <div class="options">
        <div class="options_left">
            <div class="inside">
                <h3>Options Left</h3>
            </div>
        </div>
        <div class="options_right">
            <h3>Options Right</h3>
        </div>
    </div>
</div>