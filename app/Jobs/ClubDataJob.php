<?php

namespace App\Jobs;

use App\Http\Controllers\Scraping\GetClubController;
use App\Models\Log;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ClubDataJob implements ShouldQueue
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

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $urlScraping = [
            "https://jdwel.com/2022-2023-spanish-primera-division/",
            "https://jdwel.com/2022-2023-england-premier-league/",
            "https://jdwel.com/2022-2023-italian-league-serie-a/",
            "https://jdwel.com/2022-2023-saudi-league/",
            "https://jdwel.com/2022-2023-german-bundesliga/",
            "https://jdwel.com/competition/egyptian-premier-league/",
            "https://jdwel.com/2022-2023-jordanian-pro-league/",
            "https://jdwel.com/2022-2023-french-ligue-1/",
        ];
        (new GetClubController)->getDataClub($urlScraping);
        $day = 24*60*60;
        $this->release($day);
    }
}
