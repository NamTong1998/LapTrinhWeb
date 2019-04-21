<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Models\ArticleCategory;

class ArticleCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $acs = ArticleCategory::all();
        return view('layouts.admin.article_categories.list', ['acs' => $acs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('layouts.admin.article_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|unique:article_categories',
        ]);

        $ac = new ArticleCategory();
        $ac->name = $request->get('name');

        $ac->save();

        return redirect()->route('admin_category_list')->with('success', 'A new Category has been created.');
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
        //
        $ac = ArticleCategory::find($id);
        return view('layouts.admin.article_categories.edit', ['ac' => $ac]);
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
        //
        $request->validate([
            'name' => 'required|unique:article_categories' .$id,
        ]);

        $ac = new ArticleCategory();
        $ac->name = $request->get('name');

        $ac->save();

        return redirect()->route('admin_category_list')->with('success', 'A new Category has been created.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $ac = ArticleCategory::find($id);
        $ac->delete();

        return redirect()->route('admin_category_list')->with('success', 'A Category has been removed.');
    }
}
