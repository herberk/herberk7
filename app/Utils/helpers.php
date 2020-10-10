<?php

if (! function_exists('setting')) {

    function setting($key, $default = null)
    {
        if (is_null($key)) {
            return new \App\Models\varias\Setting();
        }

        if (is_array($key)) {
            return \App\Models\varias\Setting::set($key[0], $key[1]);
        }

        $value =\App\Models\varias\Setting::get($key);

        return is_null($value) ? value($default) : $value;
    }
}
