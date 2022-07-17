<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\MobileUserNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendUserNotifyJob implements ShouldQueue
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
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $allUsers = User::where('status','active')->get();
        foreach($allUsers as $user){
            // $user->notify(new MobileUserNotification($data));
            $user->notify(new MobileUserNotification($this->data));
        }
    }
}
