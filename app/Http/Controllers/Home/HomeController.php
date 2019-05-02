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
		$articles = Article::all()->shuffle()->take(5);
		$articles_m = Article::all();
		$videos = Video::all()->shuffle()->take(4);

		View::share(['categories' => $categories, 'articles' => $articles, 'articles_m' => $articles_m, 'videos' => $videos]);


	}

}
