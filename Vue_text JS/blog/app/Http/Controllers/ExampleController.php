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
    public function solve(Request $request)
    {
        $str = str_replace(" ", "", $request->input("str"));
        $lens = mb_strlen($str);
        $upper = 0;

        for ($i = 0; $i < $lens; $i++) {
            // var_dump(mb_substr($str, $i, 1));
            // exit();
            if (
                mb_strtoupper(mb_substr($str, $i, 1)) === mb_substr($str, $i, 1)
            ) {
                $upper++;
            }
        }

        return response(["upper" => $upper, "lowwer" => $lens - $upper], 200);
    }
}
