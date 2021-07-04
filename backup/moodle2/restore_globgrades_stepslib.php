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
 * All the steps to restore mod_globgrades are defined here.
 *
 * @package     mod_globgrades
 * @category    restore
 * @copyright   2021 Ideas-Block <roberto@ideas-block.com>
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

// For more information about the backup and restore process, please visit:
// https://docs.moodle.org/dev/Backup_2.0_for_developers
// https://docs.moodle.org/dev/Restore_2.0_for_developers

/**
 * Defines the structure step to restore one mod_globgrades activity.
 */
class restore_globgrades_activity_structure_step extends restore_activity_structure_step {

    /**
     * Defines the structure to be restored.
     *
     * @return restore_path_element[].
     */
    protected function define_structure() {
        // $paths = array();
        // $userinfo = $this->get_setting_value('userinfo');

        // $paths[] = new restore_path_element('globgrades', '/activity/globgrades');

        // return $this->prepare_activity_structure($paths);
        return $this->prepare_activity_structure(array(new restore_path_element('globgrades', '/activity/globgrades')));
    }

    /**
     * Processes the globgrades restore data.
     *
     * @param array $data Parsed element data.
     */
    protected function process_globgrades($data) {

        global $DB;

        $data = (object)$data;
        $data->course = $this->get_courseid();
        $data->timemodified = time();

        $newid = $DB->insert_record('globgrades', $data);

        $this->apply_activity_instance($newid);

    }

    /**
     * Defines post-execution actions.
     */
    protected function after_execute() {
        $this->add_related_files('mod_globgrades', 'intro', null);
        $this->add_related_files('mod_globgrades', 'content', null);
    }
}