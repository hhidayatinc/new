<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Article;
use App\Comment;
use Illuminate\Support\Facades\Cache;
use Faker\Factory as Faker;

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
        $komen=Comment::all();
        return view('article',['article'=>$article, 'komen'=>$komen, 'id'=>$id]);
    }
    public function insertData(Request $req, $id){
        $faker = Faker::create();
        $hasil = Article::find($id);
        $user = new Comment();
        $user->name=$req->nama;
        $user->comment=$req->komentar;
        $user->id_article = $req->id;
        $user->profile=$faker->imageUrl($width=50, $height=50);
        $user->save();
        return redirect()->action('ArticleController@getById',['id'=>$id]);
    }
    
    
}
