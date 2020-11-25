<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getByAll()
    {
        $article=DB::table('articles')->paginate(6);
        return view('home',['article'=>$article]);
    }
    public function getById($id){
        $article=Article::find($id);
        return view('article',['article'=>$article]);
    }
    public function about(){
       
        return view('about');
    }
}
