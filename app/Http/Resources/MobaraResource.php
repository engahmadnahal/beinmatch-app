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
        /**
         * Check User Auth isLike Or Not, This Filter get data user in collaction like
        */
        $isLikeUser = $this->like->filter( function ($like) {
                return $like->user_id == auth()->user()->id;
            })->first();

        /**
         * Check User Auth poll in the match, This Filter get data user in collaction poll
         *  *
        */
        // [0] For All Poll equal false , [1] Poll For [club_one] , [2] Poll For [draw] , [3] Poll For [club_two]

        $userDataPoll = $this->poll->filter(function($user){
            return $user->user_id == auth()->user()->id;
        })->first();
        $statusPoll = 0;
        if(!is_null($userDataPoll)){
            if($userDataPoll->club_one){
                $statusPoll = 1;
            }elseif($userDataPoll->darw){
                $statusPoll = 2;
            }elseif($userDataPoll->club_two){
                $statusPoll = 3;
            }else{
                $statusPoll = 0;
            }
        }


        return [
            'id' => $this->id,
            'botola' => $this->botola,
            'timeStart'=>$this->start,
            'likes'=>$this->like->where('is_like',1)->count(),
            'dislikes'=>$this->like->where('is_like',0)->count(),
            'poll_to_club_one' => $this->poll->where('club_one',1)->count(),
            'poll_to_darw' => $this->poll->where('darw',1)->count(),
            'poll_to_club_two' => $this->poll->where('club_two',1)->count(),
            'user_like_check'=> !is_null($isLikeUser) ? intval($isLikeUser->is_like) : 2 ,
            'poll_user_check'=>$statusPoll ,
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

            'comments'=>[
                'count'=>$this->commentForUserToMatch->count(),
                'data'=>$this->commentForUserToMatch,
            ],
        ];
    }
}
