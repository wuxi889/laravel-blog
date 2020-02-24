<?php
/*
 * @Description: CURD Trait
 * @Author: uSee
 * @Date: 2020-02-24 13:39:43
 * @LastEditors: uSee
 * @LastEditTime: 2020-02-24 17:16:46
 * @FilePath: \laravel-blog\app\Model\Traits\Curd.php
 */

namespace App\Model\Traits;

use Illuminate\Support\Facades\Schema;

trait Curd
{
    public function getFields($available = false)
    {
        $fields = Schema::getColumnListing($this->getTable());
        $unavailable_fields = [
            $this->primaryKey,
            self::CREATED_AT,
            self::UPDATED_AT,
            $this->getDeletedAtColumn(),
        ];

        return $available ? array_diff($fields, $unavailable_fields) : $fields;
    }

    public function buildParam()
    {

    }

    public function index()
    {

    }

    public function create($param)
    {
        $fields = $this->getFields(true);
        $data = array_intersect_key(array_combine($fields, $fields), $param);
        return $this->create($data);
    }

    public function read($id)
    {
        return $this->where($this->primaryKey, $id)->find();
    }

    public function edit($param)
    {
        $id = $param[$this->primaryKey] ?? 0;
        $fields = $this->getFields(true);
        $data = array_intersect_key(array_combine($fields, $fields), $param);
        
        return $this->where($this->primaryKey, $id)->update($data);
    }

    public function drop($param)
    {
        $id = (array) $param['id'];
        return $this->whereIn($this->primaryKey, $id)->delete();
    }
}
