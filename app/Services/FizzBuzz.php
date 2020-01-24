<?php

namespace App\Services;

/**
 * Class FizzBuzz
 *  Write a PHP script that prints all integer values from 1 to 100.
 *  For multiples of three output "Fizz" instead of the value and for the multiples of five output "Buzz".
 *  Values which are multiples of both three and five should output as "FizzBuzz".
 *
 * Driver
 *  $value = $this->fizzBuzz->go();
 *
 * @package App\Services
 */
class FizzBuzz
{
    const MIN_COUNT = 1;
    const MAX_COUNT = 100;
    const MIN_DIVIDER = 3;
    const MAX_DIVIDER = 5;
    const FIZZ_BUZZ = 'FizzBuzz';
    const FIZZ = 'Fizz';
    const BUZZ = 'Buzz';

    /**
     * @return string
     */
    public function go()
    {
        $output = '';

        /* 1 to 100 */
        for ($i = self::MIN_COUNT; $i <= self::MAX_COUNT; $i++) {

            /* Define vars */
            $divisibleBy3 = $i % self::MIN_DIVIDER === 0;
            $divisibleBy5 = $i % self::MAX_DIVIDER === 0;

            // Values which are multiples of both three and five should output as "FizzBuzz"
            if ($divisibleBy3 && $divisibleBy5) {
                $output .= self::FIZZ_BUZZ . "<br>";
            } elseif ($divisibleBy3) {// For multiples of three output "Fizz" instead of the value
                $output .= self::FIZZ . "<br>";
            } elseif ($divisibleBy5) {//for the multiples of five output "Buzz
                $output .= self::BUZZ . "<br>";
            } else {// Fallback to printing the integer
                $output .= "{$i}<br>";
            }
        }

        return $output;
    }
}

