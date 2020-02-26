<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TagCreateRequest;
use App\Http\Requests\TagUpdateRequest;
use App\Models\ArticleTags;
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

    public function store(TagCreateRequest $request)
    {
        // 获取表字段
        $fields = $this->getFields(true);

        // 遍历传入参数，写入模型属性
        foreach ($fields as $v) {
            $this->model->{$v} = $request->get($v);
        }
        
        return $this->model->save() 
            ? redirect('/tag')->with('success', '标签 [' . $this->model->name . '] 创建成功.') 
            :redirect('/tag')->with('error', '标签 [' . $this->model->name . '] 创建失败.');
    }

    public function update(TagUpdateRequest $request, $id)
    {
        $this->model = $this->model->findOrFail($id);

        // 获取字段
        $fields = $this->getFields(true);

        // 遍历传入参数，写入模型属性
        foreach ($fields as $v) {
            $this->model->{$v} = $request->get($v);
        }
        
        return $this->model->save() 
            ? redirect('/tag')->with('success', '标签 [' . $this->model->name . '] 修改成功.') 
            :redirect('/tag')->with('error', '标签 [' . $this->model->name . '] 修改失败.');
    }

    public function destroy($id)
    {
        if($this->model->whereIn($this->model->getKeyName(), (array) $id)->delete()) {
            ArticleTags::where('tag_id', $id)->delete();
            return redirect('/tag')->with('success', '对象删除成功');
        }
        return redirect('/tag')->with('error', '对象删除失败');
    }
}
