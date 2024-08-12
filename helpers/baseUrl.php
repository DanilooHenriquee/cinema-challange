<?php

if (!function_exists('baseUrl')) {

    function baseUrl($url = '') {

        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

        $host = $_SERVER['HTTP_HOST'];

        $scriptName = str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']);

        $baseUrl = $protocol . $host . $scriptName;

        return rtrim($baseUrl, '/') . '/' . ltrim($url, '/');
    }

}