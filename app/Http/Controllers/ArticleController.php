<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Article;
use Illuminate\Support\Facades\Cache;

class ArticleController extends Controller
{
    // public function index($id){
    //     //$article=Article::find($id);
    //     return view ('article', compact('id'));
    // }
    public function getAll(){
        $article=Cache::rememberForever('article', function(){
            return Article::all();
        });
        return view('article', compact('article'));
    }
    public function getById($id){
        $article=Article::find($id);
        return view('article',['article'=>$article]);
    }
    
    
}
