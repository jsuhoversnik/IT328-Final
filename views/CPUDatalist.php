<?php

require_once('../model/database.php');

$dbh = new Database();

$hardware = $dbh->getHardware($_POST['type']); //replace cpu with passed param
$choice = $_POST['type'] . "choice";
//echo $choice;

echo "<input class='form-control' name='CPUchoice' list='CPUchoice' placeholder='Select'>
<datalist id='CPUchoice' placeholder='Select'>";

foreach ($hardware as $part)
{
    echo "<option value='". $part['partName'] . "'>". $part['partName'] ."</option>";
}

echo "</datalist>";