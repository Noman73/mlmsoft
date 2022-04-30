<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Models\Package;
use Validator;
class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        return $this->middleware('auth:admin');
    }
    public function index()
    {
        if (request()->ajax()){
            $get=Package::all();
            return DataTables::of($get)
              ->addIndexColumn()
              ->addColumn('action',function($get){
              $button  ='<div class="d-flex justify-content-center">
              <a data-url="'.route('package.edit',$get->id).'"  href="javascript:void(0)" class="btn btn-primary shadow btn-xs sharp me-1 mr-1 editRow text-light"><i class="fas fa-pencil-alt"></i></a>
              <a data-url="'.route('package.destroy',$get->id).'" href="javascript:void(0)" class="btn btn-danger shadow btn-xs sharp deleteRow"><i class="fa fa-trash"></i></a>
          </div>';
            return $button;
          })
          ->addColumn('status',function($get){
            return ($get->status==1 ? "Active" : "Deactive");
        })
          ->rawColumns(['action'])->make(true);
        }
        return view('backend.package.package');
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
            'title'=>"required|max:200|min:1",
            'description'=>"nullable|max:200|min:1",
            'ammount'=>"required|max:200|min:1",
            'status'=>"required|max:200|min:1",
        ]);
        if($validator->passes()){
            $package=new Package;
            $package->title=$request->title;
            $package->description=$request->description;
            $package->ammount=$request->ammount;
            $package->status=$request->status;
            $package->author_id=auth()->user()->id;
            
            $package->save();
            if ($package) {
                return response()->json(['message'=>'Package Added Success']);
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
        return response()->json(Package::find($id));
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
        $validator=Validator::make($request->all(),[
            'title'=>"required|max:200|min:1",
            'description'=>"nullable|max:200|min:1",
            'ammount'=>"required|max:200|min:1",
            'status'=>"required|max:200|min:1",
        ]);
        if($validator->passes()){
            $package=Package::find($id);
            $package->title=$request->title;
            $package->description=$request->description;
            $package->ammount=$request->ammount;
            $package->status=$request->status;
            $package->author_id=auth()->user()->id;
            
            $package->save();
            if ($package) {
                return response()->json(['message'=>'Package Updated Success']);
            }
        }
        return response()->json(['error'=>$validator->getMessageBag()]);
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
    public function getPackage(Request $request)
    {
        $payment_method= Package::where('name','like','%'.$request->searchTerm.'%')->take(15)->get();
        foreach ($payment_method as $value){
             $set_data[]=['id'=>$value->id,'text'=>$value->name];
        }
        return $set_data;
    }
}
