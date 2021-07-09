<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Plugin administration pages are defined here.
 *
 * @package     mod_globgrades
 * @category    admin
 * @copyright   2021 Ideas-Block <roberto@ideas-block.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

if ($ADMIN->fulltree) {
   // TODO: Define the plugin settings page.
   // https://docs.moodle.org/dev/Admin_settings

   $settings->add(new admin_setting_configtext('mod_globgrades/url', get_string('url', 'globgrades'),
            '', "URL", PARAM_TEXT));

   $settings->add(new admin_setting_configtext('mod_globgrades/token', get_string('token', 'globgrades'),
            '', "Title", PARAM_TEXT));

}
