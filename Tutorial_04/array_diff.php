<?php



function arrayDiff($arr1, $arr2)
{
    $result = array();
    foreach ($arr1 as $value) {

        // check different in 2 arrays
        if (!in_array ($value , $arr2)) {
            array_push ($result , $value);
        }
    }
    print_r($result);
}

arrayDiff([1, 2, 2],[]);

?>
