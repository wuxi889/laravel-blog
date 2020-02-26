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

if (!function_exists('human_filesize')) {
    /**
     * 返回可读性更好的文件尺寸
     */
    function human_filesize($bytes, $decimals = 2): string
    {
        $size = ['B', 'kB', 'MB', 'GB', 'TB', 'PB'];
        $factor = floor((strlen($bytes) - 1) / 3);
    
        return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) .@$size[$factor];
    }
}

if (!function_exists('is_image')) {
    /**
     * 判断文件的MIME类型是否为图片
     */
    function is_image($mimeType): bool
    {
        return substr($mimeType, 0, 6) == 'image/';
    }
}

if (!function_exists('str_finish')) {
    /**
     * 添加一个如果没有以指定值结尾的字符串后面
     */
    function str_finish(string $str, string $param): string
    {
        $last = substr($str, -1, 1);
        return $param === $last ? $str : ($str . $param);
    }
}

