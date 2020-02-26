<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryCreateRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\Articles;
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

    public function store(CategoryCreateRequest $request)
    {
        // 获取表字段
        $fields = $this->getFields(true);

        // 遍历传入参数，写入模型属性
        foreach ($fields as $v) {
            $this->model->{$v} = $request->get($v);
        }
        
        return $this->model->save() 
            ? redirect('/category')->with('success', '分类 [' . $this->model->name . '] 创建成功.') 
            :redirect('/category')->with('error', '分类 [' . $this->model->name . '] 创建失败.');
    }

    public function update(CategoryUpdateRequest $request, $id)
    {
        $this->model = $this->model->findOrFail($id);

        // 获取字段
        $fields = $this->getFields(true);

        // 遍历传入参数，写入模型属性
        foreach ($fields as $v) {
            $this->model->{$v} = $request->get($v);
        }
        
        return $this->model->save() 
            ? redirect('/category')->with('success', '分类 [' . $this->model->name . '] 修改成功.') 
            :redirect('/category')->with('error', '分类 [' . $this->model->name . '] 修改失败.');
    }

    public function destroy($id)
    {
        if($this->model->whereIn($this->model->getKeyName(), (array) $id)->delete()) {
            Articles::where('category_id', $id)->update(['category_id' => 0]);
            return redirect('/category')->with('success', '对象删除成功');
        }
        return redirect('/category')->with('error', '对象删除失败');
    }
}
