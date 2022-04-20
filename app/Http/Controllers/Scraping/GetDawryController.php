<?php

namespace App\Http\Controllers\Scraping;
use Goutte\Client;

use App\Http\Controllers\Controller;
use App\Models\Dawry;
use Illuminate\Http\Request;

class GetDawryController extends Controller
{

    /*

    This Controller Get data using scraping and insert data on database in table name `dawries`
    --------------------------
    if you wante run this method Go this route
        /get-dawry

    */
    public function getDawry(){
        global $i;
        $data = [];
        $i = 1;
        $index = 0;
        $client = new Client();


            $crawler = $client->request('GET', 'https://www.yallakora.com/leagues-cups');
            $crawler->filter('.tourListing .toursCntnr .tourItem .item .dtls')->each(function ($node) use(&$i ,&$data , &$index) {

                $node->filter('h2 a')->each(function($node) use(&$i ,&$data , &$index){

                    $data['data'][$index] = [
                        'id'=> $i++,
                        "name"=>$node->text()
                    ];

                });

                $node->filter('a img')->each(function($node) use(&$i ,&$data , &$index){

                    $data['data'][$index]['img'] = [

                        "src"=>$node->attr('src')
                    ];

                });

                $index++;

            });

        $this->insertData($data);
        return response()->json($data);
    }

    public function insertData(array $data){
        foreach($data['data'] as $item){
            $dawry = new Dawry();
            $dawry->name = $item['name'];
            $dawry->avater = $item['img']['src'];
            $isSave = $dawry->save();
        }
    }
}
