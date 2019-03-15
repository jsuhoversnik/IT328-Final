<?php
/**
 * Wu, Jake
 * 2/24/2019
 * 328/IT328-Final/views/patList.php
 */

require_once('../model/database.php');

$dbh = new Database();

$hardware = $dbh->getHardware($_POST['type']);

$invalidChars = array(" ", "(", ")", ".", "/");

//replace magic numbers with sql query sorted my max?
if ($_POST['type'] == "cpu") {
    $maxPerformance = 30641;
} else if ($_POST['type'] == "gpu") {
    $maxPerformance = 17018;
} else {
    //TODO change this to ram max performance
    $maxPerformance = 5500;
}

echo "<table class=\"table border\">
    <thead>
    <tr>
        <th scope=\"col\">Part Name</th>
        <th scope=\"col\">Price</th>";

if ($_POST['type'] == "gpu" || $_POST['type'] == "cpu") {
    echo "<th scope=\"col\">Performance</th>";
}

echo "</tr>
    </thead>
    <tbody>";

foreach ($hardware as $part) {
    $name = $part['partName'];
    $id = str_replace($invalidChars, "", $name);

    $performance = floor((intval($part['performance']) / $maxPerformance) * 100);
    //echo $performance;
    echo "<tr>
            <td>
                <a href='#' id='$id'>
                   " . $part['partName'] . "
                </a>
            </td>

            <td>  " . $part['price'] . "</td>";

    if ($_POST['type'] == "gpu" || $_POST['type'] == "cpu" || $_POST['type'] == "ram") {

        echo ' <td><div class="progress ">
            <div class="progress-bar" role="progressbar" style="width: ' . $performance . '%" aria-valuenow="' . $performance . '" aria-valuemin="0" aria-valuemax="100"></div> ' . $performance . '%</div></td> ';

    }
    echo "</tr>";
}

echo "</tbody>
</table>";

$type = strtoupper($_POST['type']);


if ($type == "MOBO") {
    $type = "Motherboard";
} else if ($type == "HDD") {
    $type = "HD";
}

//build a jquery onclick event for each item in the table
foreach ($hardware as $part) {
    $name = $part['partName'];

    $id = str_replace($invalidChars, "", $name);
    $performance = floor((intval($part['performance']) / $maxPerformance) * 100);
    $price = $part['price'];


    $progressBar = '<div class="progress "><div class="progress-bar" role="progressbar" style="width: ' . $performance . '%" aria-valuenow="' . $performance . '" aria-valuemin="0" aria-valuemax="100"></div> ' . $performance . '%</div>';

    echo "<script>
             $('#$id').on('click',function()
            {
                //alert('here');
               // $('#$type').html('$name');
                $('#$type').prop('title','$name');
                $('#$type').prop('value','$name');
                
                $('#" . $type . "cost').html('$price');

                $('#" . $type . "progress').html('$progressBar'); 
                calc();
                   
            });
        </script>";
}
