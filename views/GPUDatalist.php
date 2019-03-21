<?php
/**
 * Wu, Jake
 * 2/24/2019
 * 328/IT328-Final/views/GPUDatalist.php
 *
 * get a list of GPUs and show them as elements of a datalist
 */
require_once('../model/database.php');

$dbh = new Database();

$hardware = $dbh->getHardware($_POST['type']); //replace cpu with passed param
//$choice = $_POST['type'] . "choice";
//echo here;

echo "<input class='form-control' name='GPUchoice' list='GPUchoice'>
<datalist id='GPUchoice'>";

foreach ($hardware as $part) {
    echo "<option value='" . $part['partName'] . "'>" . $part['partName'] . "</option>";
}

echo "</datalist>";
