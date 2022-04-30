<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Redirect;
use Validator;
class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('frontend.profile.profile');
    }
    public function update(Request $request)
    {
        // return $request->all();
        $validator=Validator::make($request->all(),[
            'city'=>"required|max:200|min:1",
            'post_code'=>"nullable|max:200|min:1",
            'adress'=>"required|max:200|min:1",
            'dateofbirth'=>"required|max:200|min:1",
            'nid'=>"required|max:200|min:1",
            'image'=>"nullable|mimes:jpg,jpeg,png|max:2024",
        ]);
        if($validator->passes()){
            $user=User::find(auth()->user()->id);
            $user->city=$request->city;
            $user->post_code=$request->post_code;
            $user->adress=$request->adress;
            $user->nid=$request->nid;
            $user->dateofbirth=strtotime($request->dateofbirth);
            if ($request->hasFile('image')) {
                $ext = $request->image->getClientOriginalExtension();
                $name =auth()->user()->id  .'_'. time() . '.' . $ext;
                $request->image->storeAs('public/customer', $name);
                $user->image = $name;
            }
            $user->save();
            if ($user) {
                return redirect()->back()->with('message','Profile Updated Success');
            }
        }
        return Redirect::back()->withErrors($validator);
    }
}
