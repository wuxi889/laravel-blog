<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\Curd;

class AdminBaseController extends Controller
{
    use Curd;
    
    protected $request;

    /**
     * 构造方法
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
}
