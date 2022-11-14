<?php

namespace App\Http\Resources\V2;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class PostCommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'content' => $this->content,
            'created_at' => $this->created_at->diffForHumans(),
            'updated_at' => $this->updated_at->diffForHumans(),
            'user'=>[
                    'id'=>intval($this->user->id),
                    'fname'=>$this->user->fname,
                    'lname'=>$this->user->lname,
                    'username'=>$this->user->username,
                    'avater'=>$this->user->avater,
                    'email'=>$this->user->email,
            ],
        ];
    }
}
