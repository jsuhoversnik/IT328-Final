<?php
/**
 * Wu, Jake
 * 2/24/2019
 * 328/IT328-Final/model/validation-functions.php
 *
 * Validate that a given plan number is valid
 */

function validPlan($planNumber)
{
    global $f3;
    if (is_numeric($planNumber) && in_array($planNumber, $f3->get('database'))) {
        return true;
    }
    return false;
}

?>