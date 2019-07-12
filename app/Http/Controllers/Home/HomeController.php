<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Article;
use App\Models\Video;

class HomeController extends Controller
{
	public function __construct()
	{
		$categories = Category::all();
		$articles = Article::all()->where('is_qualified', '1')->shuffle()->take(5);// sắp xếp các phần tử của mảng 1 cách ngẫu nhiên
		$articles_m = Article::all()->where('is_qualified', '1');
		$videos = Video::all()->shuffle()->take(4);

		View::share(['categories' => $categories, 'articles' => $articles, 'articles_m' => $articles_m, 'videos' => $videos]);


	}

}
