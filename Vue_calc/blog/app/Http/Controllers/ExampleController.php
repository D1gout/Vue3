<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //
    public function minus(Request $request)
    {
        $str1 = (int) $request->input("str1");
        $str2 = (int) $request->input("str2");
        $data = $str1 - $str2;

        return response($data, 200);
    }

    public function plus(Request $request)
    {
        $str1 = (int) $request->str1;
        $str2 = (int) $request->str2;
        $data = $str1 + $str2;

        return response($data, 200);
    }

    public function dev(Request $request)
    {
        $str1 = (int) $request->input("str1");
        $str2 = (int) $request->input("str2");
        $data = $str1 * $str2;

        return response($data, 200);
    }

    public function sep(Request $request)
    {
        $str1 = (int) $request->input("str1");
        $str2 = (int) $request->input("str2");
        $data = $str1 / $str2;

        return response($data, 200);
    }
}
