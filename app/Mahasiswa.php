<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable = [
    	'nim', 'name', 'fakultas', 'kode', 'status', 'golput',
    ];

    public static function boot()
    {
        parent::boot();
        Mahasiswa::observe(new \App\Observers\UserActionsObserver);
    }

    public function calon()
    {
    	return $this->belongsTo(Calon::class);
    }
}
