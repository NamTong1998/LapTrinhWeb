<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;


class ArticleController extends Controller
{
    const IMG_ART = "article_image";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        
        $article = Article::all();
         return view('layouts.admin.articles.list',['article'=>$article]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
         return view('layouts.admin.articles.create', ['categories' => $categories]);
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
            'summary' => 'required|unique:articles',
            'content' =>'required|min:20'
        ]);

        $article = new Article();
        $article->category_id = $request->get('category');
        $article->summary = $request->get('summary');
        $article->content = $request->get('content');

        if($request->hasFile('image'))
        {
            $path = Storage::disk('public')->put(self::IMG_ART, $request->image);
            $article->image = $path;
        }

        $article->save();

        return redirect()->route('admin_article_list')->with('success', 'A new Article has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $article = Article::find($id);
        return view('layouts.admin.articles.edit', ['article' => $article,'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $request->validate([
            'summary' => 'required|unique:articles',
            'content' =>'required|min:20'
        ]);
        $article= Article::find($id);
        $article->category_id = $request->get('category');
        $article->summary = $request->get('summary');
        $article->content = $request->get('content');

        $article->save();

        return redirect()->route('admin_article_list')->with('success', 'A new Article has been edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();

        return redirect()->route('admin_article_list')->with('success', 'A Article has been removed.');
    }
}
