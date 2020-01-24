<?php

namespace App\Services;

/**
 * Class FindMissing
 *
 * Driver:
 *  $value = $this->findMissing->determineValueOfMissingElement();
 *
 * @package App\Services
 */
class FindMissing
{
    /** @var array $array */
    private $array = [];

    const MAX = 500;

    /**
     * FindMissing constructor.
     */
    public function __construct()
    {
        /**
         * Generate array of 500 integers (values of 1 – 500 inclusive)
         */
        $this->generateArray();

        /**
         * Randomly remove and discard an arbitary element from this newly generated array
         */
        $this->discardRandomElement();

        //print_r($this->array);
    }

    /**
     * @return float|int|mixed
     */
    public function determineValueOfMissingElement()
    {
        /* Determine size of array */
        $size = count($this->array);

        /* Determine expected total of elements (values of 1 – 500 inclusive) */
        $total = ($size + 1) * ($size + 2) / 2;

        /**
         * Iterate and subtract over dataset
         *  Remainder identifies missing value
         */
        foreach ($this->array as $key => $value) {
            $total -= $value;
        }

        return $total;
    }

    /**
     * @return bool
     */
    private function generateArray()
    {
        $this->array = [];

        $i = 1;
        while ($i <= self::MAX) {
            $this->array[] = $i;
            $i++;
        }

        return true;
    }

    /**
     * @return bool
     */
    private function discardRandomElement()
    {
        /* Select random number in range */
        $rand = rand(0, count($this->array) -1);

        /* Unset random element */
        unset($this->array[$rand]);

        return true;
    }
}

