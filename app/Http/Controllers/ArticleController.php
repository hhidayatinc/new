<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
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
    
    // public function index()
    // {
    //     $article = Article::all();
    //     return view('manage',['article' => $article]);
    // }
    public function add()
    {
        return view('addarticle');
    }

    // public function create(Request $request)
    // {
    //     $add = new Article();
    //     $add->title1 = $request->title;
    //     $add->content1 = $request->content;
    //     $add->featured_image1 = $request->image;
    //     $add->save();
    //     return redirect('/manage')
    //     ;
    // }
  
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
                         ->with('success','Product updated successfully');
      ;
    }
    // public function delete($id)
    // {
    //     $article = Article::find($id);
    //     $article->delete();
    //     return redirect('/manage')
    //     ;
    // }

    public function search1(Request $request)
	{
		// menangkap data pencarian
		$search = $request->search;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$article = DB::table('articles')
		->where('title1','like',"%".$search."%")
		->paginate();
 
    		// mengirim data pegawai ke view index
		return view('home',['article' => $article]);
 
    }
    public function search2(Request $request)
	{
		// menangkap data pencarian
		$search = $request->search;
 
    		// mengambil data dari table pegawai sesuai pencarian data
		$article = DB::table('articles')
		->where('title1','like',"%".$search."%")
		->paginate();
 
    		// mengirim data pegawai ke view index
		return view('manage',['article' => $article]);
 
    }
    public function index()
    {
        $article = Article::all();
        return view('manage',['article' => $article]);
        
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
    public function destroy(Article $article)
    {
        $article->delete();
  
        return redirect()->route('manage')
                        ->with('success','Article deleted successfully');
    }

    public function print()
    {
        $article = Article::all();
    	$pdf = PDF::loadview('article_pdf',['article'=>$article]);
    	return $pdf->stream();
    }
}
