<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Problem2Controller extends Controller
{
    private function problem_2($str)
    {
        $counter=0;
        $result=0;
        for ($i=strlen($str)-1;$i>=0;$i--) {
            $char = ord($str[$i]);
            $result+=(($char-64)*(pow(26, $counter)));
            $counter++;
        }
        return $result;
    }
    public function index(Request $request)
    {
        $str=$request->string;
        return response()
        ->json($this->problem_2($str));
    }
}
