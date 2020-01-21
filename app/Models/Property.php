<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
		'user_id', 
		'title', 
		'negociacao',
		'tipo',
		'areap',
		'areat',
		'numero_quartos',
		'iptu',
		'garagem',
		'banheiros',
		'situacao',
		'valor_cond',
		'valor_tot',
		'comissao',
		'cep',
		'endereco',
		'bairro',
		'numero',
		'cidade',
		'estado',
		'description', 
		'price', 
		'latitude', 
		'longitude', 
		'image', 
		'region', 
		'zip_code', 
		'extra_field',
		'email_user'
	];

	public function getImage()
	{
		return asset('project-assets/uploaded/images/'.$this->image);
	}
}
