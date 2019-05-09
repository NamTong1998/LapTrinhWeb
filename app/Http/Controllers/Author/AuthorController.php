<?php

namespace App\Http\Controllers\Author;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Models\Category;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Admin\NotificationController;

class AuthorController extends Controller
{
      const VIDEO = 'video';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $author= Article::all();
        
        return view('layouts.author.list',['author' =>$author]);
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
            'summary' => 'required',
            'content' =>'required'
        ]);

        $author = new Article();
        $author->category_id = $request->get('category');
        $author->summary = $request->get('summary');
        $author->content = $request->get('content');
        $author->user_id = Auth::user()->id;
        $author->is_highlight= 0;

        if($request->hasFile('image'))
        {
            $file= $request->file('image');
            $duoi=$file->getClientOriginalExtension();
            if( $duoi !='jpg'&& $duoi !='png'&& $duoi !='jpeg')
            {
                redirect()->route('admin_article_create')->with('thongbao','Bạn chỉ được thêm ảnh .jpg ,png,jpeg');
            }
            $name= $file->getClientOriginalName();//lấy tên ảnh
            $image=str_random(4)."_".$name;// gán random tên ảnh
            // khÔng trùng tên ảnh
            while(file_exists("upload/".$image))
            {
                $image=str_random(4)."_".$name;

            }


            $file->move('upload',$image);
            $author->image= $image;
        }
        else
        {
            $author->image= "";
        }
        if($request->hasFile('video'))
         {
            $video = Storage::disk('public')->put(self::VIDEO, $request->file('video'));
            $author->video = $video;
         }
         else
        {
            $author->video= "";
        }


        $author->save();

        $noti = new NotificationController();
        $noti->saveNoti(Auth::user()->user_name, "created a new article called", $author->summary);

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
            'summary' => 'required',
            'content' =>'required'
        ]);

        $author= Article::find($id);;
        $author->category_id = $request->get('category');
        $author->summary = $request->get('summary');
        $author->content = $request->get('content');
        $author->video = $request->get('video');
        $author->user_id = Auth::user()->id;

        if($request->hasFile('image'))
        {
            $path = Storage::disk('public')->put(self::IMG_ART, $request->image);
            $author->image = $path;
        }
         if($request->hasFile('video'))
         {
            $video = Storage::disk('public')->put(self::VIDEO, $request->file('video'));
            $author->video = $video;
         }

        $author->save();

        $noti = new NotificationController();
        $noti->saveNoti(Auth::user()->user_name, "edited the article called", $author->summary);

        return redirect()->route('author_list')->with('success', 'A new Article has been changed.');
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
