<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Problem3Controller extends Controller
{
    private function problem_3($arr)
    {
        $resultArr=[];
        $index=0;
        $element=0;
        $count =0;

        for ($index;$index<count($arr);$index++) {
            $element = $arr[$index];
            $count=0;
            while ($element) {
                if (!($element%2)&& $element!=2) {
                    $element = max(($element/2), 2);
                } else {
                    $element-=1;
                }
                $count ++;
            }
            $resultArr[]=$count;
        }
        return $resultArr;
    }

    public function index(Request $request)
    {
        $arr = request('array', []);
        $arr = explode(',', $arr);
        $result = $this->problem_3($arr);
        return response()
        ->json($result);
    }
}
