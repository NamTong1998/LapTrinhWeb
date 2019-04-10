<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Session;

class MainController extends HomeController
{
	public function index()
	{
		return view('layouts.home.layout');
	}

	public function getData()
	{
		return view('layouts.home.main');
	}

	public function getNews()
	{
		return view('layouts.home.news');
	}

	public function getNewsDetail($slug)
	{
		return view('layouts.home.news_detail');
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
