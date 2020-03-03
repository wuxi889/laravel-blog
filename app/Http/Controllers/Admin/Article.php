<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ArticleCreateRequest;
use App\Http\Requests\ArticleUpdateRequest;
use App\Models\ArticleContents;
use App\Models\Articles;
use App\Models\ArticleTags;
use App\Models\Categories;
use App\Models\Tags;

class Article extends AdminBaseController
{
    public function init()
    {
        $this->model = new Articles();
    }

    /**
     * 创建
     *
     * @Description: 
     * @Author: uSee | wuxi889@vip.qq.com
     * @DateTime 2020-02-27
     * @return void
     */
    public function create()
    {
        // 基本字段
        $fields = $this->getFields(true);
        $data = [];
        array_map(function ($v) use (&$data) {
            $data[$v] = '';
        }, $fields);

        // 所有分类
        $categories = Categories::all();

        return view('admin.article.create', compact('data', 'categories'));
    }

    /**
     * 新增
     *
     * @Description: 
     * @Author: uSee | wuxi889@vip.qq.com
     * @DateTime 2020-02-27
     * @param ArticleCreateRequest $request
     * @return void
     */
    public function store(ArticleCreateRequest $request)
    {
        // 获取表字段
        $fields = $this->getFields(true);

        // 遍历传入参数，写入模型属性
        foreach ($fields as $v) {
            $this->model->{$v} = $request->get($v);
        }
        
        if ($this->model->save()) {
            // 创建内容
            $this->model->content()->create(['content' => $request->get('content')]);
            // ArticleContents::create(['article_id' => $this->model->id, 'content' => $request->get('content')]);

            // 添加标签
            $id = $this->model->id;
            $tags = array_filter(array_unique(explode(' ', $request->get('tags'))));
            $insert = [];
            foreach ($tags as $tag) {
                $temp = Tags::firstOrCreate(['name' => $tag]);
                if ($temp) $insert[] = ['article_id' => $id, 'tag_id' => $temp->id];
            }
            ArticleTags::insert($insert);

            return redirect()->route('article.index')->with('success', '文章' . $this->model->title . '」创建成功.');
        }
        else {
            return redirect()->route('article.index')->with('error', '文章' . $this->model->title . '」创建失败.');
        }
    }

    /**
     * 编辑
     *
     * @Description: 
     * @Author: uSee | wuxi889@vip.qq.com
     * @DateTime 2020-02-27
     * @param [int] $id
     * @return void
     */
    public function edit(int $id)
    {
        // 查询文章详情
        $article = $this->model->findOrFail($id);
        $article->content;
        $article->tags;
        $article = $article->toArray();

        // 获取表字段
        $fields = $this->getFields(true);

        // 将文章属性赋值给data
        $data = [
            'id' => $article['id'],
            'content' => $article['content']['content'],
            'tags' => implode(' ', array_column($article['tags'], 'name')),
        ];
        foreach ($fields as $v) {
            $data[$v] = $article[$v];
        }

        // 获取所有分类
        $categories = Categories::all();

        return view('admin.article.edit', compact('data', 'categories'));
    }

    /**
     * 更新
     *
     * @Description: 
     * @Author: uSee | wuxi889@vip.qq.com
     * @DateTime 2020-02-27
     * @param ArticleUpdateRequest $request
     * @param [int] $id
     * @return void
     */
    public function update(ArticleUpdateRequest $request, int $id)
    {
        $this->model = $this->model->findOrFail($id);

        // 获取字段
        $fields = $this->getFields(true);

        // 遍历传入参数，写入模型属性
        foreach ($fields as $v) {
            $this->model->{$v} = $request->get($v);
        }
        
        if ($this->model->save()) {
            // 创建内容
            $this->model->content()->update(['content' => $request->get('content')]);

            // 添加标签
            $id = $this->model->id;
            $tags = array_filter(array_unique(explode(' ', $request->get('tags'))));
            $insert = [];
            foreach ($tags as $tag) {
                $temp = Tags::firstOrCreate(['name' => $tag]);
                if ($temp) $insert[] = ['article_id' => $id, 'tag_id' => $temp->id];
            }
            ArticleTags::where('article_id', $id)->delete();
            ArticleTags::insert($insert);

            return redirect()->route('article.index')->with('success', '文章' . $this->model->title . '」修改成功.');
        }
        else {
            return redirect()->route('article.index')->with('error', '文章' . $this->model->title . '」修改失败.');
        }
    }
}
