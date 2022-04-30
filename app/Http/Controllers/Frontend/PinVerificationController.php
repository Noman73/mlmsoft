<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use App\Rules\PinVerifyRule;
use App\Models\User;
use Redirect;
class PinVerificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('frontend.pin_verify.pin_verify');
    }
    public function pinVerify(Request $request)
    {
        // return $request->all();
        $validator=Validator::make($request->all(),[
            'pin'=>["required","max:10","min:8",new PinVerifyRule],
        ]);
        if($validator->passes()){
            $user=User::find(auth()->user()->id);
            $user->pin_no=$request->pin;
            $user->save();
            if($user){
                return redirect()->back()->with('message','Pin Verify Success');
            }
        }
        return Redirect::back()->withErrors($validator);;
    }
}
