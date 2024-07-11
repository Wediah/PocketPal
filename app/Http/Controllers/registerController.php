<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use PhpParser\Node\Scalar\String_;

class registerController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:7|max:255'
        ]);

        $user = User::create($attributes);

        auth()->login($user);

        return redirect('/home')->with('success', 'Your account has been created successfully.');
    }

//    public function update(Request $request, string $id)
//    {
//
//        $updateUser = User::findOrFail($id);
//
//        $attributes = request()->validate([
//            'name' => [
//                'string',
//                'sometimes',
//                'email',
//                'max:255',
//                Rule::unique('users')->ignore($updateUser->id),
//                'nullable'
//            ],
//            'profile_image' => 'string|sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable',
//        ]);
//        dd('here');
//
//        $updateData = [
//            'name' => $attributes['name'] ?? $updateUser->name,
//            'email' => $attributes['email'] ?? $updateUser->email,
//        ];
//
//        if ($request->hasFile('profile_image')) {
//            $profile_image = $request->file('profile_image');
//            $filename = uniqid() . '.' . $profile_image->getClientOriginalExtension();
//            $profile_image->storeAs('public/profile_images', $filename);
//            $updateData['profile_image'] = $filename;
//        }
//
//        $updateUser->update($updateData);
//
//        return redirect('/')->with('success', 'Your account has been updated successfully.');
//    }

    public function update(Request $request, string $id)
    {
        $updateUser = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'string|sometimes|max:255|nullable',
            'email' => [
                'string',
                'sometimes',
                'email',
                'max:255',
                Rule::unique('users')->ignore($updateUser->id),
                'nullable'
            ],
            'profile_image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048|nullable',
        ]);

        $updateData = [
            'name' => $validatedData['name'] ?? $updateUser->name,
            'email' => $validatedData['email'] ?? $updateUser->email,
        ];

        if ($request->hasFile('profile_image')) {
            $profile_image = $request->file('profile_image');
            $filename = uniqid() . '.' . $profile_image->getClientOriginalExtension();
            $profile_image->storeAs('profile_images', $filename);
            $updateData['profile_image'] = $filename;
        }

        $updateUser->update($updateData);

        return redirect('/home')->with('success', 'Your account has been updated successfully.');
    }


    public function newPassword()
    {
        return view('password.newPassword');
    }

    public function updatePassword(Request $request, string $id)
    {
        request()->validate([
            'old_password' => 'required',
            'password' => 'required|min:7|max:255'
        ]);

        $user = User::findOrFail($id);

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'The provided password does not match our records.']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        return redirect('/profile')->with('success', 'Your password has been updated successfully.');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/')->with('success', 'Your account has been deleted successfully.');
    }
}
