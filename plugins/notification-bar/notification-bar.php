<?php
/*
Plugin Name: Notification Bar
Plugin URI: https://imitationonly.wordpress.com
Description: Creates a notification bar on your website
Version: 1.0
Author: imitationonly
Author URI: https://imitationonly.wordpress.com
License: GPLv3.0+
Text-Domain: notification-bar
*/

/*
    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see https://www.gnu.org/licenses.

    Copyright (C) 2019  Taylor Harris
*/
// Creates a link to the settings page under WP Settings Dashboard
add_action('admin_menu','snb_general_settings_page');
function snb_general_settings_page() {

    add_submenu_page(
        'options-general.php',
        __( 'Notification Bar', 'notification-bar'),
        __( 'Notifications', 'notification-bar'),
        'manage_options',
        'snb_notification_bar',
        'snb_render_settings_page',
    );


}

// Creates Settings Page
function snb_general_settings_page () {
    ?>
    <!---Create a header in the default WP wrap container -->
    <div class="wrap">

        <h2><?php_e( 'Notification Bar Settings', 'notification-bar'); ?></h2>

        <form method="post" action="options.php">

                <?php

                settings_fields( 'snb_general_settings' );
                do_settings_sections( 'snb_general_settings' );

                //Form submit button
                submit_button();
                ?>

        </form>

    </div><!-- /.wrap -->

<?php
}

// Creates settings for plugin

add_action( 'admin_init', 'snb_initialize_settings' );
function snb_initialize_settings() {

    add_settings_section (
        'general_section' ,
        __( 'General Settings', 'notification-bar' ),
        'general_settings_callback' ,
        'snb_general_settings'
    );

    add_settings_field(
        'notification_text' ,
        __( 'Notification Bar', 'notification-bar'),
        'text_input_callback' ,
        'snb_general_settings' ,
        'general_section' ,
        array(
            'label_for' => 'notification_text',
            'option_group' => 'snb_general_settings' ,
            'option_id' => 'notification_text'

            )
        );

    add_settings_field(
        'display_location' ,
        __( 'Where will the notification bar display?' , 'notification-bar' ),
        'radio_input_callback' ,
        'snb_genreal_settings' ,
        'general_section' ,
        array(
            'label_for' => 'display_location' ,
            'option_group' => 'snb_general_settings' ,
            'option_id' => 'display_location',
            'option_description' => 'Display notification bar on the bottom of site',
            'radio_options' => array(
                'display_none' => 'Do not display the notification bar' ,
                'display_top' => 'Display notification bar on top of site' ,
                'display_bottom' => 'Display notification bar on the bottom of site' ,
                )
            )
            );
   
}

>