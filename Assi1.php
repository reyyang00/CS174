<?php

// prime_number function takes a input.
// case 1(string, float, negative number) return a array with 0 at index 0
// case 2(0, 1) return a array with 1 at index 0
//case 3 return prime numbers if input has ones
function prime_number($input)
{
    echo ("your input is: $input\n");
    $arr = array();
    if (!is_numeric($input) || is_float($input) || $input < 0) {
        array_push($arr, 0);
    } else if ($input == 1 || $input = 0) {
        array_push($arr, 1);
    } else if ($input > 1) {
        for ($i = 1; $i <= $input; $i++) {
            $isPrime = 0;
            for ($j = 1; $j <= $i; $j++) {
                if ($i % $j == 0) {
                    $isPrime++;
                }
            }
            if ($isPrime == 2) {
                array_push($arr, $i);
            }
        }
        return $arr;
    }
}

//function used to print the test cases reult
function print_result(int $input, $a, $b)
{

    if ($input == 1) {
        echo ("Expected prime numbers are:");
        for ($i = 0; $i < sizeof($b); $i++) {
            echo (" $b[$i] ");
        }
        echo ("\n");
        echo ("TEST passed!!!!!!!!! \n");
    } else {
        echo ("Expected prime numbers are: ");
        for ($i = 0; $i < sizeof($b); $i++) {
            echo (" $b[$i] ");
        }
        echo ("\n");
        echo ("TEST failed!!!!!!!!! \n");
    }
}

// a manual test function to test if the input pass test cases
// check the total 4 cases as the value of return array prime_number and expected array
// exact cases pls refer  to prime_number()
function primer_number_tester($a, $b)
{
    $match = 1;
    if (empty($a) && !empty($b)) {
        // echo ("hello\n ");
        $match = 0;
    } elseif (($a[0] == 1) && !empty($b)) {
        $match = 0;
    } elseif (($a[0] == 0) && !empty($b)) {
        $match = 0;
    }
    if (sizeof($a) == sizeof($b) || sizeof($a) != sizeof($b)) {
        if (!empty($b)) {
            for ($i = 0; $i < sizeof($a); $i++) {
                if ($a[$i] != $b[$i]) {
                    echo ("test here\n");
                    $match = 0;
                    break;
                }
            }
        }
    }

    print_result($match, $a, $b);
}

//test case
// $ar = array();
// primer_number_tester(prime_number(0), $ar);

//case 1) input 0;
$ar = array(2, 3, 5, 7);
primer_number_tester(prime_number(0), $ar);
echo ("\n------------------------------------------\n");

$ar = array();
primer_number_tester(prime_number(0), $ar);
echo ("\n------------------------------------------\n");

//case 1) input 1;
$ar = array(22);
primer_number_tester(prime_number(1), $ar);
echo ("\n------------------------------------------\n");

$ar = array();
primer_number_tester(prime_number(1), $ar);
echo ("\n------------------------------------------\n");

//case 3) input 10 with corrected expect output, wrong outpu and empty
$ar = array(2, 3, 5, 7);
primer_number_tester(prime_number(10), $ar);
echo ("\n------------------------------------------\n");

$ar = array(2, 3, 5);
primer_number_tester(prime_number(10), $ar);
echo ("\n------------------------------------------\n");

$ar = array();
primer_number_tester(prime_number(10), $ar);
echo ("\n------------------------------------------\n");

//case 4 input string
$ar = array(1, 2, 3, 4);
primer_number_tester(prime_number("hello"), $ar);
echo ("\n------------------------------------------\n");
$ar = array();
primer_number_tester(prime_number("hello"), $ar);
echo ("\n------------------------------------------\n");

//case 5: input float
$ar = array();
primer_number_tester(prime_number(22.153), $ar);
echo ("\n");
echo ("------------------------------------------");
echo ("\n");

$ar = array(1, 2, 3);
primer_number_tester(prime_number(22.153), $ar);
echo ("\n");
echo ("------------------------------------------");
echo ("\n");

//case 6: input negitive
$ar = array();
primer_number_tester(prime_number(-20), $ar);
echo ("\n");
echo ("------------------------------------------");
echo ("\n");

$ar = array(1, 2, 3);
primer_number_tester(prime_number(-20), $ar);
echo ("\n");
echo ("------------------------------------------");
echo ("\n");
