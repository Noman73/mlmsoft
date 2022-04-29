<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Models\PinBuilder;
use DataTables;
use DB;
class GeneratePinCodeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        if (request()->ajax()){
            $get=PinBuilder::with('customer')->get();
            $get=DB::select("SELECT pin_builders.id,pin_builders.pin,users.name from pin_builders
            inner join users on users.id=pin_builders.customer_id");
            return DataTables::of($get)
              ->addIndexColumn()
              ->addColumn('action',function($get){
                $button  ='<div class="d-flex justify-content-center">
                <a data-url="'.route('pin_generate.edit',$get->id).'"  href="javascript:void(0)" class="btn btn-primary shadow btn-xs sharp me-1 mr-1 editRow text-light"><i class="fa fa-eye"></i></a>
                <a data-url="'.route('pin_generate.destroy',$get->id).'" href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp deleteRow"><i class="fa fa-trash"></i></a>
              </div>';
            return $button;
          })
        //   ->addColumn('name',function($get){
        //     return $get->customer->name;
        //     })
          ->rawColumns(['action'])->make(true);
        }
        return view('backend.pin_generate.pin_generate');
    }

    public function store(Request $request)
    {
        // return response()->json($request->all());
        $validator=Validator::make($request->all(),[
            'qantity'=>'required|max:20|min:1',
            'customer'=>'required|max:20|min:1',
        ]);
        if($validator->passes()){
           $qantity=$request->qantity;
            for ($i=0; $i <intval($qantity) ; $i++) {
                $rev=strrev(strval(time()));
                $num1=intval(substr($rev,3,3))*(intval(substr($rev,9,1))*($i+1));
                $num2=intval(substr($rev,0,3));
                $num3=intval(substr($rev,6,4))*(intval(substr($rev,9,1))*($i+1));
                $unique_key= $num1.$num2.$num3.'-'.$rev;
                $final_key=substr($unique_key,0,10);
                $gen_pin=new PinBuilder;
                $gen_pin->pin=$final_key;
                $gen_pin->customer_id=$request->customer;
                $gen_pin->author_id=auth()->user()->id;
                $gen_pin->save();
            }
            return response()->json(['message'=>"Pin Generated Success"]);
        }
        return response()->json(['error'=>$validator->getMessageBag()]);
    }
}
