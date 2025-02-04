@extends('admin.layouts.master')
@section('title', 'Create Specialties')
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
            <div class="card-title">Tạo chuyên môn bác sĩ</div>
        </div>
        <div class="card-body">
            <form action="#" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="name" class="form-label">Name:</label><br>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control"><br>
                @error('name')
                    <div style="color: red">
                        {{ $message }}
                    </div>
                @enderror
                <label for="description" class="form-label">Description:</label><br>
                <textarea name="description" class="form-control" id="summernote" cols="30" rows="10">{{ old('description') }}</textarea>
                @error('description')
                    <div style="color: red">
                        {{ $message }}
                    </div>
                @enderror
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
