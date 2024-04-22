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

class PageController extends Controller
{
    public function legals(): View
    {
        $items = [
            "content"=>"<p>Lorem Ipsum</p>",
            "test2",
        ];
        return view('legals', [
            'title' => 'legals',
            'content' => "<p>Lorem Ipsum</p>",
            'items' => $items
        ]);
    }

    public function about(): View
    {
        return view('about', [
            'title' => '<h1>Title</h1>',
            'content' => "<p> Lorem ipsum dolor sit amet consectetur adipisicing elit. At, voluptatum omnis atque esse fuga voluptates ad officiis voluptate accusamus, similique ipsam quia vitae dicta velit, error maxime nemo cupiditate quod?</p>"
        ]);
    }

    public function welcome(Request $request): View
    {
        $categories = Category::all();
        $categoryIds = $request->categories; 

        $postsQuery = Post::query();
        if (!empty($categoryIds)) {
            $postsQuery->whereHas('categories', function ($query) use ($categoryIds) {
                $query->whereIn('categories.id', $categoryIds); 
            });
        }
        
        $posts = $postsQuery->paginate(8); 
        
        return view('welcome', ['posts' => $posts, 'categories' => $categories]); 
    }
}
