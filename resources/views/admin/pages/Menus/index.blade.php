@extends('admin.layouts.master')
@section('title', 'Danh sách menus')
@section('css')
    <style>
        .sub-menu {
            font-style: italic;
            color: gray;
            margin-left: 10px;
        }
    </style>
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">Danh sách Menu</div>
        </div>
        <div class="p-4 border rounded shadow-sm bg-light">
            <a href="{{ route('admin.menus.create') }}" class="btn btn-primary mb-3">Create Menu</a>
            <ul class="list-group">
                @foreach ($menus as $menu)
                    <li class="list-group-item" style="display: block !important; border-width: 1px;">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-bold">{{ $menu->name }}</span>
                            <div>
                                <a href="{{ route('admin.menus.edit', $menu->slug) }}" class="btn btn-info me-2"><i
                                        class="fas fa-pen-square"></i></a>
                                <form action="{{ route('admin.menus.destroy', $menu->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Bạn có muốn xóa??')"><i
                                            class="fas fa-times-circle"></i></button>
                                </form>
                            </div>
                        </div>
                        @if ($menu->children->count())
                            @foreach ($menu->children as $child)
                    <li class="list-group-item" style="display: block !important; margin-left: 30px; border-width: 1px;">
                        <div class="d-flex justify-content-between align-items-center">
                            <span>{{ $child->name }} <span class="sub-menu">sub menu</span></span>
                            <div>
                                <a href="{{ route('admin.menus.edit', $child->id) }}" class="btn btn-info me-2"><i
                                        class="fas fa-pen-square"></i></a>
                                <form action="{{ route('admin.menus.destroy', $child->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Bạn có muốn xóa??')"><i
                                            class="fas fa-times-circle"></i></button>
                                </form>
                            </div>
                        </div>
                    </li>
                @endforeach
                @endif
                </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
