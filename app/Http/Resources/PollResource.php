<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PollResource extends JsonResource
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
            'mobara_id'=>$this->mobara_id,
            'club_one'=>$this->club_one,
            'darw'=>$this->darw,
            'club_two'=>$this->club_two,
            // 'numOfUser'=>$this->where('user_id','<>',null)->count(),
        ];
    }
}
