<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Calon extends Model
{
    use SoftDeletes;

    protected $fillable = [
    	'name', 'image', 'wname', 'wimage',
    ];

    public static function boot()
    {
        parent::boot();
        Calon::observe(new \App\Observers\UserActionsObserver);
    }

    public function mahasiswas()
    {
    	return $this->hasMany(Mahasiswa::class);
    }
}
