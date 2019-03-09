<?php
/**
 * Created by PhpStorm.
 * User: jakes
 * Date: 3/8/2019
 * Time: 7:17 PM
 */

//ask Tina if theres a way to avoid this,
//possibly not because we load this file with a .load call
require_once('../model/database.php');

$dbh = new Database();

$hardware = $dbh->getHardware($_POST['type']); //replace cpu with passed param


//replace magic numbers with sql query sorted my max?
if($_POST['type'] == "cpu")
{
    $maxPerformance = 30641;
} else if($_POST['type'] == "gpu"){
    $maxPerformance = 17018;
} else
{
    $maxPerformance = 17018;
}

echo "<table class=\"table border\">
    <thead>
    <tr>
        <th scope=\"col\">Part Name</th>
        <th scope=\"col\">Price</th>";

if($_POST['type'] == "gpu" || $_POST['type'] == "cpu")
{
      echo "<th scope=\"col\">Performance</th>";
}

echo"</tr>
    </thead>
    <tbody>";

foreach ($hardware as $part)
{

    $performance = floor((intval($part['performance']) / $maxPerformance) * 100);
    //echo $performance;
    echo "<tr>
            <td>
                <a href='#'>
                   ". $part['partName'] ."
                </a>
            </td>

            <td>  ". $part['price'] ."</td>";

    if($_POST['type'] == "gpu" || $_POST['type'] == "cpu")
    {
        //echo "<td> ".$part['performance']." </td>";



       echo' <td><div class="progress ">
            <div class="progress-bar" role="progressbar" style="width: ' . $performance . '%" aria-valuenow="' . $performance . '" aria-valuemin="0" aria-valuemax="100"></div> ' . $performance . '%</div></td> ';




    }
    echo "</tr>";
}

echo "</tbody>
</table>";