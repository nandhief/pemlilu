<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	use SoftDeletes;

	protected $dates = ['deleted_at'];

    public function users()
	{
		return $this->belongToMany(User::class);
	}
}
