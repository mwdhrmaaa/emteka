<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MathController extends Controller
{
    /**
     * Display the home page.
     */
    public function index()
    {
        return view('public.home.index');
    }

    /**
     * Display the calculator tool.
     */
    public function calculator()
    {
        return view('public.math.calculator.index');
    }

    /**
     * Display the formulas reference.
     */
    public function formulas()
    {
        return view('public.math.formulas.index');
    }

    /**
     * Display the problem solver tool.
     */
    public function solver()
    {
        return view('public.math.solver.index');
    }

    /**
     * Display the graphing calculator tool.
     */
    public function graphing()
    {
        return view('public.math.graphing.index');
    }
}
