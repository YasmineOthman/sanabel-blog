<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $categories = Category::all();
        return view('category.index', ['category' => $category]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // TODO: return category create view
        return view('category.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // TODO: validate the request
        // TODO: make new category using create method
        // TODO: return reidrect to categories index
            $request->validate([
            'name'             => 'required|min:4|max:255',
            'icon'             => 'required|url',
        ]);
        $category = new Category();
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->icon = $request->icon;
        $category->save();
        // return redirect("/categories/{$category->id}");
        return redirect()->route('categories.index', $category);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('category.show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        // TODO: return edit view with $category var
        //  $categories = Category::all();

        //  $categories = Category::findOrFail($id);

        return view('category.edit',  ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Category $category, Request $request)
    {
        // TODO: validate the request
        $request->validate([
            'name'    => 'required|min:4|max:255',
            'icon'    => 'required|url',
        ]);
        // TODO: update the category using update method
        // $category = Category::findOrFail($id);
        // TODO: return reidrect to categories index
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->icon = $request->icon;
        $category->save();
        return redirect("/categories/{$category->id}");


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        // TODO: look for this
    }
}
