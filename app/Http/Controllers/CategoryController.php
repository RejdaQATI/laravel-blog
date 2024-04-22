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
    $validatedData = $request->validate([
        'title' => 'required|string',
        'description' => 'nullable|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
    ]);

    $category = new Category();

    $category->fill($validatedData);
    if ($request->hasFile('image')) {
        $imageName = $request->file('image')->getClientOriginalName();
        $imagePath = request('image')->storeAs('', $imageName, 'public');
        $category->image = $imagePath;
        $category->save();
    }
    
    return redirect()->route('categories.index')->with('success', 'Category created successfully.');
}

    
    
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
    
        if ($request->hasFile('image')) {
            // Get the file name
            $imageName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            // Move the uploaded file to the public/images directory
            $request->file('image')->move(public_path('images'), $imageName);
            // Update the category's image path
            $category->image = 'images/' . $imageName;
        }
    
        $category->save();
    
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
    private function storeImage(Category $category, Request $request)
    {
        if ($request->hasFile('image')) {
     
                $imagePath = request('image')->store('images', 'public');
                $category->image = $imagePath;
                $category->save();
            }
        }
    }
    
    
        
    



    
