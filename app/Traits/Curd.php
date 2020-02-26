<?php
/*
 * @Description: CURD Trait
 * @Author: uSee
 * @Date: 2020-02-24 13:39:43
 * @LastEditors: uSee
 * @LastEditTime: 2020-02-26 15:24:38
 * @FilePath: \laravel-blog\app\Traits\Curd.php
 */

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

trait Curd
{
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

    public function buildParam()
    {

    }

    public function index()
    {
        $list = $this->model->orderBy($this->model->getKeyName(), 'DESC')->get();
        return view(sprintf('admin.%s.index', $this->getController(true)), compact('list'));
    }

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

    public function show()
    {
        
    }

    public function edit($id)
    {
        $data = $this->model->findOrFail($id);
        return view(sprintf('admin.%s.edit', $this->getController(true)), compact('data'));
    }

    public function destroy($id)
    {
        if($this->model->whereIn($this->model->getKeyName(), (array) $id)->delete()) {
            return redirect('/' . $this->getController(true))->with('success', '对象删除成功');
        }
        return redirect('/' . $this->getController(true))->with('error', '对象删除失败');
    }
}
