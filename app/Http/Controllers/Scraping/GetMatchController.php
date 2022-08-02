<?php

namespace App\Http\Controllers\Scraping;

use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Models\Mobara;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Goutte\Client;
use Illuminate\Support\Facades\Date;
use Mockery\Expectation;

class GetMatchController extends Controller
{
    /**
     *
     *
     * Get Data For Matches today
     * Url Data https://www.yalla-shoot.com/m3/index.php
     *
     */


     public function getMatch(){
        $client = new Client();
        $crawler = $client->request('GET', 'https://www.yalla-shoot.com/match/index.php');
        $index = 0;
        $matches = [];
        $v = [];
        // الكود يحتاج تعديلات

        // Get Data Match
        $crawler->filter('.matsh_live li')->each(function ($node) use($index,&$matches,&$v) {
            $d=$node->filter('table:last-child tr td:nth-child(2) p')->text();
            array_push($v,$d);
            $node->each(function($node) use($index,&$matches,&$v){

                $node->filter('table:first-child tr')->each(function($node) use($index,&$matches,&$v){

                    $time = substr($node->filter('td:nth-child(4) .fc_time')->text(),0,4);
                    if(explode(":",$time)[0] >= 10){
                        $time = substr($node->filter('td:nth-child(4) .fc_time')->text(),0,5);
                    }else{
                        $time = "0".$time;
                    }
                    $today = Date('Y-m-d');
                    $dateTimeStamp = $today." ".$time;
                    $data = [
                        "club_one_id" => Club::where('name',$node->filter('td:nth-child(2)')->text())->value('id'),
                        "club_two_id" => Club::where('name',$node->filter('td:nth-child(6)')->text())->value('id'),
                        "club_one_name" => $node->filter('td:nth-child(2)')->text(),
                        "club_two_name" => $node->filter('td:nth-child(6)')->text(),
                        "start" => $dateTimeStamp,
                        'botola' => 1,
                        'channel_id' => 1,
                        'voice_over' => ""
                    ];
                    array_push($matches,$data);
                    $index++;


                });

            });

        });
        

        for($i = 0;$i<count($matches);$i++){
            $matches[$i]['voice_over'] = $v[$i];
        }
        $this->insertData($matches);
     }


     public function insertData($matches){
        foreach($matches as $match){
            if($match['club_one_id'] != null && $match['club_two_id'] != null){
                try{
                    $mobara = new Mobara();
                    $mobara->club_one_id = $match['club_one_id'];
                    $mobara->club_two_id = $match['club_two_id'];
                    $mobara->employee_id = 1;
                    $mobara->start= $match['start'];
                    $mobara->botola = $match['botola'];
                    $mobara->channel_id = $match['channel_id'];
                    $mobara->voice_over = $match['voice_over'];
                    $mobara->save();
                }catch(Expectation $ex){
                    continue;
                }
            }
        }
     }

}
