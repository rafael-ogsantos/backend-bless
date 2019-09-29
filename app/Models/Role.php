<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Role extends Model
{
	protected $fillable = [
		'name', 'description'
	];

    public function users()
    {
    	return $this->belongsToMany('App\User', 'user_role', 'role_id', 'user_id');
    }
}
