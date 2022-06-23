<?php

namespace App\Http\Controllers\Scraping;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Goutte\Client;
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
        $crawler = $client->request('GET', 'https://www.yalla-shoot.com/m3/index.php');
        // الكود يحتاج تعديلات
        $crawler->filter('.tourListing .toursCntnr .tourItem .item .dtls')->each(function ($node) {
            $node->filter('h2 a')->each(function($node) {
                $data['data'][] = [
                    'name'=>$node->text()
                ];
            });
            $node->filter('a img')->each(function($node) {
                $data['data'][] = [
                    'img'=>$node->attr('src')
                ];
            });
        });
     }
}
