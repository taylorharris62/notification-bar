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

>