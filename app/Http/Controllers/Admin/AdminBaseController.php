<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\Curd;

class AdminBaseController extends Controller
{
    use Curd;
    
    /**
     * 构造方法
     */
    public function __construct()
    {
        
    }
}
