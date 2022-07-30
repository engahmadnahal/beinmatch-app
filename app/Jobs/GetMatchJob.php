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

class GetMatchJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public $maxExceptions = 3;
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $allMatch = Mobara::all();
        foreach($allMatch as $m){
            $m->delete();
        }
        (new GetMatchController)->getMatch();
    }
}
