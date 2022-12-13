<?php

/**
 * @package     local_myplugin
 * @author      Deril Lab
 * @license     http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

//CALL CONFIG.PHP
require_once(__DIR__ . '/../../config.php');

$PAGE->set_url(new moodle_url('/local/myplugin/index.php'));

//SET TITLE PAGE
$PAGE->set_title(get_string("pluginname", "local_myplugin"));
$PAGE->set_heading(get_string("pluginname", "local_myplugin"));

GLOBAL $DB;
GLOBAL $CFG;
GLOBAL $USER;

//PRIVATE PAGE FOR PUBLIC
require_login();

//SET BREADCRHUM
$PAGE->navbar->add(get_string("pluginname", "local_myplugin"));

//GET HEADER
echo $OUTPUT->header();

//CONTENT
$data = $DB->get_records_sql("SELECT * FROM {myplugin} LIMIT 5");

$content = '<table class="table">
<tr>
<td>'.get_string("name", "local_myplugin").'</td>
<td>'.get_string("address", "local_myplugin").'</td>
</tr>';

foreach ($data as $key => $value) {
	

	$content .= '

	<tr>
	<td>'.$value->name.'</td>
	<td>'.$value->address.'</td>
	</tr>';

}

$content .='

</table>';

echo $content;


//GET FOOTER
echo $OUTPUT->footer();


?>
