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
function validate_string_and_roman_combinations(String $str)
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
    return $isValidString && $containsValidSubtracBase;
}
// will set isValidRomanNumberals to false if input is not "IV", "IX", "XL", "XC", "CD", "CM", but everything else for substraction

function toDecimal(String $roman_numberals)
{
    $check = validate_string_and_roman_combinations($roman_numberals);
    $result = 0;
    if ($check === true) {
        for ($i = 0; $i < $strlen; $i++) {
            $current = roman_numberals_base_value(substr($strUp, $i, 1));

            if ($current < roman_numberals_base_value(substr($strUp, $i + 1, 1))) {
                $result = $result + roman_numberals_base_value(substr($strUp, $i + 1, 1)) - $current;
                $i++;
            } else {
                $result = $result + $current;
            }
        }

    } else {
        echo "Your input is not valid string or roman numberals\n";
    }

    return $result;

}
toDecimal("MCixVI");
