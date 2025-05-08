<?php

use Incodiy\Realements\FormBuilder;

if (!function_exists('realements')) {
    function realements() {
        return app('realements');
    }
}