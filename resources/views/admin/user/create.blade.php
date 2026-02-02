@extends('layouts.admin')

@section('title', 'เพิ่มผู้ใช้งานใหม่')

@section('content')

<div class="row">
    <div class="col-lg-6 col-md-8">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">แบบฟอร์มเพิ่มผู้ใช้งาน</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf {{-- สำคัญมาก: ต้องมีเพื่อความปลอดภัย --}}

                    <div class="form-group">
                        <label>ชื่อ-นามสกุล</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
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

                    <hr>
                    <button type="submit" class="btn btn-success">บันทึกข้อมูล</button>
                    <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">ยกเลิก</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection