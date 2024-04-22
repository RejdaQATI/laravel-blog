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
use App\Models\User;

class PostController extends Controller
{
    
    public function index(Request $request): View
    {
        if (Auth::user()->isAdmin()) {
            $posts = Post::paginate(6);
        } else {
            $user = User::find(Auth::id());
            $posts = $user->posts()->paginate(6);
        }
    
        return view('allposts', compact('posts'));
    }
    
    


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'description' => 'required',
        
        ]);

        $user = Auth::user();
        $post = new Post();
        $post->fill($request->all());
    
    
        $user->posts()->save($post);
        $categories = $request->categories; 
        $post->categories()->attach($categories);
        $this->StoreImage($post);
        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }
    


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'description' => 'required',
            'categories' => 'required',
        ]);
        $categories = Category::all(); 

        $post = Post::find($id);
        $post->update($request->all());
        $this->storeImage($post);

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
        $categories = Category::all();
        return view('edit', [
            'categories'=>$categories,
            'post'=>$post,
    
            ]);
    }
    public function show(Post $post)
    {
        return view('show', compact('post'));
    }
    


    public function destroy($id)
{
    $post = Post::find($id);
    $post->delete();
    return redirect()->route('posts.index')
        ->with('success', 'Post deleted successfully');
}


private function storeImage(Post $post)
{
    if (request()->hasFile('image')) {
        $imagePath = request('image')->store('images', 'public');
        $post->image = $imagePath;
        $post->save();
    }
}
 
}



