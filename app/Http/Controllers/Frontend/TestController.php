<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\CountTrait;
use App\Models\User;
class TestController extends Controller
{
    use CountTrait;
    public function index()
    {
        // $data=[];
        // for ($i=0; $i <1000 ; $i++) { 
        //     $get=User::all();
        //     array_push($data,$get);
        // }
        // return count($data);
        // $time_start = microtime(true);
        $x =$this->leftCount(auth()->user()->id) ;
        $y =$this->rightCount(auth()->user()->id) ;  
        // $time_end = microtime(true);
        // echo $execution_time = ($time_end - $time_start)/60;
        $amount=0;
        if(count($x)>count($y)){
            for ($i=0; $i < count($y); $i++) { 
                $xcount=count($x['level-'.$i]);
                $ycount=count($y['level-'.$i]);
                $amt=min($xcount,$ycount);
                $amount+=$amt*50;
            }
        }else{
            for ($i=0; $i < count($x); $i++) { 
                $xcount=count($x['level-'.$i]);
                $ycount=count($y['level-'.$i]);
                $amt=min($xcount,$ycount);
                $amount+=$amt*50;
            }
        }
           return [$x,$y,'ammount'=>$amount];
    }
}
