<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate; //this use for authentication not article
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Article;
use App\Comment;
use Illuminate\Support\Facades\Cache;
use PDF;
use Faker\Factory as Faker;

class ArticleController extends Controller
{
    public function __construct()
    //this method for authentication, not article
{
    //$this->middleware('auth');
    $this->middleware(function($request, $next){
        if(Gate::allows('manage-articles')) return $next($request);
        abort(403, 'Anda tidak memiliki cukup hak akses');
        });
       
}
    public function getAll(){
        $article=Cache::rememberForever('article', function(){
            return Article::all();
        });
        return view('article', compact('article'));
    }
 
    // public function insertData(Request $req, $id){
    //     $faker = Faker::create();
    //     $hasil = Article::find($id);
    //     $user = new Comment();
    //     $user->name=$req->nama;
    //     $user->comment=$req->komentar;
    //     $user->id_article = $req->id;
    //     $user->profile=$faker->imageUrl($width=50, $height=50);
    //     $user->save();
    //     return redirect()->action('ArticleController@getById',['id'=>$id]);
    // }
    public function add()
    {
        return view('addarticle');
    }
  
    public function edit($id)
    {
        $article = Article::find($id);
        return view('editarticle',['article'=>$article]);
    }

    public function update($id, Request $req)
    {
        
        $article = Article::find($id);
        $article->title1 = $req->title1;
        $article->content1 = $req->content1;
        $article->featured_image1 = $req->featured_image1;
        $article->save();
        
        return redirect()->route('manage')
                         ->with('success','Article updated successfully');
      ;
    }
//     public function update($id, Request $request)
// {
//  $article = Article::find($id);
//  $article->title = $request->title1;
//  $article->content = $request->content1;
//  $filename = time().'.'.$request->file('featured_image1')->getClientOriginalExtension();
//      $destinationPath = 'storage/uploads/';
//     $upload_success = $request->file('featured_image1')->move($destinationPath, $filename);
 
//  $article->featured_image1 = $$destinationPath.$filename;
//  $article->save();
//     return redirect()->route('manage')
//                           ->with('success','Product updated successfully');
//       ;
// }
  

    public function search2(Request $request)
	{
		// menangkap data pencarian
		$search = $request->search;
 
    		// mengambil data dari table article sesuai pencarian data
		$article = DB::table('articles')
		->where('title1','like',"%".$search."%")
		->paginate();
 
    		// mengirim data article ke view manage
		return view('manage',['article' => $article]);
    }

    public function index()
    {
        $article=DB::table('articles')->paginate(6);
        return view('manage',['article'=>$article]);
        // $article = Article::all();
        // return view('manage',['article' => $article]);
        
    }
    public function create()
    {
        return view('addarticle');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title1' => 'required',
            'content1' => 'required',
            'featured_image1' => 'required|max:7000'
        ]);
  
        // Article::create($request->all());
        $filename = time().'.'.$request->file('featured_image1')->getClientOriginalExtension();
        $destinationPath = 'storage/uploads/';
        $upload_success = $request->file('featured_image1')->move($destinationPath, $filename);
        $add = new Article();
        $add->title1 = $request->title1;
        $add->content1 = $request->content1;
        $add->featured_image1 = $request->featured_image1;
        $add->featured_image1 = $destinationPath.$filename;
        $add->save();
       return redirect()->route('manage') 
                        ->with('success','Article created successfully.');
    }
//     public function store2(Request $request)
//     {
//      if($request->file('image')){
//      $image_name = $request->file('image')->store('uploads','storage');
//     }
//     Article::create([
//     'title1' => $request->title1,
//     'content1' => $request->content1,
//     'featured_image1' => $request->featured_image1,
//  ]);
//  return redirect()->route('manage') 
//  ->with('success','Article created successfully.');
// }

    public function destroy(Article $article)
    {
        $article->delete();
  
        return redirect()->route('manage')
                        ->with('success','Article deleted successfully');
    }

    public function print()
    {
        //this method for make a report
        $article = Article::all();
    	$pdf = PDF::loadview('article_pdf',['article'=>$article]);
    	return $pdf->stream();
    }
}
