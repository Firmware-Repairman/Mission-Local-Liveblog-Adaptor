<?php
/*
 * Plugin Name: Mission-Local-Liveblog-Adaptor
 * Plugin URI: https://github.com/Firmware-Repairman/Mission-Local-Liveblog-Adaptor
 * Description: Move live blog content from Liveblog24 servers to local post
 * Version: 1.0.0
 * Author: Craig Mautner
 * Author URI: https://firmware-repairman.pro/
 * License: GPL3
 *
 *	Copyright 2023 Craig Mautner (email : firmware.repairman@gmail.com)
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <https://www.gnu.org/licenses/>.
*/

if (!class_exists("MissionLocalLiveblogAdapter")) {
	class MissionLocalLiveblogAdapter {
		function __construct() {
			add_action( 'init', array( &$this, 'init_plugin' ));
		}

		public function init_plugin() {
			if ( !is_admin() ) {
                $css_version = "1.0.0";
                wp_register_style( 'ml-lb24', plugins_url( '/style/ml-lb24.css', __FILE__), array(), $css_version);
                wp_enqueue_style( 'ml-lb24' );
		    }
        }
    }  // class MissionLocalLiveblogAdapter

	$ml_lb_adaptor_plugin = new MissionLocalLiveblogAdaptor();
}

?>
