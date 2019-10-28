<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
		'user_id', 'title', 'description', 'price', 'latitude', 'longitude', 'image', 'region', 'zip_code', 'extra_field'
	];

	public function getImage()
	{
		return asset('project-assets/uploaded/images/'.$this->image);
	}
}
