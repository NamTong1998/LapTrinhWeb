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

	public function search(Request $request)
	{
		$search = $request->get('search');//lấy giá trị người dùng gõ vào
		$count = 0;//kết quả tìm được

		$articles = Article::all();
		
		$results = array();
		

		foreach( $articles as $item )
		{
			//kiểm tra xem $child có nằm trong $father hay không		
			if( strpos( strtolower($item->summary), strtolower($search) ) > -1 ) //return the first position of $search in $item->summary
			{
				$results[] = $item;//chèn ngay giá trị vừa kiểm tra vào cuối $results ($results[] nghĩa là phần tử cuối)
				$count++;
			}
		}

		

		return view('layouts.home.search', ['search' => $search, 'count' => $count, 'results' => $results, ]);
	}
}
