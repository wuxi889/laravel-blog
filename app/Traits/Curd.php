<?php
/*
 * @Description: CURD Trait
 * @Author: uSee
 * @Date: 2020-02-24 13:39:43
 * @LastEditors: uSee
 * @LastEditTime: 2020-02-24 17:16:46
 * @FilePath: \laravel-blog\app\Traits\Curd.php
 */

namespace App\Traits;

use Illuminate\Support\Facades\Schema;

trait Curd
{
    public function getFields($available = false)
    {
        $fields = Schema::getColumnListing($this->model->getTable());
        $unavailable_fields = [
            $this->model->primaryKey,
            self::CREATED_AT,
            self::UPDATED_AT,
            $this->model->getDeletedAtColumn(),
        ];

        return $available ? array_diff($fields, $unavailable_fields) : $fields;
    }

    public function buildParam()
    {

    }

    public function index()
    {
        return view(sprintf('admin.%s.index', $this->getController(true)));
    }

    public function create($param)
    {
        $fields = $this->getFields(true);
        $data = array_intersect_key(array_combine($fields, $fields), $param);
        return $this->model->create($data);
    }

    public function store()
    {

    }

    public function show($id)
    {
        return $this->model->where($this->model->primaryKey, $id)->find();
    }

    public function edit($param)
    {
        $id = $param[$this->primaryKey] ?? 0;
        $fields = $this->getFields(true);
        $data = array_intersect_key(array_combine($fields, $fields), $param);
        
        return $this->model->where($this->model->primaryKey, $id)->update($data);
    }

    public function update()
    {

    }

    public function destroy($id)
    {
        return $this->model->whereIn($this->model->primaryKey, $id)->delete();
    }
}
