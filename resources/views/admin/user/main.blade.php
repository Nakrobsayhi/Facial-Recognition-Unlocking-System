@extends('layouts.admin')

@section('title', 'ผู้ใช้งาน')
{{-- @section('add_url', route('admin.user.create')) --}}

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">
        @yield('title')
    </h1>
    <a href="{{ route('admin.user.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
        <i class="fas fa-plus-square fa-sm text-white-50"></i> เพิ่ม
    </a>
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
            <th scope="col">Created_at</th>
            <th scope="col">Updated_at</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($users as $key => $user)

        <tr>
            <th scope="row">
                {{ $key +  1 }}
            </th>
            <td>
                {{ $user->name }}
            </td>
            <td>
                {{ $user->created_at }}
            </td>
            <td>
                {{ $user->updated_at }}
            </td>
            <td class="text-left align-middle">
                <a href="{{ route('admin.user.edit', $user->id) }}"
                    class="btn btn-warning btn-sm mr-2">
                    <i class="far fa-edit"></i>
                </a>

                <!-- user that youre using will be greyed out -->
                @if ($user->id === auth()->id())
                <button class="btn btn-secondary btn-sm" disabled title="ไม่สามารถลบบัญชีของตัวเองได้">
                    <i class="far fa-trash-alt"></i>
                </button>
                @else
                <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('คุณแน่ใจหรือไม่ว่าต้องการลบผู้ใช้นี้?')">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger btn-sm">
                        <i class="far fa-trash-alt"></i>
                    </button>
                </form>
                @endif



            </td>
        </tr>

        @endforeach

    </tbody>
</table>

@endsection