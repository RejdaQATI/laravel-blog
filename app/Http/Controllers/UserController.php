<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    
        {
            $users = User::all();
            return view('user.index', ['user'=>$users]);
        }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

        public function update(Request $request, $id)
        {
            $request->validate([
                'name' => 'required|max:255',
                'role' => 'required|max:255',
                'email' => 'required|max:255',
            ]);
            $user = User::find($id);
            $user->update($request->all());
            return redirect()->route('users.index')
                ->with('success', 'User updated successfully.');
        }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }



        public function edit($id)
        {
            $user = User::find($id);
            return view('user.edit', [
                "name" => "Edit Post",
                "user" => $user
            ]);
        }

    }

































