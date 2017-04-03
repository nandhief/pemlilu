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

    public function mahasiswas()
    {
    	return $this->belongsTo(Mahasiswa::class);
    }
}
