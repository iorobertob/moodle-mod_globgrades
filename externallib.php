<?php

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
 * External Web Service Template
 *
 * @package    globgrades
 * @copyright  2011 Moodle Pty Ltd (http://moodle.com)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require_once($CFG->libdir . "/externallib.php");

class mod_globgrades_external extends external_api {

    /**
     * Returns description of method parameters
     * @return external_function_parameters
     */
    public static function hello_world_parameters() {
        return new external_function_parameters(
                array(  'course'        => new external_value(PARAM_TEXT, 'Default course', VALUE_DEFAULT, 'Course name'),
                        'student_name'  => new external_value(PARAM_TEXT, 'Default student ', VALUE_DEFAULT, 'Student name '),
                        'course_name'   => new external_value(PARAM_TEXT, 'Default course name', VALUE_DEFAULT, 'Course name'), 
                        'grade'         => new external_value(PARAM_INT, 'Default grade', VALUE_DEFAULT, 0), 
                        'gradedate'     => new external_value(PARAM_INT, 'Default date', VALUE_DEFAULT, 0), 
                        'teacher_name'  => new external_value(PARAM_TEXT, 'Default teacher', VALUE_DEFAULT, 'Teacher name')  )
        );
    }

    /**
     * Returns welcome message
     * @return string welcome message
     */
    public static function hello_world($course = 'Course name', $student_name = "student name", $course_name = "course_name", $grade=0, $gradedate=0, $teacher_name="teacher name") {
        global $USER, $DB;

        // //Parameter validation
        // //REQUIRED
        $params = self::validate_parameters(self::hello_world_parameters(),
                array(  'course'        => $course,
                        'student_name'  => $student_name,
                        'course_name'   => $course_name,
                        'grade'         => $grade,
                        'gradedate'     => $gradedate,
                        'teacher_name'  => $teacher_name));

        //Context validation
        //OPTIONAL but in most web service it should present
        $context = get_context_instance(CONTEXT_USER, $USER->id);
        self::validate_context($context);

        // //Capability checking
        // //OPTIONAL but in most web service it should present
        // if (!has_capability('moodle/user:viewdetails', $context)) {
        //     throw new moodle_exception('cannotviewprofile');
        // }

        // return $params['welcomemessage'] . $USER->firstname ;



        $new_grade = new stdClass();
        $new_grade -> course = $params['course'];
        $new_grade -> student_name = $params['student_name'];
        $new_grade -> course_name = $params['course_name'];
        $new_grade -> grade = $params['grade'];
        $new_grade -> gradedate = $params['gradedate'];
        $new_grade -> teacher_name = $params['teacher_name'];
t
        $id = $DB->insert_record('globgradesgrades', $new_grade);

        return "oh lala: ".$id;
    }

    /**
     * Returns description of method result value
     * @return external_description
     */
    public static function hello_world_returns() {
        return new external_value(PARAM_TEXT, 'The welcome message + user first name');
    }



}