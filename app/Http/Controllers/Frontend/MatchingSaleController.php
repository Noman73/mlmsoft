<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\CountTrait;
use App\Models\User;
use App\Models\MCommision;
class MatchingSaleController extends Controller
{
    use CountTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function saleCount()
    {
        $user=User::select('id')->orderBy('id')->get();
        $dataArr=[];
        foreach($user as $data){
            $last_commision=MCommision::where('user_id',$data->id)->orderBy('id','desc')->first();
           
                $amount=0;
                $x=$this->leftCount($data->id);
                $y=$this->rightCount($data->id);
                // $dataArr[$data->id]=[$leftCount,$rightCount];
                
                if(count($x)>count($y)){
                    for ($i=0; $i < count($y); $i++) { 
                        $xcount=count($x['level-'.$i]);
                        $ycount=count($y['level-'.$i]);
                        $count=min($xcount,$ycount);
                        // $dataArr[]=$count;
                    }
                }else{
                    for ($i=0; $i < count($x); $i++) { 
                        $xcount=count($x['level-'.$i]);
                        $ycount=count($y['level-'.$i]);
                        $count=min($xcount,$ycount);
                        // $dataArr[]=$count;

                    }
                }
                if(!isset($count)){
                    $count=0;
                    // $dataArr[]=$count;
                }
                $commision=new MCommision;
                $commision->user_id=$data->id;
                $commision->date=strtotime(date('d-m-Y'));
                if($last_commision!=null){
                    $get_count=($count-floatval($last_commision->total_count)>=30 ? 30 : $count-floatval($last_commision->total_count));
                    $commision->get_count=$get_count;
                }else{
                    $get_count=($count>=30? 30 :$count);
                    $commision->get_count=$get_count;
                    
                }
                $commision->total_count=$count;
                $commision->ammount=$get_count*100;
                $commision->save();
                $dataArr[]=$get_count;
            
        }
        return $dataArr;
    }


}
