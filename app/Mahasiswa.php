<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable = [
    	'nim', 'name', 'fakultas', 'kode', 'status', 'golput',
    ];

    public function calon()
    {
    	return $this->belongsTo(Calon::class);
    }
}
