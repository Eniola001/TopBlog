<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\Rules\Password;

class RegisterUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        //validate user information
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::min(6)],
            'image' => ['required', File::types(['png', 'jpg', 'webp'])]
        ]);
        // create path for the image
        //
        // $path = $request->image->store('user_images');
        // Storage::disk('public')->put($filePath, $fileContent);
        // $dir = $image->store($path);

        //
        // $file = $request->file('image');
        // $directoryPath = 'images/user_images';
        // if (!Storage::exists($directoryPath)) {
        //     Storage::makeDirectory($directoryPath);
        // }
        // $filePath = $file->store($directoryPath, 'public');
        // $imagePath = Storage::url($filePath);
        // create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => 'https://www.shutterstock.com/image-vector/blank-avatar-photo-icon-design-600nw-1682415103.jpg'
        ]);
        // authenticates the user and logs them into the application
        Auth::login($user);
        // redirects back to the homepage
        return redirect('/blog')->with('success', 'Sign Up successful!');
    }
}
