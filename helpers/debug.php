<?php

if (!function_exists('dd')) {

    function dd($param) {

        print '<pre>';

        var_dump($param);

        exit;
    }

}