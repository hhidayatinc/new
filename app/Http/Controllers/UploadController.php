<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use PDF;
use Illuminate\Http\Request;


class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::all();
        return view('manage',['article' => $article]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addarticle');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
                        ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article=Article::find($id);
        $komen=Comment::all();
        return view('article',['article'=>$article, 'komen'=>$komen, 'id'=>$id]);
    }

    public function komen(Request $req, $id){
        $faker = Faker::create();
        $hasil = Article::find($id);
        $user = new Comment();
        $user->name=$req->nama;
        $user->comment=$req->komentar;
        $user->id_article = $req->id;
        $user->profile=$faker->imageUrl($width=50, $height=50);
        $user->save();
        return redirect()->action('UploadController@show',['id'=>$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        
        return view('editarticle',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Article $article,Request $request)
    {
        $this->validate($request, [
            'title1' => 'required',
            'content1' => 'required',
            'featured_image1' => 'required|max:7000'
        ]);
  
    
        $article->update([
            'title1'=>$request->title1,
            'content1'=>$request->content1,
            'featured_image1'=>$request->featured_image1,
        ]);
        // $filename = time().'.'.$request->file('featured_image1')->getClientOriginalExtension();
        // $destinationPath = 'storage/uploads/';
        // $upload_success = $request->file('featured_image1')->move($destinationPath, $filename);
        // $article = Article::find($article);
        // $article->title1 = $request->title1;
        // $article->content1 = $request->content1;
        // $article->featured_image1 = $request->featured_image1;
        // $article->featured_image1 = $destinationPath.$filename;
        // $article->save();
        return redirect()->route('manage')
                        ->with('success','Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
  
        return redirect()->route('manage')
                        ->with('success','Product deleted successfully');
    }

    public function print()
    {
        $article = Article::all();
    	$pdf = PDF::loadview('article_pdf',['article'=>$article]);
    	return $pdf->stream();
    }
}
