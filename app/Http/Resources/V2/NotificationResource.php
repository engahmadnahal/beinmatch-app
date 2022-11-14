<?php

namespace App\Http\Resources\V2;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class NotificationResource extends JsonResource
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
            'count_unread' => $this->unreadNotifications->count(),
            'notifications' => $this->unreadNotifications->map(function($n) {
                return [
                    'title'=>$n->data['title'],
                    'content'=>$n->data['content'],
                    'img'=>Storage::url($n->data['img']),
                ];
            })
        ];
    }
}
