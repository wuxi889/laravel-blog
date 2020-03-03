<?php
/*
 * @Description: CURD Trait
 * @Author: uSee
 * @Date: 2020-02-24 13:39:43
 * @LastEditors: uSee
 * @LastEditTime: 2020-03-03 13:42:21
 * @FilePath: \laravel-blog\app\Traits\Curd.php
 */

namespace App\Traits;

use Illuminate\Support\Facades\Schema;

trait Curd
{
    /**
     * 获取表字段
     *
     * @Description: 
     * @Author: uSee | wuxi889@vip.qq.com
     * @DateTime 2020-02-27
     * @param boolean $available 是否返回可用字段
     * @return array
     */
    public function getFields($available = false)
    {
        $fields = Schema::getColumnListing($this->model->getTable());
        $unavailable_fields = [
            $this->model->getKeyName(),
            $this->model::CREATED_AT,
            $this->model::UPDATED_AT,
            $this->model->getDeletedAtColumn(),
        ];

        return $available ? array_diff($fields, $unavailable_fields) : $fields;
    }

    /**
     * 过滤字段
     *
     * @Description: 
     * @Author: uSee | wuxi889@vip.qq.com
     * @DateTime 2020-02-26
     * @param array $params
     * @return array
     */
    public function filterFields(array $params): array
    {
        $fields = $this->getFields(true);
        return array_intersect_key(array_combine($fields, $fields), $params);
    }

    /**
     * 创建查询参数
     *
     * @Description: 
     * @Author: uSee | wuxi889@vip.qq.com
     * @DateTime 2020-02-27
     * @return void
     */
    public function buildParam()
    {

    }

    /**
     * 列表
     *
     * @Description: 
     * @Author: uSee | wuxi889@vip.qq.com
     * @DateTime 2020-02-27
     * @return
     */
    public function index()
    {
        $list = $this->model->orderBy($this->model->getKeyName(), 'DESC')->get();
        return view(sprintf('admin.%s.index', $this->getController(true)), compact('list'));
    }

    /**
     * 新增页面
     *
     * @Description: 
     * @Author: uSee | wuxi889@vip.qq.com
     * @DateTime 2020-02-27
     * @return
     */
    public function create()
    {
        $fields = $this->getFields(true);
        $data = [];
        array_map(function ($v) use (&$data) {
            $data[$v] = '';
        }, $fields);
        return view(sprintf('admin.%s.create', $this->getController(true)), compact('data'));
    }

    /**
     * 展示页面
     *
     * @Description: 
     * @Author: uSee | wuxi889@vip.qq.com
     * @DateTime 2020-02-27
     * @return void
     */
    public function show()
    {
        
    }

    /**
     * 显示编辑页面
     *
     * @Description: 
     * @Author: uSee | wuxi889@vip.qq.com
     * @DateTime 2020-02-27
     * @param [int] $id
     * @return
     */
    public function edit(int $id)
    {
        $data = $this->model->findOrFail($id);
        return view(sprintf('admin.%s.edit', $this->getController(true)), compact('data'));
    }

    /**
     * 删除
     *
     * @Description: 
     * @Author: uSee | wuxi889@vip.qq.com
     * @DateTime 2020-02-27
     * @param [mixed] $id
     * @return
     */
    public function destroy($id)
    {
        return $this->model->whereIn($this->model->getKeyName(), (array) $id)->delete()
        ? redirect()->route(sprintf('%s.index', $this->getController(true)))->with('success', '对象删除成功')
        : redirect()->route(sprintf('%s.index', $this->getController(true)))->with('error', '对象删除失败');
    }
}
