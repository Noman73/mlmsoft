<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class TreeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index($id)
    {
        $owner=DB::table('users')->select('id','username')->where('id',$id)->first();
     	$left=DB::table('users')->select('id','username')->where('uplink_id',$id)->where('position',0)->first();
        $right=DB::table('users')->select('id','username')->where('uplink_id',$id)->where('position',1)->first();
        // second level
        if($left==null){
            $left_id=0;
        }else{
            $left_id=$left->id;
        }

        if($right==null){
            $right_id=0;
        }else{
            $right_id=$right->id;
        }
        // left hand
        $second_level_left_hand_left_side=DB::table('users')->select('id','username')->where('uplink_id',$left_id)->where('position',0)->first();
        $second_level_left_hand_right_side=DB::table('users')->select('id','username')->where('uplink_id',$left_id)->where('position',1)->first();
        // right hand
        $second_level_right_hand_left_side=DB::table('users')->select('id','username')->where('uplink_id',$right_id)->where('position',0)->first();
        $second_level_right_hand_right_side=DB::table('users')->select('id','username')->where('uplink_id',$right_id)->where('position',1)->first();
        return view('frontend.tree.tree',compact('owner','left','right','second_level_left_hand_left_side','second_level_left_hand_right_side','second_level_right_hand_left_side','second_level_right_hand_right_side'));
    }
}
