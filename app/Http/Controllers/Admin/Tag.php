<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tags;

class Tag extends AdminBaseController
{
    public function init()
    {
        $this->model = new Tags();
    }

    public function index()
    {
        $tags = $this->model->withCount('articles')->orderBy($this->model->getKeyName(), 'DESC')->get();
        
        return view('admin.tag.index', compact('tags'));
    }
}
