<?php

namespace App\Http\Controllers\Author;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $author = Article::all();
        return view('layouts.author.list', ['author' => $author]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $category = Category::all();
        return view('layouts.author.create', ['category' => $category]);
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

        $author = new Article();
        $author->category_id = $request->get('category');
        $author->summary = $request->get('summary');
        $author->content = $request->get('content');
        $author->user_id = Auth::user()->id;

        if($request->hasFile('image'))
        {
            $path = Storage::disk('public')->put(self::IMG_ART, $request->image);
            $author->image = $path;
        }

        $author->save();

        return redirect()->route('author_list')->with('success', 'A new Article has been created.');

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
        $author = Article::find($id);
        return view('layouts.author.edit', ['author' => $author,'categories' => $categories]);
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

        $author= Article::find($id);;
        $author->category_id = $request->get('category');
        $author->summary = $request->get('summary');
        $author->content = $request->get('content');

        if($request->hasFile('image'))
        {
            $path = Storage::disk('public')->put(self::IMG_ART, $request->image);
            $author->image = $path;
        }

        $author->save();

        return redirect()->route('author_list')->with('success', 'A new Article has been created.');
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

        return redirect()->route('author_list')->with('success', 'A Article has been removed.');
    }
}
