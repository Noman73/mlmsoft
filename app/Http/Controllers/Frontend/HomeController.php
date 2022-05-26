<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $total_sale=User::where('refferance_id',auth()->user()->id)->count();
        return view('frontend.dashboard.dashboard',compact('total_sale'));
    }
}
