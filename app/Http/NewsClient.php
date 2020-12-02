<?php 
namespace App\Http; 
use GuzzleHttp\Client; 
class NewsClient 
{
    private $client; 
    public function __construct() 
    {
         $this->client = new Client([ 
             'base_uri' => 'http://newsapi.org/v2/' 
             ]); 
    } 
    public function topHeadlines($country) 
    { 
        $res = $this->client->request('GET', 'top-headlines', 
        [ 'query' => [ 
            'country' => $country, 
            'apiKey' => env('NEWS_API_KEY') 
            ] 
        ]); 
        return json_decode($res->getBody()->getContents()); 
    }
}