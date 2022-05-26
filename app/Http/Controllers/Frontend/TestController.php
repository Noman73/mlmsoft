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
       return $x =$this->leftCount(auth()->user()->id) ;
       return  $y =$this->rightCount(auth()->user()->id) ;
       return [$x,$y];
    }
}
