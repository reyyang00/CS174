<?php
// functions roman_numberals_base_value(), roman_numberals_subtraction_base(), validate_string_and_roman_combinations() are acting like  constraints to check input

// will return decimal numbers if input matches
//"I", "V", "X", "L", "C", "D" "M",
// everything else will be return false
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

// will return decimal numbers if input matches
//"IV", "IX", "XL", "XC", "CD", "CM",
// everything else will be return false
function roman_numberals_subtraction_base($input)
{

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

//a function to validate
// 1). the input string: "I", "V", "X", "L", "C", "D", "M"
// 2). the input string are valid roman combinations
function validate_string_and_roman_combinations(String $str)
{
    $strUp = strtoupper($str); //convert input string to upper case
    $strlen = strlen($strUp); //length of input string
    $isValidString = true; // check for validate string input
    $containsValidSubtracBase = true; //check for roman numberals

    // will set isValidString to false if inout is not "I", "V", "X", "L", "C", "D", "M", but everything else
    for ($i = 0; $i < $strlen; $i++) {
        $letterCheck = roman_numberals_base_value(substr($strUp, $i, 1));
        if (!$letterCheck) {
            $isValidString = false;
        }
    }

    //validate for roman numberals
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

//a function to convert valid roman numbrals or return error message if input is not valid
function toDecimal(String $roman_numberals)
{
    $strUp = strtoupper($roman_numberals); //convert input string to upper case
    $strlen = strlen($strUp);
    $check = validate_string_and_roman_combinations($roman_numberals);
    $result = 0;

    if ($check === true) {

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
        echo "$strUp is not valid input\n";
    }

    return $result;

}

//tester function
function toDecimalTester($actualOutput, $expectedOutput)
{
    if ($actualOutput === $expectedOutput) {
        echo "Test pass\n";
    } else {
        echo ("Your actual output does not match expect output, test faild\n");
    }
}


echo "input= MDCLXVI, actualOutput = 1666, expectedOutput = 1110\n";
toDecimalTester(toDecimal("MDCLXVI"), 1110);
echo "----------------------\n";

echo "input= MdClXVI, actualOutput = 1666, expectedOutput = 1666\n";
toDecimalTester(toDecimal("MdClXVI"), 1666);
echo "----------------------\n";

echo "input= mcx, actualOutput = 1110, expectedOutput = 1110\n";
toDecimalTester(toDecimal("MCX"), 1110);
echo "----------------------\n";

echo "input= MXCX, actualOutput = 1100, expectedOutput = 1110\n";
toDecimalTester(toDecimal("MXCX"), 1110);
echo "----------------------\n";

echo "input= MXCX, actualOutput = 1100, expectedOutput = 1100\n";
toDecimalTester(toDecimal("MXCX"), 1100);
echo "----------------------\n";

echo "input= ABC, actualOutput = none, expectedOutput = none\n";
toDecimalTester(toDecimal("ABC"),"");
echo "----------------------\n";

echo "input= 123, actualOutput = none, expectedOutput = none\n";
toDecimalTester(toDecimal("123"),"");
echo "----------------------\n";

echo "input= .,/[], actualOutput = none, expectedOutput = none\n";
toDecimalTester(toDecimal(".,/[]"),"");
echo "----------------------\n";

echo "input= C actualOutput = 100, expectedOutput = 100\n";
toDecimalTester(toDecimal("C"),100);
echo "----------------------\n";

echo "input= CM actualOutput = 900, expectedOutput = none\n";
toDecimalTester(toDecimal("CM"),"");
echo "----------------------\n";

echo "input= CM actualOutput = 900, expectedOutput = 900\n";
toDecimalTester(toDecimal("CM"),900);
echo "----------------------\n";

echo "input= v actualOutput = 5, expectedOutput = 5\n";
toDecimalTester(toDecimal("v"),5);
echo "----------------------\n";
echo "input= Iv actualOutput = 4, expectedOutput = 4\n";
toDecimalTester(toDecimal("Iv"),4);
echo "----------------------\n";
?>