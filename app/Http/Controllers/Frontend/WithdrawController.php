<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Withdraw;
use DataTables;
use App\Rules\PasswordCheckRule;
use Validator;
class WithdrawController extends Controller
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
            $get=Withdraw::where('user_id',auth()->user()->id)->get();
            return DataTables::of($get)
              ->addIndexColumn()
              ->addColumn('date',function($get){
                return date('d-m-Y',$get->date);
              })
              ->addColumn('status',function($get){
                return ($get->status==0? "<span class='text-success'>Pending<span>" : "<span class='text-success'>Approved<span>");
              })
              ->rawColumns(['action','status'])->make(true);
        }
        return view('frontend.withdraw.withdraw');
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
            'ammount'=>"required|max:20|min:1",
            'password'=>["required","max:200","min:1",new PasswordCheckRule],
        ]);
        if($validator->passes()){
            $package=new Withdraw;
            $package->date=strtotime(date('d-m-Y'));
            $package->ammount=$request->ammount;
            $package->status=0;
            $package->user_id=auth()->user()->id;
            $package->save();
            if ($package){
                return response()->json(['message'=>'Withdraw Added Success']);
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
        //
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
}
