<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Models\Comment;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $comment = Comment::all();
         return view('layouts.admin.comments.list',['comment'=>$comment]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'summary' => 'required|unique:comments',
            'content' =>'required|min:20'
        ]);

        $comment = new Comment();
        $comment->category_id = $request->get('category');
        $comment->summary = $request->get('summary');
        $comment->content = $request->get('content');

        $comment->save();

        return redirect()->route('admin_comment_list')->with('success', 'A new comment has been created.');
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
        $comment = comment::find($id);
        return view('layouts.admin.comments.edit', ['comment' => $comment,'categories' => $categories]);
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
            'summary' => 'required|unique:comments',
            'content' =>'required|min:20'
        ]);
        $comment= comment::find($id);
        $comment->category_id = $request->get('category');
        $comment->summary = $request->get('summary');
        $comment->content = $request->get('content');

        $comment->save();

        return redirect()->route('admin_article_list')->with('success', 'A new comment has been edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $comment = comment::find($id);
        $comment->delete();

        return redirect()->route('admin_article_list')->with('success', 'A comment has been removed.');
    }
}
