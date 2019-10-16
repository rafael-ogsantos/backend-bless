<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'api_token' => $this->api_token,
            'phone_number' => $this->phone_number,
            'region' => $this->region,
            'role_id' => $this->roles[0]->id,
            'role_name' => $this->roles[0]->name,
            'segment' => $this->user_details->segment,
            'linked_user' => $this->user_details->linked_user,
            'client_user_cpf' => $this->user_details->client_user_cpf,
            'id_of_user_in_system' => $this->user_details->id_of_user_in_system,
            'place_of_issue' => $this->user_details->place_of_issue,
            'profession' => $this->user_details->profession,
            'telephone' => $this->user_details->telephone,
            'profession' => $this->user_details->profession,
            'profile_image' => $this->getProfileImage(),
            'mariage_status' => $this->user_details->mariage_status,
            'gender' => $this->user_details->gender,
            'date_of_birth' => $this->user_details->date_of_birth,
            'zip_code' => $this->user_details->zip_code,
            'number' => $this->user_details->number,
            'address' => $this->user_details->address,
            'neighborhood' => $this->user_details->neighborhood,
            'complement' => $this->user_details->complement,
            'state' => $this->user_details->state,
            'uf' => $this->user_details->uf,
            'franchise_user_cnpj' => $this->user_details->franchise_user_cnpj,
            'company_name' => $this->user_details->company_name,
            'admin_user' => $this->user_details->admin_user,
        ];
    }
}
