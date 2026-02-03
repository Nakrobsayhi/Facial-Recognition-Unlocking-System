<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserController extends Controller
{

    public function index()
    {

        $users = User::all();

        return view(
            'admin.user.main',
            [
                'users' => $users,
            ]
        );
    }

    public function create()
    {
        $users = User::all();

        return view('admin.user.create', ['users' => $users,]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'required|min:8|confirmed',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // for image saving
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('users', 'public');
        } else {
            $path = null;
        }

        User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'image' => $path,
        ]);

        return redirect()
            ->route('admin.user.index')
            ->with('success', 'เพิ่มผู้ใช้งานสำเร็จ');
    }
    public function edit($id)
    {

        if (!empty($id)) {

            $user = User::find($id);

            if (!empty($user->id)) {

                return view(
                    'admin.user.edit',
                    [
                        'user' => $user,
                    ]
                );
            } else {
                return redirect()->route('admin.index');
            }
        } else {
            return redirect()->route('admin.index');
        }
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|min:8|confirmed',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // keep old image by default
        $path = $user->image;

        // if new image uploaded
        if ($request->hasFile('image')) {

            // delete old image
            if ($user->image && Storage::disk('public')->exists($user->image)) {
                Storage::disk('public')->delete($user->image);
            }

            // save new image
            $path = $request->file('image')->store('users', 'public');
        }

        // update data
        $user->name = $request->name;
        $user->image = $path;

        // update password only if filled
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()
            ->route('admin.user.index')
            ->with('success', 'แก้ไขข้อมูลสำเร็จ');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()
            ->route('admin.user.index')
            ->with('success', 'ลบข้อมูลสำเร็จ');
    }

    public function timelog()
    {
        return view('admin.user.timelog');
    }
}
