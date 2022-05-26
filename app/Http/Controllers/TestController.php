<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\LeftCountTrait;
class TestController extends Controller
{
    public function index()
    {
        
        return $this->leftCount();
    }
}
