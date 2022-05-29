<?php
namespace App\Http\Traits;

use App\Models\User;
use DB;

trait LevelTrait{

    private $level;
    private $total;

    public function leftCount($id){
        $left=DB::table('users')->select('id','username')->where('uplink_id',$id)->where('position',0)->first();
        $data=DB::table('users')->select('id','username')->where('uplink_id',($left!=null? $left->id : 0))->get();
        // $findData=$this->findArray($data);
        // return $findData[0][0]->id;
        $dataArr=[];
        if($left!=null){
            $dataArr['level-0']=[$left->id];
        }
        if(count($data)==0){
            return $dataArr;
        }
        
        if(isset($data[0]->id) and isset($data[1]->id)){
            $data=[$data[0]->id,$data[1]->id];
        }elseif(isset($data[0]->id)){
            $data=[$data[0]->id];
        }elseif(isset($data[1]->id)){
            $data=[$data[1]->id];
        }
        // $data=[$data[0]->id,$data[1]->id];
        $dataArr=array_merge($dataArr,['level-1'=>$data]);
        for ($i=2; count($data)!=0 ; $i++) {
            $getData=$this->findArray($data);
            $data=$getData;
            $dataArr['level-'.$i]=[];
            foreach($getData as $value){
                array_push($dataArr['level-'.$i],$value);
            }
        }
        return $dataArr;
    }
    public function rightCount($id){
        $left=DB::table('users')->select('id','username')->where('uplink_id',$id)->where('position',1)->first();
        $data=DB::table('users')->select('id','username')->where('uplink_id',($left!=null? $left->id : 0))->get();
        // $findData=$this->findArray($data);
        // return $findData[0][0]->id;
        $dataArr=[];
        if($left!=null){
            $dataArr['level-0']=[$left->id];
        }
        if(count($data)==0){
            return $dataArr;
        }
        
        if(isset($data[0]->id) and isset($data[1]->id)){
            $data=[$data[0]->id,$data[1]->id];
        }elseif(isset($data[0]->id)){
            $data=[$data[0]->id];
        }elseif(isset($data[1]->id)){
            $data=[$data[1]->id];
        }
        // $data=[$data[0]->id,$data[1]->id];
        $dataArr=array_merge($dataArr,['level-1'=>$data]);
        for ($i=2; count($data)!=0 ; $i++) {
            $getData=$this->findArray($data);
            $data=$getData;
            $dataArr['level-'.$i]=[];
            foreach($getData as $value){
                array_push($dataArr['level-'.$i],$value);
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

