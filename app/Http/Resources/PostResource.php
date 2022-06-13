<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */

    public function toArray($request)
    {
        // employee_id dawry_id title thumnail content publish_at send_notfi status deleted_at created_at updated_at
        return [
            'id' => $this->id,
            'title' => $this->title,
            'thumnail'=>Storage::url($this->thumnail),
            'body' => $this->content,
            'employee'=>[
                'id'=>$this->employee->id,
                'name'=>$this->employee->full_name
            ],
            'dawry'=>[
                'id'=>$this->dawry->id,
                'name'=>$this->dawry->name
            ],
            'likes'=>$this->userLike->where('is_liken',1)->count(),
            'dislikes'=>$this->userLike->where('is_liken',0)->count(),
            'views'=>$this->userView->count(),
            'comments'=>[
                'count'=>$this->comment->count(),
                'data'=>$this->comment,

            ],
        ];
    }
}
