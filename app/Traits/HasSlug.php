<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasSlug
{
    

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public static function bootHasSlug()
    {
        static::saving(function ($model)
        {
            $model->slug = Str::slug($model->name);
        });
    }
}
