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
 * This is a one-line short description of the file
 *
 * You can have a rather longer description of the file as well,
 * if you like, and it can span multiple lines.
 *
 * @package    mod
 * @subpackage mootyper
 * @copyright  2011 Jaka Luthar (jaka.luthar@gmail.com)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require_once(dirname(dirname(dirname(__FILE__))).'/config.php');
//require_once(dirname(dirname(dirname(__FILE__))).'/lib/dmllib.php');
global $DB;
//http://localhost/moodle/course/view.php?id=2
//$DB->insert_record('mootyper_grades', $record, false);
if(isset($_GET['r'])){
	$exerciseID = $_GET['r'];
	$DB->delete_records('mootyper_exercises', array('id'=>$exerciseID));
}
else
{
	$lessonID = $_GET['l'];
	$DB->delete_records('mootyper_exercises', array('lesson' =>$lessonID));
	$DB->delete_records('mootyper_lessons', array('id' => $lessonID));
}
$cID = $_GET['id'];
$webDir = $CFG->wwwroot . '/mod/mootyper/exercises.php?id='.$cID;
header('Location: '.$webDir);
/*
    $protocol = strpos(strtolower($_SERVER['SERVER_PROTOCOL']),'https') 
                    === FALSE ? 'http' : 'https';
    $host     = $_SERVER['HTTP_HOST'];
    $script   = $_SERVER['SCRIPT_NAME'];
    $params   = $_SERVER['QUERY_STRING'];
    $currentUrl = $protocol . '://' . $host . $script . '?' . $params;
    echo $currentUrl; 
 */

?>
