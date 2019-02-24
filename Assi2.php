<?php

function roman_numberals_base_value($input)
{
    $result;
    switch ($input) {
        case 'I':
            $result = 1;
            break;
        case 'V':
            $result = 5;
            break;
        case 'X':
            $result = 10;
            break;
        case 'L':
            $result = 50;
            break;
        case 'C':
            $result = 100;
            break;
        case 'D':
            $result = 500;
            break;
        case 'M':
            $result = 1000;
            break;
        default:
            $result = false;
            break;
    }
    return $result;
}
function roman_numberals_subtraction_base($input)
{
    // will set isValidRomanNumberals to false if input is not "IV", "IX", "XL", "XC", "CD", "CM", but everything else for substraction
    $result;
    switch ($input) {
        case 'IV':
            $result = 4;
            break;
        case 'IX':
            $result = 9;
            break;
        case 'XL':
            $result = 40;
            break;
        case 'XC':
            $result = 90;
            break;
        case 'CD':
            $result = 400;
            break;
        case 'CM':
            $result = 900;
            break;
        default:
            $result = false;
            break;
    }
    return $result;

}

//a function to check if the input string are all "I", "V", "X", "L", "C", "D", "M"
function validate_string(String $str)
{
    $strUp = strtoupper($str); //convert input string to upper case
    $strlen = strlen($strUp); //
    $isValidString = true;
    $containsValidSubtracBase = true;

    // will set isValidString to false if inout is not "I", "V", "X", "L", "C", "D", "M", but everything else
    for ($i = 0; $i < $strlen; $i++) {
        $letterCheck = roman_numberals_base_value(substr($strUp, $i, 1));
        if (!$letterCheck) {
            $isValidString = false;
        }
    }

    //check for base substraction
    for ($i = 0; $i < $strlen; $i++) {

        $current = roman_numberals_base_value(substr($strUp, $i, 1));

        if ($current < roman_numberals_base_value(substr($strUp, $i + 1, 1))) {
            $subtracLetterCheck = roman_numberals_subtraction_base(substr($strUp, $i, 2));
            if (!$subtracLetterCheck) {
                $containsValidSubtracBase = false;
            }
        }
    }
    return $isValidString&& $containsValidSubtracBase;
}
  // will set isValidRomanNumberals to false if input is not "IV", "IX", "XL", "XC", "CD", "CM", but everything else for substraction
$check = validate_string("MCXV");
if($check === true){
    echo "true\n";
}else{
    echo "false\n";
}

function toDecimal(String $roman_numberals): int
{
    //if it is not a valid input return function
    // would accpet value to be anthing else then "I", "V", "X", "L", "C", "D", "M"
    if (!validateString($roman_numberals)) {
        return 0;
    }

    //if we got here, means we have roman numberals as input: "I", "V", "X", "L", "C", "D", "M"
    // but we still do not know if it is a valid roman numberals
    $result = 0;
    $leastLarger = roman_numberals_base_value();

    return $result;

}
function roman_to_decimal_tester()
{

}
