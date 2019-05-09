<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Article;

class HomeController extends Controller
{
	public function __construct()
	{
		$categories = Category::all();
		$articles = Article::all()->shuffle()->take(5);// sắp xếp các phần tử của mảng 1 cách ngẫu nhiên
		$articles_m = Article::all();


		View::share(['categories' => $categories, 'articles' => $articles, 'articles_m' => $articles_m ]);


	}

}
