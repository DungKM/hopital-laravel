@extends('admin.layouts.master')
@section('title', 'Create Room')
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
            <div class="card-title">Tạo phòng bệnh</div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.rooms.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <label for="room_number" class="form-label">Mã phòng:</label><br>
                <input type="text" name="room_number" value="{{ old('room_number') }}" class="form-control mb-2">
                @error('room_number')
                    <div style="color: red">
                        {{ $message }}
                    </div>
                @enderror
                <label for="bed_count" class="form-label">Số giường:</label><br>
                <input type="text" name="bed_count" value="{{ old('bed_count') }}" class="form-control mb-2">
                @error('bed_count')
                    <div style="color: red">
                        {{ $message }}
                    </div>
                @enderror
                <label for="room_type" class="form-label">Loại phòng:</label><br>
                <select name="room_type" id="" class="form-control mb-2">
                    <option value="General">General</option>
                    <option value="Private">Private</option>
                    <option value="ICU">ICU</option>
                </select>
                @error('room_type')
                    <div style="color: red">
                        {{ $message }}
                    </div>
                @enderror
                <label for="room_status" class="form-label">Trạng thái phòng:</label><br>
                <select name="room_status" id="" class="form-control mb-2">
                    <option value="Available">Available</option>
                    <option value="Occupied">Occupied</option>
                    <option value="Maintenance">Maintenance</option>
                </select>
                @error('room_status')
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
@endsection
