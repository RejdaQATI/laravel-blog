<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    

    public function index(Request $request): View
{
    $categories = Category::all(); 
    $categoryIds = $request->categories; 
    $posts = Post::whereHas('categories', function ($query) use ($categoryIds) {
        if (!empty($categoryIds)) { 
            $query->whereIn('categories.id', $categoryIds); 
        }
    })->get();
    return view('allposts', compact('posts', 'categories'));
}




public function store(Request $request)
{

    $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
        'description' => 'required',
        // 'categories' => '',
    ]);

    $user = Auth::user();
    $post = new Post();
    $post->fill($request->all());
    $user->posts()->save($post);
    $categories = $request->categories; 

    $post->categories()->attach($categories);
    

    return redirect()->route('posts.index')->with('success', 'Post created successfully.');
}


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'description' => 'required',
        ]);

        $post = Post::find($id);
        $post->update($request->all());

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function create()
    {
        $categories = Category::all();
        return view('create', [
        'categories'=>$categories,

        ]);
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('edit', compact('post'));
    }



    public function destroy($id)
{
    $post = Post::find($id);
    $post->delete();
    return redirect()->route('posts.index')
        ->with('success', 'Post deleted successfully');
}




}

