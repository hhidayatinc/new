<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Comment;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

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
        $komen=Comment::all();
        return view('article',['article'=>$article, 'komen'=>$komen, 'id'=>$id]);
    }
    // public function getById($id){
    //     $article=Article::find($id);
    //     return view('article',['article'=>$article]);
    // }
    public function about(){
       
        return view('about');
    }
    public function search1(Request $request)
	{
		// menangkap data pencarian
		$search = $request->search;
 
    		// mengambil data dari table article sesuai pencarian data
		$article = DB::table('articles')
		->where('title1','like',"%".$search."%")
		->paginate();
 
    		// mengirim data article ke view home
		return view('home',['article' => $article]);
 
        
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
        return redirect()->action('HomeController@getById',['id'=>$id]);
    }
}
