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
        $users = User::paginate(10);
        return view('app.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:35',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:4',
            'role' => 'required|in:admin,user',
            'image' => 'required|image|mimes:jpeg,png,jpg,heic|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $imagePath = 'images/user/' . $image->hashName();

            $image->storeAs('public/images/user', $image->hashName());
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
            'image' => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);

        return view('app.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        
        $request->validate([
            'name' => 'required|min:3|max:35',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:4',
            'role' => 'required|in:admin,user',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,heic|max:2048',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->hasFile('image')) {
            if ($user->image) {
                $imagePath = public_path('storage/public/' . $user->image);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }

                $image = $request->file('image');

                $imagePath = 'images/user/' . $image->hashName();

                $image->storeAs('public/images/user', $image->hashName());

                $user->image = $imagePath;
            }
        }

        $user->save();
        return redirect()->route('user.index')->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        if ($user->image) {
            $imagePath = public_path('storage/public/' . $user->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $user->delete();
        return redirect()->back()->with('success', 'Data Berhasil Dihapus');
    }
}
