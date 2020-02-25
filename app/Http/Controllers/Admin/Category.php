<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categories;

class Category extends AdminBaseController
{
    public function init()
    {
        $this->model = new Categories();
    }

    public function index()
    {
        $categories = $this->model
            ->leftjoin('articles AS a', 'a.category_id', '=', 'categories.id')
            ->selectRaw('categories.*, COUNT(a.id) AS articles_count')
            ->groupBy('categories.id')
            ->orderBy('categories.id', 'DESC')
            ->get();

        return view('admin.category.index', compact('categories'));
    }
}
