<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public $token;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public function toArray($request)
    {
        return [
            'id' => intval($this->id),
            'fname' => $this->fname ,
            'lname' => $this->lname,
            'email' => $this->email,
            'username' => $this->username,
            'avater' => $this->avater,
            'status' => $this->status,
            'os_mobile'=>$this->os_mobile
        ];
    }
}
