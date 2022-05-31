<?php
namespace App\Http\Traits;

use DB;
use App\Models\MCommision;
use App\Models\User;
use App\Models\Withdraw;

trait TotalBalanceTrait{

    public function totalBalance($id)
    {
        $commision=MCommision::where('user_id',$id)->sum('ammount');
        $direct_commision=(User::where('refferance_id',$id)->count())*100;
        $withdraw=Withdraw::where('user_id',$id)->sum('ammount');
        $balance=floatval($commision+$direct_commision)-floatval($withdraw);
        return $balance;
    }
    public function totalEarn($id)
    {
        $commision=MCommision::where('user_id',$id)->sum('ammount');
        $direct_commision=(User::where('refferance_id',$id)->count())*100;
        $earn=floatval($commision+$direct_commision);
        return $earn;
    }
    public function totalWithdraw($id){
      return  $withdraw=Withdraw::where('user_id',$id)->sum('ammount');
    }
}

