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
		$articles = Article::all();
		View::share(['categories' => $categories, 'articles' => $articles]);
	}

}
