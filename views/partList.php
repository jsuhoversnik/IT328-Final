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
    echo "<tr>
            <td>
                <a href='#'>
                   ". $part['partName'] ."
                </a>
            </td>

            <td>  ". $part['price'] ."</td>";

    if($_POST['type'] == "gpu" || $_POST['type'] == "cpu")
    {
        echo "<td> ".$part['performance']." </td>";
    }
    echo "</tr>";
}

echo "</tbody>
</table>";