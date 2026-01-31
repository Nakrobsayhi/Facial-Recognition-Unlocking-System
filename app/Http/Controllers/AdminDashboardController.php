<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // ตัวอย่างข้อมูล (ปกติอาจดึงจาก DB / MQTT / API)
        $esp32Status = true;      // true = Online
        $doorStatus  = false;     // true = เปิด
        $alertCount  = 3;

        $users = User::all();

        return view('admin.dashboard', compact(
            'esp32Status',
            'doorStatus',
            'alertCount',
            'users'
        ));
    }
}
