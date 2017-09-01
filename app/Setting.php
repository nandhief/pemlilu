<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['name', 'value'];

    public static function boot()
    {
        parent::boot();
        Setting::observe(new \App\Observers\UserActionsObserver);
    }
}
