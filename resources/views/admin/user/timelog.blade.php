@extends('layouts.admin')

@section('title', 'ประวัติเข้า-ออกพนักงาน')
{{-- @section('add_url', route('admin.user.create')) --}}

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        @yield('title')
    </h1>
</div>

{{-- เช็คว่ามี session ชื่อ 'success' ส่งมาหรือไม่ --}}
@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Image</th>
            <th scope="col">Logged_at</th>
        </tr>
    </thead>
    <tbody>
        <td>01</td>
        <td>test</td>
        <td>test@gmail.com</td>
        <td>
            <img src="{{ asset('assets/sbadmin/img/profile.png') }}" width="56px">
        </td>
        <td>2026-02-02 08:55:00</td>
    </tbody>
</table>

@endsection