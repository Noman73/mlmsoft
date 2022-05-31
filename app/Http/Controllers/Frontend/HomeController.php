<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MCommision;
use App\Http\Traits\TotalBalanceTrait;
class HomeController extends Controller
{
    use TotalBalanceTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $total_sale=User::where('refferance_id',auth()->user()->id)->count();
        $matching_commision=MCommision::where('user_id',auth()->user()->id)->sum('ammount');
        $direct_commision=(User::where('refferance_id',auth()->user()->id)->count())*100;
        $total_balance=$this->totalBalance(auth()->user()->id);
        $total_earn=$this->totalEarn(auth()->user()->id);
        $total_withdraw=$this->totalWithdraw(auth()->user()->id);
        return view('frontend.dashboard.dashboard',compact('total_sale','matching_commision','direct_commision','total_balance','total_earn','total_withdraw'));
    }
}
