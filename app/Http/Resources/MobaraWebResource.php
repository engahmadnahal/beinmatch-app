<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class MobaraWebResource extends JsonResource
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
            'id' => intval($this->id),
            'botola' => intval($this->botola),
            'voice' => $this->voice_over,
            'isStart' => false,
            'stadium' => $this->stadium,
            'timeStart'=>Carbon::parse($this->start)->timezone($this->getTimeZone($this->extra != null ? $this->extra->zone : null))->format('g:i A'),
            'club_one'=>[
                'id'=>intval($this->club_one_id),
                'name'=>$this->club_one->name,
                'logo'=>$this->club_one->avater
            ],
            'club_two'=>[
                'id'=>intval($this->club_two_id),
                'name'=>$this->club_two->name,
                'logo'=>$this->club_two->avater
            ],
            'dawry' => [
                'id' => intval($this->dawry->id),
                'name' => $this->dawry->name,
                'avater' => $this->dawry->avater,
            ],
            'channel' => [
                'id' => intval($this->channel->id),
                'channel_name' => $this->channel->name,
                'channel_url' => json_decode($this->channel->urls),
            ],
        ];
    }
}
