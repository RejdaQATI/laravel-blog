<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;


{
    class AdminController extends Controller
{
    public function admin(): View
    {
        $user = Auth::user();

        if ($user->isAdmin()) {
            return view('dashboard', ['user' => $user]);
        } elseif ($user->isClient()) {
            return view('dashboard', ['user' => $user]);
        } else {
            abort(403, 'Unauthorized');
        }
    }
}
}
