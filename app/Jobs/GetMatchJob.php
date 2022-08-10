<?php

namespace App\Jobs;

use App\Http\Controllers\Scraping\GetMatchController;
use App\Models\Mobara;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mockery\Expectation;

class GetMatchJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    // public $maxExceptions = 3;
    // public $tries = 3;
    public $backoff = 5;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        
         foreach(Mobara::all() as $match){
            try{
                $match->delete();
            }catch(Expectation $ex){
                continue;
            }
         }
        (new GetMatchController)->getMatch();

        $day = 24*60*60;
        $this->release($day);
    }
}
