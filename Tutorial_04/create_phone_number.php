<?php
    /**
     * creating phone number
     * 
     * @param array $numberArray

    */
    function createPhoneNumber($numberArray)
    {
    
        $bracketNumber = implode(array_slice($numberArray , 0,3));
        $threeDigit = implode(array_slice($numberArray , 3,3));
        $finalPart = implode(array_slice($numberArray , 4 ));
        
        echo "($bracketNumber)" .  " " .$threeDigit . "-" . $finalPart;
    }

    createPhoneNumber([1, 2, 3, 4, 5, 6, 7, 8, 9, 0]);
?>