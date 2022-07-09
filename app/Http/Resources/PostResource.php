<?php

namespace App\Http\Resources;

use Carbon\Carbon;
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
        $isLikeUser = $this->likes->filter( function ($like) {
                return $like->user_id == auth()->user()->id;
            })->first();

        // employee_id dawry_id title thumnail content publish_at send_notfi status deleted_at created_at updated_at
        return [
            'id' => $this->id,
            'title' => $this->title,
            'thumnail'=>Storage::url($this->thumnail),
            'body' => $this->content,
            'created_at'=> $this->created_at->diffForHumans(),
            'employee'=>[
                'id'=>$this->employee->id,
                'name'=>$this->employee->full_name
            ],
            'dawry'=>[
                'id'=>$this->dawry->id,
                'name'=>$this->dawry->name
            ],
            'likes'=>$this->likes->where('is_like',1)->count(),
            'dislikes'=>$this->likes->where('is_like',0)->count(),
            'user_like'=> !is_null($isLikeUser) ? boolval($isLikeUser->is_like) : null ,
            'views'=>$this->userView->count(),
            'comments'=>[
                'count'=>$this->comment->count(),
                'data'=>$this->comment->map(function($comment){
                    return [
                        'id'=>intval($comment->id),
                        'content'=>$comment->content,
                        'created_at'=>$comment->created_at->diffForHumans(),
                        'user'=>$comment->user,
                    ];
                }),

            ],
        ];
    }
}
