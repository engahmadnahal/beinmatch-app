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
            'poll_to_club_one' => $this->poll->where('club_one',1)->count(),
            'poll_to_darw' => $this->poll->where('darw',1)->count(),
            'poll_to_club_two' => $this->poll->where('club_two',1)->count(),
            // 'numOfUser'=>$this->where('user_id','<>',null)->count(),
        ];
    }
}
