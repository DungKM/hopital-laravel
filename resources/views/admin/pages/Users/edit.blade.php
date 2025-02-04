@extends('admin.layouts.master')
@section('title', 'Edit User-Admin')
@section('css')
    <style>
        .note-icon-caret:before {
            content: "" !important;
        }
    </style>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">Chỉnh sửa thông tin nhân viên</div>
        </div>
        <div class="card-body">
            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="name" class="form-label">Họ và tên:</label><br>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control"><br>
                @error('name')
                    <div style="color: red">
                        {{ $message }}
                    </div>
                @enderror
                <div class="row">
                    <div class="col-md-4">
                        <label for="email" class="form-label">Email:</label><br>
                        <input type="text" name="email" value="{{ old('email') }}" class="form-control"><br>
                        @error('email')
                            <div style="color: red">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="phone" class="form-label">Số điện thoại:</label><br>
                        <input type="text" name="phone" value="{{ old('phone') }}" class="form-control"><br>
                        @error('phone')
                            <div style="color: red">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="gender" class="form-label">Giới tính:</label><br>
                        <select name="" id="" class="form-control">
                            <option value="">Nam</option>
                            <option value="">Nữ</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label for="">Chức vụ: </label>
                        <select name="" id="" class="form-control">
                            <option value="">Bác sĩ</option>
                            <option value="">Y tá</option>
                            <option value="">Admin</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="">Chuyên môn: </label>
                        <select name="" id="" class="form-control">
                            <option value="">Nội soi</option>
                            <option value="">Nha sĩ</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="">Phòng làm việc: </label>
                        <select name="" id="" class="form-control">
                            <option value="">P302</option>
                            <option value="">P303</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <label for="">Số giờ làm việc: </label>
                        <select name="" id="" class="form-control">
                            <option value="">8 tiếng</option>
                            <option value="">9 tiếng</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="">Số năm kinh nghiệm: </label>
                        <input type="text" name="experience_years" value="{{ old('experience_years') }}"
                            class="form-control"><br>
                    </div>
                </div>
                <input type="submit" value="Submit" class="btn btn-primary mt-2">
                <input type="submit" value="Cancel" class="btn btn-danger mt-2">
                <input type="submit" value="Clear" class="btn btn-info mt-2">
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $('#summernote').summernote({
            placeholder: 'Content here...',
            tabsize: 2,
            height: 100
        });
    </script>
@endsection
