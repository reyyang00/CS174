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

    //check for roman numberals
    for ($i = 0; $i < $strlen; $i++) {

        $current = roman_numberals_base_value(substr($strUp, $i, 1));
        if ($current < roman_numberals_base_value(substr($strUp, $i + 1, 1))) {
            $subtracLetterCheck = roman_numberals_subtraction_base(substr($strUp, $i, 2));
            // validate sbtraction base
            if (!$subtracLetterCheck) {
                $containsValidSubtracBase = false;
            }

            //validate roman numberal
            if ($subtracLetterCheck > roman_numberals_base_value(substr($strUp, $i - 1, 1))) {
                $containsValidSubtracBase = false;
            }

        }
    }

    return $isValidString && $containsValidSubtracBase;
}
$a = validate_string_and_roman_combinations("IXM");
if ($a === true) {
    echo "true\n";
} else {
    echo "false\n";
}

// will set isValidRomanNumberals to false if input is not "IV", "IX", "XL", "XC", "CD", "CM", but everything else for substraction

function toDecimal(String $roman_numberals)
{
    $strUp = strtoupper($roman_numberals); //convert input string to upper case
    $strlen = strlen($strUp);
    $check = validate_string_and_roman_combinations($roman_numberals);
    $result = 0;

    echo "$strUp\n";
    if ($check === true) {
        echo "here\n";
        for ($i = 0; $i < $strlen; $i++) {
            $current = roman_numberals_base_value(substr($strUp, $i, 1));
            //echo "$i\n";
            if ($current < roman_numberals_base_value(substr($strUp, $i + 1, 1))) {
                // echo "$i\n";
                $result = $result + roman_numberals_base_value(substr($strUp, $i + 1, 1)) - $current;
                $i++;
            } else {
                // echo "$i\n";
                $result = $result + $current;
            }
        }
    } else {
        echo "$strUp is not valid\n";
    }

    return $result;

}
// $a = toDecimal("MCVIx");

// echo "$a\n";
