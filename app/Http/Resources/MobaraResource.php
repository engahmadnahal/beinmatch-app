<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MobaraResource extends JsonResource
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
            'botola' => $this->botola,
            'timeStart'=>$this->start,
            'likes'=>$this->userLike->where('is_liken',1)->count(),
            'dislikes'=>$this->userLike->where('is_liken',0)->count(),
            'poll_to_club_one' => $this->poll->where('club_one',1)->count(),
            'poll_to_club_two' => $this->poll->where('club_two',1)->count(),
            'poll_to_darw' => $this->poll->where('darw',1)->count(),
            'club_one'=>[
                'id'=>$this->club_one_id,
                'name'=>$this->club_one->name,
                'logo'=>$this->club_one->avater
            ],
            'club_two'=>[
                'id'=>$this->club_two_id,
                'name'=>$this->club_two->name,
                'logo'=>$this->club_two->avater
            ],
            'dawry' => [
                'id' => $this->dawry->id,
                'name' => $this->dawry->name,
                'avater' => $this->dawry->avater,
            ],
            'channel' => [
                'id' => $this->channel->id,
                'channel_name' => $this->channel->name,
                'channel_url' => json_decode($this->channel->urls),
            ],
            'poll'=>$this->poll,
            'comments'=>[
                'count'=>$this->commentForUserToMatch->count(),
                'data'=>$this->commentForUserToMatch,
            ],
        ];
    }
}
