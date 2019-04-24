<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;
use App\Models\Category;
use App\Models\Article;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;



class MainController extends HomeController
{
	public function index()
	{
		return view('layouts.home.layout');
	}

	public function getData()
	{
		$category = Category::all();
		$article1 = Article::all()->last();
		$article2 = Article::all()->where('is_highlight', '1')->take(3);
		

		return view('layouts.home.main',[ 'category'=>$category,'article1'=>$article1,'article2'=>$article2]);
	}

	public function getNews()
	{
		return view('layouts.home.news');
	}

	public function getNewsDetail($id)
	{
		$article = Article::find($id);
		$comment= Comment::all()->where('article_id', $id);
		
		return view('layouts.home.news_detail', ['article' => $article,'comment'=>$comment]);
	}

	public function getNewsByCategory($slug)
	{
		return view('layouts.home.news_category');
	}

	public function getNewsByTag($tag)
	{
		return view('layouts.home.news_tag'); 
	} 

	public function searchPost(Request $request)
	{
        return view('layouts.home.search'); 
	}
}
