<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    protected $fillable = [
    	'user_id', 'segment', 'linked_user', 'client_user_cpf', 'id_of_user_in_system', 'place_of_issue', 'telephone', 'profession', 'profile_image', 'mariage_status', 'gender', 'date_of_birth', 'zip_code', 'address', 'number', 'neighborhood', 'complement', 'state', 'uf', 'franchise_user_cnpj', 'company_name', 'admin_user'
    ];
}
