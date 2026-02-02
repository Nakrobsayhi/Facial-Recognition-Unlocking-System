<?php

namespace App\Http\Controllers;

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
            'email' => 'required|email|unique:users,email',
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
            'email' => $request->email,
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

    public function update(Request $req, $id)
    {
        $user = User::findOrFail($id);

        $req->validate(
            [
                'name' => 'required|max:255',
                'email' => 'required|max:255',
                'password' => 'nullable|min:8',
            ],
            [
                'name.required' => "กรอกข้อมูลในช่องนี้",
                'name.max' => "ข้อมูลยาวเกินไป",
                'email.required' => "กรอกข้อมูลในช่องนี้",
                'email.max' => "ข้อมูลยาวเกินไป",
                'password.min' => 'รหัสผ่านต้องอย่างน้อย 8 ตัว',
            ]
        );

        $data = [
            'name' => $req->name,
            'email' => $req->email,
        ];

        // update password if filled
        if ($req->filled('password')) {
            $data['password'] = Hash::make($req->password);
        }

        $user->update($data);

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
