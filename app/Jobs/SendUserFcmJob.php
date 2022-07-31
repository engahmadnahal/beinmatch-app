<?php

namespace App\Jobs;

use App\Models\MobileToken;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendUserFcmJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public  $data;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        //
        $this->data = $data;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Hear is code send notification using FCM Api
            $mobileToken = MobileToken::all('token');
            $arrayToken = [];
            foreach($mobileToken as $token){
                array_push($arrayToken,$token->token);
            }
            $SERVER_API_KEY = env('SERVER_API_KEY');
    
            // $token_1 = 'Test Token';
    
            $data = [
    
                // "registration_ids" => [
                //     $token_1
                // ],
    
                "registration_ids" => $arrayToken,
                "data" => [
                    "v1" => $this->data['title'],
                    "v2" => $this->data['content'],
                ],
    
                // Image Notification is not ready using now
                "notification" => [
    
                    "title" => $this->data['title'],
    
                    "body" => $this->data['content'],
    
                    "sound"=> "default" // required for sound on ios
    
                ],
    
            ];
    
            $dataString = json_encode($data);
    
            $headers = [
    
                'Authorization: key=' . $SERVER_API_KEY,
    
                'Content-Type: application/json',
    
            ];
    
            $ch = curl_init();
    
            curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    
            curl_setopt($ch, CURLOPT_POST, true);
    
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
            curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
    
            $response = curl_exec($ch);
    
        }
}
