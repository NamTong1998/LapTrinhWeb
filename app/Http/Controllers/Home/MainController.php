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
use App\Models\Video;
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

	public function getNewsDetail($id)
	{
		$article = Article::find($id);
		$comment= Comment::all()->where('article_id', $id);
		
		return view('layouts.home.news_detail', ['article' => $article,'comment'=>$comment]);
	}

	public function getNewsByCategory($id)
	{
		$category1 = Category::find($id);
		$articles1 = Article::all()->where('category_id', $category1->id);

		return view('layouts.home.news_byCategory', ['articles1' => $articles1, 'category1' => $category1]);
	}

	public function showVideo($id)
	{
		$video = Video::find($id);
		return view('layouts.home.showVideo', ['video' => $video]);
	}

	public function videoList()
	{
		$videos = Video::all();
		return view('layouts.home.videos', ['videos' => $videos]);
	}

	public function search(Request $request)
	{
		$search = $request->get('search');
		$count = 0;

		$articles = Article::all();
		$results = array();
		foreach( $articles as $item )
		{
			if( strpos( strtolower($item->summary), strtolower($search) ) > -1 ) //return the first position of $search in $item->summary
			{
				$results[] = $item;
				$count++;
			}
		}

		return view('layouts.home.search', ['search' => $search, 'count' => $count, 'results' => $results]);
	}
}
