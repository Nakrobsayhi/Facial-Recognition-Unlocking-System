@extends('layouts.admin')

@section('title', 'แก้ไขข้อมูลผู้ใช้งาน')
{{-- @section('add_url', route('admin.user.create')) --}}

@section('content')

<div class="row">
    <div class="col-lg-6 col-md-8">
        <!-- smaller box looks better delete top 2 lines to revert-->

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">แบบฟอร์มแก้ไขผู้ใช้งาน</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @csrf {{-- สำคัญมาก: ต้องมีเพื่อความปลอดภัย --}}

                    <div class="form-group">
                        <label>ชื่อ-นามสกุล</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $user->name) }}">
                        @error('name')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- <div class="form-group">
                        <label>อีเมล</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                        @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div> -->

                    <div class="form-group">
                        <label>รหัสผ่าน</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>ยืนยันรหัสผ่าน</label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>

                    <div>
                        <label>รูปหน้า</label><br>
                        <input type="file" name="image" accept="image/*">
                    </div>

                    @if ($user->image)
                    <img src="{{ asset('storage/' . $user->image) }}"
                        width="120"
                        class="mb-2">
                    @endif

                    <hr>
                    <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                    <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">ยกเลิก</a>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- <form action="{{ route('admin.user.update', $user->id) }}" method="post">

        @csrf

        <div class="form-group">
            <label for="exampleInputEmail1">Firstname Lastname</label>
            <input type="text" class="form-control" name="name" value="{{ $user->name }}">
            @error('name')
                <span class="text-danger fw-bolder">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" name="email" aria-describedby="emailHelp" value="{{ $user->email }}">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            @error('email')
                <span class="text-danger fw-bolder">
                    {{ $message }}
                </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            Save
        </button>
    </form> -->

@endsection