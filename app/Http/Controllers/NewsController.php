<?php

namespace App\Http\Controllers;
use App\Http\NewsClient;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request, NewsClient $client) 
    {
         $country = $request->query('country',
          env('NEWS_DEFAULT_COUNTRY')); 
          $data = $client->topHeadlines($country); 
        return view('news')->with('data', $data); }
}
