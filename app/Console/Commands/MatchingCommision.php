<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\MCommision;
use App\Models\User;
use App\Http\Traits\CountTrait;
class MatchingCommision extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    use CountTrait;
    protected $signature = 'matching:commision';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Commision executed';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {   
        $user=User::select('id')->orderBy('id')->get();
        // $dataArr=[];
        foreach($user as $data){
            $last_commision=MCommision::where('user_id',$data->id)->orderBy('id','desc')->first();
           
                $amount=0;
                $x=$this->leftCount($data->id);
                $y=$this->rightCount($data->id);
                $dataArr[$data->id]=[$x,$y];
                $count=0;
                if(count($x)>count($y)){
                    for ($i=0; $i < count($y); $i++) { 
                        $xcount=count($x['level-'.$i]);
                        $ycount=count($y['level-'.$i]);
                        $count+=min($xcount,$ycount);
                        // $dataArr[]=$count;
                    }
                }else{
                    for ($i=0; $i < count($x); $i++) { 
                        $xcount=count($x['level-'.$i]);
                        $ycount=count($y['level-'.$i]);
                        $count+=min($xcount,$ycount);
                        // $dataArr[]=$count;
                    }
                }
                if(!isset($count)){
                    $count=0;
                    // $dataArr[]=$count;
                }
                if($last_commision!=null){
                    $get_count=($count-floatval($last_commision->total_count)>=30 ? 30 : $count-floatval($last_commision->total_count));
                }else{
                    $get_count=($count>=30? 30 :$count);
                }
                if($count!=0 and $get_count!=0){
                    $commision=new MCommision;
                    $commision->user_id=$data->id;
                    $commision->date=strtotime(date('d-m-Y'));
                    $commision->get_count=$get_count;
                    $commision->total_count=$count;
                    $commision->ammount=$get_count*100;
                    $commision->save();
                }
            
        }


        // 
        info('commision successfully added');
        return 0;
    }
}
