<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Hash;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if (request()->ajax()){
            $get=User::all();
            return DataTables::of($get)
              ->addIndexColumn()
              ->addColumn('action',function($get){
                    $button  ='<div class="d-flex justify-content-center">
                    <a data-url="'.route('registration.edit',$get->id).'"  href="javascript:void(0)" class="btn btn-primary shadow btn-xs sharp me-1 mr-1 editRow text-light"><i class="fas fa-pencil-alt"></i></a>
                    <a data-url="'.route('registration.destroy',$get->id).'" href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp deleteRow"><i class="fa fa-trash"></i></a>
                </div>';
            return $button;
          })
          ->rawColumns(['action'])->make(true);
        }
        return view('frontend.registration.registration');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $validator=Validator::make($request->all(),[
            'name'=>"required|max:200|min:1",
            'email'=>"nullable|email|max:200|min:1",
            'phone'=>"required|max:200|min:1",
            'city'=>"nullable|max:200|min:1",
            'post_code'=>"nullable|max:200|min:1",
            'adress'=>"nullable|max:200|min:1",
            'nid'=>"nullable|max:200|min:1",
            'refference'=>"nullable|max:200|min:1",
            'uplink'=>"nullable|max:200|min:1",
            'position'=>"nullable|max:200|min:1",
            'dateofbirth'=>"nullable|max:200|min:1",
            'password'=>"required|max:100|min:6|confirmed",
            'image'=>'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        if($validator->passes()){
            $customer=new User;
            $customer->name=$request->name;
            $customer->email=$request->email;
            $customer->city=$request->city;
            $customer->post_code=$request->post_code;
            $customer->phone=$request->phone;
            $customer->adress=$request->adress;
            $customer->nid=$request->nid;
            $customer->refferance_id=$request->refference;
            $customer->uplink_id=$request->uplink;
            $customer->position=$request->position;
            $customer->dateofbirth=strtotime($request->dateofbirth);
            $customer->password=Hash::make($request->password);
            $customer->author_id=auth()->user()->id;
            if ($request->hasFile('image')) {
                $ext = $request->image->getClientOriginalExtension();
                $name =auth()->user()->id  .'_'. time() . '.' . $ext;
                $request->image->storeAs('public/customer', $name);
                $customer->image = $name;
            }
            $customer->save();
            if ($customer) {
                return response()->json(['message'=>'Registration Completed']);
            }
        }
        return response()->json(['error'=>$validator->getMessageBag()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getCustomer(Request $request)
    {
        $payment_method= User::where('name','like','%'.$request->searchTerm.'%')->orWhere('id','like','%'.$request->searchTerm.'%')->take(15)->get();
        foreach ($payment_method as $value){
             $set_data[]=['id'=>$value->id,'text'=>$value->name];
        }
        return $set_data;
    }
}
