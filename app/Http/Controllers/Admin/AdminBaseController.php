<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\Curd;
use Illuminate\Support\Facades\Route;

class AdminBaseController extends Controller
{
    use Curd;
    
    protected $request;
    protected $controller;
    protected $action;
    protected $mode;

    /**
     * 构造方法
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->init();
        $this->getControllerAndAction();
    }

    public function init()
    {

    }

    public function getController($lower = false)
    {
        return $lower ? uncamelize($this->controller) : $this->controller;
    }

    public function getAction($lower = false)
    {
        return $lower ? uncamelize($this->action) : $this->action;
    }

    public function getControllerAndAction()
    {
         $full = Route::current()->getActionName();
         list($controller, $action) = explode('@', $full);
         $controller = substr(strrchr($controller, '\\'), 1);
         $this->controller = $controller;
         $this->action = $action;
    }
}
