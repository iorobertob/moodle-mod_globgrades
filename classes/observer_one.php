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
 * Plugin observer classes are defined here.
 *
 * @package     mod_globgrades
 * @category    event
 * @copyright   2021 Ideas-Block <roberto@ideas-block.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_test\another;

defined('MOODLE_INTERNAL') || die();

/**
 * Event observer class.
 *
 * @package    mod_globgrades
 * @copyright  2021 Ideas-Block <roberto@ideas-block.com>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class observer_one {

    /**
     * Triggered via $event.
     *
     * @param \core\event\something_happened $event The event.
     * @return bool True on success.
     */
    public static function something_happened($event) {

        // For more information about the Events API, please visit:
        // https://docs.moodle.org/dev/Event_2

        return true;
    }
}
