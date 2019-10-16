<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AgentRecourse extends JsonResource
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
            'phone_number' => $this->phone_number,
            'region' => $this->region,
            'photo' => $this->getProfileImage(),
            'cnpj' => $this->user_details->franchise_user_cnpj,
            'company_name' => $this->user_details->company_name,
            'admin_user' => $this->user_details->admin_user,
        ];
    }
}
