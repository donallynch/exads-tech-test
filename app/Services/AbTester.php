<?php

namespace App\Services;

/**
 * Class AbTester
 *
 * Exads would like to A/B test a number of promotional designs to see which provides the best
 *  conversion rate.
 *  Write a snippet of PHP code that redirects end users to the different designs based on the database
 *  table below. Extend the database model as needed.
 *  i.e. - 50% of people will be shown Design A, 25% shown Design B and 25% shown Design C.
 *  The code needs to be scalable as a single promotion may have upwards of 3 designs to test.
 *
 * Driver
 *  $value = $this->abTester->go();
 *
 * @package App\Services
 */
class AbTester
{
    /**
     * @return string
     */
    public function go()
    {
        $rand = mt_rand() / mt_getrandmax();
        $total = 0.0;
        $design = 0;

        /* Simulate/Mock retrieval of designs for the promotion from the database */
        $designsFromDb = $this->retrieveData(true);// Change to false to test upwards of 3 designs

        /* Loop over rows to determine which design/template to render for the client */
        foreach ($designsFromDb as $row) {

            /* Add the split percentage to our total */
            $total += ($row['split_percent'] / 100);

            /**
             * For each iteration
             *  Check if the rand is within the range
             *  If not in range: continue
             *  Else: We have identified the design to show based on statistical randomness
             *
             *  Sample cycles
             *      Iteration 1: .50 - .90 === -0.40
             *      Iteration 2: .75 - .90 === -0.15
             *      Iteration 3: 1.0 - .90 === 0.1 (positive result indicates we found the correct design to display)
             */
            if ($total - $rand >= 0) {
                $design = $row['design_id'];
                break;
            }
        }

        /* Return the redirect URL */
        return "http://www.exads.com/index.{$design}.html";
    }

    /**
     * @param bool $set
     * @return array
     */
    private function retrieveData(bool $set = true)
    {
        /* Given data set with 3 designs */
        if ($set) {
            return [
                ['id' => 1, 'promo_id' => 1, 'design_id' => 1, 'design_name' => 'Design 1', 'split_percent' => 50],
                ['id' => 2, 'promo_id' => 1, 'design_id' => 2, 'design_name' => 'Design 2', 'split_percent' => 25],
                ['id' => 3, 'promo_id' => 1, 'design_id' => 3, 'design_name' => 'Design 3', 'split_percent' => 25],
            ];
        }

        /* Additional test case with upwards of 3 designs */
        return [
            ['id' => 4, 'promo_id' => 1, 'design_id' => 4, 'design_name' => 'Design 4', 'split_percent' => 50],
            ['id' => 5, 'promo_id' => 1, 'design_id' => 5, 'design_name' => 'Design 5', 'split_percent' => 20],
            ['id' => 6, 'promo_id' => 1, 'design_id' => 6, 'design_name' => 'Design 6', 'split_percent' => 10],
            ['id' => 7, 'promo_id' => 1, 'design_id' => 7, 'design_name' => 'Design 7', 'split_percent' => 10],
            ['id' => 8, 'promo_id' => 1, 'design_id' => 8, 'design_name' => 'Design 8', 'split_percent' => 5],
            ['id' => 9, 'promo_id' => 1, 'design_id' => 9, 'design_name' => 'Design 9', 'split_percent' => 5],
        ];
    }
}

