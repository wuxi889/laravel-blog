<?php

namespace App\Http\Controllers\Admin;

class Article extends AdminBaseController
{
    public function index()
    {
        return view('admin.article.index');
    }
}
