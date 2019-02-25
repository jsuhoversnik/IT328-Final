<?php
/**
 * Wu, Jake
 * 2/24/2019
 */

function validPlan($planNumber)
{
    global $f3;
    if (is_numeric($planNumber)&&in_array($planNumber, $f3->get('database'))) {
        return true;
    }
    return false;
}

?>