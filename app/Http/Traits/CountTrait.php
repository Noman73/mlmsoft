<?php
namespace App\Http\Traits;

use App\Models\User;
use DB;
trait CountTrait{

    private $level;
    private $total;

    public function leftCount($id){
        $left=DB::table('users')->select('id','username')->where('uplink_id',$id)->where('position',0)->first();
        $data=DB::table('users')->select('id','username')->where('uplink_id',($left!=null? $left->id : null))->get();
        // $findData=$this->findArray($data);
        // return $findData[0][0]->id;
        if(count($data)==0){
            return [];
        }
        $dataArr=[];
        if($left!=null){
            array_push($dataArr, $left->id);
        }
        $data=[$data[0]->id,$data[1]->id];
        $dataArr=array_merge($dataArr,$data);
        for ($i=1; count($data)!=0 ; $i++) {
            $getData=$this->findArray($data);
            $data=$getData;
            foreach($getData as $value){
                array_push($dataArr,$value);
            }
        }
        
    }
    public function rightCount($id){
        $left=DB::table('users')->select('id','username')->where('uplink_id',$id)->where('position',1)->first();
        $data=DB::table('users')->select('id','username')->where('uplink_id',($left!=null? $left->id : null))->get();
        // $findData=$this->findArray($data);
        // return $findData[0][0]->id;
        // return count($data);
        if(count($data)==0){
            return [];
        }
        $count=count($data);
        $dataArr=[];
        $data=[$data[0]->id,$data[1]->id];
        $dataArr=$data;
        for ($i=0; count($data)!=0 ; $i++) {
            $getData=$this->findArray($data);
            $data=$getData;
            foreach($getData as $value){
                array_push($dataArr,$value);
            }
            
        }
        return $dataArr;
    }
    public function findArray($data)
    {
        
        $arr=[];
        $length=count($data);
        // return $data;
        for ($i=0; $i <$length ; $i++) {
            $dataArr=User::select('id','username')->where('uplink_id',($data!=null? $data[$i] : null))->get();
            foreach($dataArr as $value){
            array_push($arr,$value->id);
            }
        }
        // dd($arr);
        return $arr;
    }
}

