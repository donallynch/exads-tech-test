<?php

namespace App\Http\Controllers;

use App\Services\AbTester;
use App\Services\DateCalculator;
use App\Services\FindMissing;
use App\Services\FizzBuzz;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Illuminate\Http\Request;

/**
 * Class IndexController
 * @package App\Http\Controllers
 */
class IndexController
{
    /** @var FizzBuzz $fizzbuzz */
    private $fizzbuzz;

    /** @var FindMissing $finder */
    private $finder;

    /** @var DateCalculator $dateCalculator */
    private $dateCalculator;

    /** @var AbTester $abTester */
    private $abTester;

    /**
     * IndexController constructor.
     * @param FizzBuzz $fizzBuzz
     * @param FindMissing $finder
     * @param DateCalculator $dateCalculator
     * @param AbTester $abTester
     */
    public function __construct(
        FizzBuzz $fizzBuzz,
        FindMissing $finder,
        DateCalculator $dateCalculator,
        AbTester $abTester
    ){
        $this->fizzbuzz = $fizzBuzz;
        $this->finder = $finder;
        $this->dateCalculator = $dateCalculator;
        $this->abTester = $abTester;
    }

    /**
     * @return Factory|View
     */
    public function getAction()
    {
        return view('exads.index');
    }

    /**
     * @return Factory|View
     */
    public function fizzbuzzAction()
    {
        return view('exads.fizzbuzz', [
            'content' => $this->fizzbuzz->go()
        ]);
    }

    /**
     * @return Factory|View
     */
    public function arrayAction()
    {
        return view('exads.array', [
            'content' => $this->finder->determineValueOfMissingElement()
        ]);
    }

    /**
     * @return Factory|View
     */
    public function databaseGetAction()
    {
        /* Retrieve all users from table */
        $users = DB::table('users')
            ->select(['id','name','age','job_title'])
            ->get();

        return view('exads.database', [
            'content' => $users
        ]);
    }

    /**
     * Provide an example of how you would write a sanitised record to the same table
     *  This is a working example of how to create a User entity via a post request
     *  Step 1: Validate request
     *  Step 2: Get valid/sanitised vars from the request
     *  Step 3: Perform insert operation
     *  Step 4: Return ID of inserted entity (optional)
     *
     * @return Factory|View
     */
    public function databasePostAction(Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'name' => 'required|string|min:3',
            'age' => 'required|int|min:18|max|114',
            'job_title' => 'required|int|min:3'
        ]);
        if ($validator->fails()) {
            return json_encode(['status' => 400, 'errors' => $validator->errors()]);
        }

        /* Get valid sanitised vars from request */
        $name = $request->post('name');
        $age = (int)$request->post('age');
        $jobTitle = $request->post('job_title');

        /* Insert User */
        $id = DB::table('users')->insertGetId([
            'name' => $name,
            'age' => $age,
            'job_title' => $jobTitle
        ]);

        return view('exads.database', [
            'id' => $id
        ]);
    }

    /**
     * @return Factory|View
     */
    public function lotteryAction()
    {
        return view('exads.lottery', [
            'content' => $this->dateCalculator->calculateNextValidDrawDate()
        ]);
    }

    /**
     * @return Factory|View
     */
    public function abTestAction()
    {
        return view('exads.abtest', [
            'content' => $this->abTester->go()
        ]);
    }
}

