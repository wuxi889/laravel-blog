<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

class Auth extends AdminBaseController
{
    use AuthenticatesUsers;

    protected $redirectTo = 'admin.t.com';

    /**
     * 显示登陆界面
     *
     * @Description: 
     * @Author: uSee | wuxi889@vip.qq.com
     * @DateTime 2020-02-27
     * @return void
     */
    public function showLogin()
    {
        return view('admin.auth.login');
    }

    /**
     * 用户登出操作
     *
     * @Description: 
     * @Author: uSee | wuxi889@vip.qq.com
     * @DateTime 2020-02-27
     * @return void
     */
    public function logout()
    {
        $this->guard()->logout();

        $this->request->session()->invalidate();

        return $this->loggedOut($this->request) ?: redirect('/');
    }
}
