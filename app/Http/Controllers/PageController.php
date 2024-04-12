<?php
namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Post;

class PageController extends Controller
{



    public function legals(): View
    {
        $items = array (
            "test",
            "test2",
        );
        return view('legals', [
            'title' => 'legals',
            'content' => "<p>Lorem Ipsum</p>",
            'items'=>$items
        ]);
    }

    public function about(): View
    {
        return view('about', [
            'title' => '<h1>Title</h1>',
            'content' => "<p>Mathis le guerrier</p>"
        ]);
    }



    public function welcome()
    {
        $posts = Post::latest()->paginate(5); 
        return view('welcome', ['posts' => $posts]); 
    }    
}

