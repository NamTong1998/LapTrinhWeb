<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\Article;
use App\Models\Category;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Admin\NotificationController;

class ArticleController extends Controller
{
    const VIDEO = 'video';
    
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
            'summary' => 'required',
            'content' => 'required',
        ]);

        $article = new Article();
        $article->summary = $request->get('summary');
        $article->content = $request->get('content');
        $article->category_id = $request->get('category');
        $article->is_highlight = $request->get('is_highlight');
        $article->is_qualification = 1;
        $article->user_id = Auth::user()->id;

        //image
        
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
            $article->image= $image;
        }
        else
        {
            $article->image= "";
        }
        //video

         if($request->hasFile('video'))
         {
            $video = Storage::disk('public')->put(self::VIDEO, $request->file('video'));
            $article->video = $video;
         }
         else
        {
            $article->video= "";
        }

  
        $article->save();

        $noti = new NotificationController();
        $noti->saveNoti(Auth::user()->user_name, "created a new article called", $article->summary);

        return redirect()->route('admin_article_list')->with('success', 'A new Article has been created');
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
            'summary' => 'required',
            'content' => 'required'
        ]);
        $article= Article::find($id);
        $article->category_id = $request->get('category');
        $article->summary = $request->get('summary');
        $article->content = $request->get('content');
        $article->is_highlight = $request->get('is_highlight');
        $article->image= $request->image;
        $article->video= $request->video;
          
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
            //unlink("upload/".$article->image);
            $article->image= $image;
        }
        //video
        if($request->hasFile('video'))
         {
            $video = Storage::disk('public')->put(self::VIDEO, $request->file('video'));
            $article->video = $video;
         }
       

      

        $article->save();

        $noti = new NotificationController();
        $noti->saveNoti(Auth::user()->user_name, "edited the article called", $article->summary);

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

    public function changeQualification($id)
    {
        $article = Article::find($id);

        if( $article->is_qualified == 0)
        {
            $article->is_qualified = 1;
        }
        elseif( $article->is_qualified == 1)
        {
            $article->is_qualified = 0;
        }

        $article->save();

        return redirect()->route('reviewer_list');
    }
}
