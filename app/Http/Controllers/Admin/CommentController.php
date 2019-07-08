<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Models\Comment;
use App\Http\Controllers\Admin\NotificationController;
use Illuminate\Support\Facades\Auth;


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
            'content' =>'required'
        ]);

        $comment = new Comment();
     
        
        $comment->content = $request->get('content');
        $comment->article_id = $request->get('article_id');
        $comment->user_id = $request->get('user_id');
        //$comment->user_id = Auth::user()->id;
        $comment->save();

        $noti = new NotificationController();
        $noti->saveNoti(Auth::user()->user_name, "added a comment on", $comment->article->summary);

        //return redirect()->route('home_newsDetail',["id" => $comment->article_id]);
        return redirect()->back();
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
            'content' => 'required'
        ]);

        $comment = Comment::find($id);
        $comment->content = $request->get('content');
        $comment->article_id = $request->get('article_id');
        $comment->user_id = $request->get('user_id');
        $comment->save();

        //return redirect()->route('home_newsDetail', ["id" => $comment->article_id]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        return redirect()->route('admin_comment_list')->with('success', 'A comment has been removed.');
    }

    public function deleteByUser($id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        return redirect()->route('home_newsDetail', ["id" => $comment->article_id]);
    }
}
