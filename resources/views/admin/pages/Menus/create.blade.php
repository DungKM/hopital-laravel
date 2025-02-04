@extends('admin.layouts.master')
@section('title', 'Create Slider')
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
            <div class="card-title">Tạo Menu</div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.menus.store') }}" method="POST" class="p-4 border rounded shadow-sm bg-light">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Order index(Thứ tự menu):</label>
                    <input type="text" name="order_index" id="order_index" class="form-control">
                    @error('order_index')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" name="name" id="name" class="form-control">
                    @error('name')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="url" class="form-label">Url:</label>
                    <input type="url" name="url" id="url" class="form-control">
                    @error('url')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="parent_id" class="form-label">Parent menu:</label>
                    <select name="parent_id" id="parent_id" class="form-select">
                        <option value="">none</option>
                        @foreach ($menus as $menu)
                            <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection
@section('script')

@endsection
