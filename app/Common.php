<?php
// 公共函数库

if (!function_exists('uncamelize')) {
    /**
     * 驼峰转小写
     *
     * @param string $str
     * @return string
     */
    function uncamelize(string $str): string
    {
        return strtolower(preg_replace('/(?<=[a-z])([A-Z])/', '_$1', $str));
    }
}