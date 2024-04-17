<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Post;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories', compact('categories'));

    }

    public function create()
    {
        return view('categoriescreate');
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            
        ]);

        Category::create($request->all());
        
        return redirect()->route('categories.index')->with('success','Category created successfully');
    }

    // public function show(Category $category)
    // {
    //     return view('categories.show', compact('category'));
    // }


    

    public function edit($id)
    {
        $category = Category::find($id);
        return view('categoriesedit', [
            "title" => "Edit Post",
            "category" => $category
        ]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);
        $category = Category::find($id);
        $category->update($request->all());
        return redirect()->route('categories.index')
            ->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('categories.index')
            ->with('success', 'Category deleted successfully');
    }
}



