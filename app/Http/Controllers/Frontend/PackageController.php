<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
class PackageController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }
    public function getPackage(Request $request)
    {
        $payment_method= Package::where('title','like','%'.$request->searchTerm.'%')->take(15)->get();
        foreach ($payment_method as $value){
             $set_data[]=['id'=>$value->id,'text'=>$value->title.'(BDT: '.$value->ammount.')'];
        }
        return $set_data;
    } 
}
