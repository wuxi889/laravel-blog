<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

class Auth extends AdminBaseController
{
    use AuthenticatesUsers;

    protected $redirectTo = 'admin.t.com';

    public function showLogin()
    {
        return view('admin.auth.login');
    }

    public function logout()
    {
        $this->guard()->logout();

        $this->request->session()->invalidate();

        return $this->loggedOut($this->request) ?: redirect('/');
    }
}
