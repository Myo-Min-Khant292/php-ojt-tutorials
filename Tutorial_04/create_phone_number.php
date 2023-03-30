<?php
function createPhoneNumber($numberArray)
{
    // for bracket numbers
    $bracketNumber = implode(array_slice($numberArray , 0,3));

    // for middle 3 digits
    $threeDigit = implode(array_slice($numberArray , 3,3));

    // for rest of the numbers
    $finalPart = implode(array_slice($numberArray , 4 ));
    
    //output the final results
    echo "($bracketNumber)" .  " " .$threeDigit . "-" . $finalPart;
}

createPhoneNumber([1, 2, 3, 4, 5, 6, 7, 8, 9, 0]);

?>