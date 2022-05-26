<?php

namespace App\Http\Controllers\Scraping;
use Goutte\Client;

use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Models\Dawry;
use Exception;
use Faker\Extension\Extension;
use Illuminate\Http\Request;

class GetClubController extends Controller
{
    //
        /*

    This Controller Get data using scraping and insert data on database in table name `clubs`
    --------------------------
    if you wante run this method Go this route
        /get-club

    */
    public function getClub(){
        global $i;
        $data = [];
        $i = 1;
        $index = 0;
        $client = new Client();
        $numOfPage = 33;


        for($page = 1 ; $page <= $numOfPage ; $page++){

            $crawler = $client->request('GET', 'https://www.yalla-shoot.com/match/teamlist.php?page='.$page);
            $crawler->filter('.goals .goals-item .panel-default')->each(function ($node) use(&$i ,&$data , &$index) {


                $node->filter('.panel-default .panel-footer h4')->each(function($node) use(&$i ,&$data , &$index){

                    $data['data'][$index] = [
                        'id'=> $i++,
                        "name"=>$node->text()
                    ];

                });

                // End get name

                $node->filter('.panel-default .panel-body .goals-img img')->each(function($node) use(&$i ,&$data , &$index){

                    $data['data'][$index]['img'] = [

                        "src"=>$node->attr('src')
                    ];

                });

                // End get img for clubs

                $node->filter('.panel-default .panel-footer span:last-child')->each(function($node) use(&$i ,&$data , &$index){
                    $data['data'][$index]['country'] = [
                        "city"=>$node->text()
                    ];


                });

                // End get Country for clubs

                $index++;

            });

        }
        $this->insertData($data);
        return response()->json($data);
    }

    public function insertData(array $data){

        /**
         * dawry_id	name	avater	country
         * playing	have_won
         * draw	game_over	on_him	difference	points

         */
        foreach($data['data'] as $item){
            $dawryDataGetId = $this->getDawryID();
            $dawryName = $this->getNameDawry($item['country']['city']);
            $club = new Club();

            try{
                $club->dawry_id = $dawryDataGetId[$dawryName];
                $club->name = $item['name'];
                $club->avater = $item['img']['src'];
                $club->country = $item['country']['city'];
                $isSave = $club->save();
                if(!$isSave){
                    continue;
                }
            }catch(Exception $ex){
                continue;
            }

        }
    }

    public function getDawryID(){
        $dawry = Dawry::all();
        $data = [];
        $index = 0;
        foreach($dawry as $item ){

            $data[$item->name] = $item->id;
            $index++;
        }
        return $data;
    }

    public function getNameDawry($nameCountry){
        switch($nameCountry){
            case "إسبانيا" :
                return "الدوري الإسباني";
                break;

            case "إنجلترا" :
                return "الدوري الإنجليزي";

                break;

            case "إيطاليا" :
                return "الدوري الإيطالي";

                break;

            case "ألمانيا" :
                return "الدوري الألماني";

                break;

            case "فرنسا" :
                return "الدوري الفرنسي";

                break;

            case "مصر" :
                return "الدوري المصري";

                break;

            case "المغرب" :
                return "الدوري المغربي";

                break;

            case "السعودية" :
                return "الدوري السعودي";

                break;

            case "تونس" :
                return "الدوري التونسي";

                break;

            case "الأردن" :
                return "الدوري الأردني";

                break;

            case "الإمارات" :
                return "الدوري الإماراتي";

                break;

            case "الجزائر" :
                return "الدوري الجزائري";

                break;


        }
    }


    // Get Data for club , (point , won , ...)

    /*


            https://jdwel.com/2021-2022-spanish-primera-division/


    */
    public function getDataClub(Request $request){

        $client = new Client();
        $index = 0;
        $data = [];
        $currntData = [
            'name'=>"",
            'playing'=>"",
            'have_won'=>"",
            'draw'=>"",
            'game_over'=>"",
            // 'on_him'=>"",
            'difference'=>"",
            'points'=>"",
        ];
        $crawler = $client->request('GET', $request->get('u'));

        $crawler->filter('tbody tr')->each(function ($node) use(&$data , &$index,&$currntData) {
                $node->filter('.team')->each(function($node) use(&$data , &$index,&$currntData){
                    $currntData['name'] = $node->text();

                });

                $node->filter('.pld')->each(function($node) use(&$data , &$index,&$currntData){
                    $currntData['playing'] = $node->text();

                });
                $node->filter('.won')->each(function($node) use(&$data , &$index,&$currntData){

                    $currntData['have_won'] = $node->text();

                });

                $node->filter('.draw')->each(function($node) use(&$data , &$index,&$currntData){

                    $currntData['draw'] = $node->text();

                });

                $node->filter('.lost')->each(function($node) use(&$data , &$index,&$currntData){

                    $currntData['game_over'] = $node->text();

                });

                // $node->filter('.won')->each(function($node) use(&$data , &$index,&$currntData){

                //     $currntData['have_won'] = $node->text();

                // });

                $node->filter('.diff')->each(function($node) use(&$data , &$index,&$currntData){

                    $currntData['difference'] = $node->text();

                });

                $node->filter('.pts')->each(function($node) use(&$data , &$index,&$currntData){

                    $currntData['points'] = $node->text();

                });


                $data['data'][$index] = $currntData;
                $currntData = [];
                $index++;
            });
            $this->updateDataForClub($data);
            return response()->json($data);

    }


    public function updateDataForClub(array $data){
        //  playing have_won draw game_over on_him difference points
        foreach($data['data'] as $item){
            try{
                $club = Club::where('name',$item['name'])->first();
                if(!is_null($club)){
                $club->playing = $item['playing'];
                $club->have_won = $item['have_won'];
                $club->draw = $item['draw'];
                $club->game_over = $item['game_over'];
                $club->difference = $item['difference'];
                $club->points = $item['points'];
                $club->save();
                }else{
                    continue;
                }

            }catch(Extension $ex){
                continue;
            }
        }
    }

}
