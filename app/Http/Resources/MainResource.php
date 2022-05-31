<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MainResource extends JsonResource
{

    public $data;
    public $response;
    public $message;
    // Create main format to Api
    public function __construct($data , $response = 401 ,$message = null)
    {
        $this->data = $data;
        $this->response = $response;
        $this->message = $message;


    }

    public function toArray($request)
    {
       if($this->response == 200){
            return [
                'status'=>true,
                'message'=>$this->message,
                'data'=>$this->data
            ];
        }else{
            return [
                'status'=>false,
                'message'=>$this->message,
            ];
        }
    }
}
