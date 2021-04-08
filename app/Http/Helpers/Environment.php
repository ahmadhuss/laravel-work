<?php

namespace App\Http\Helpers;
use Illuminate\Support\Facades\App;

trait Environment {

    /**
     * @return string
     */
    public static function getStorageEnvironment(): string
    {
        if (App::environment('local')) {
            return 'public';
        } else {
            return 's3';
        }
    }
}
