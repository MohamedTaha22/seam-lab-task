<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Problem1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private function problem_1($start, $end)
    {
        $flag= false;
        $result=0;
        for ($index=$start;$index<=$end;$index++) {
            $num=$index;
            $flag= false;
            while ($num!=0) {
                if ($num%10==5) {
                    $flag= true;
                }
                $num = intdiv($num, 10);
            }
            if (!$flag) {
                $result++;
            }
        }
        return $result;
    }
    /*
    Another Approach using Regex
    private function  problem_1 ($start,$end){
        $result=0;
        $pattern = "/5/";
        for($index=$start;$index<=$end;$index++){
            if(! preg_match($pattern, $index)){
                $result++;
            }
        }

    return $result; // Outputs 1
    }
    */
    public function index(Request $request)
    {
        $num1=$request->num1;
        $num2=$request->num2;
        return response()
        ->json($this->problem_1($num1, $num2));
    }
}
