@extends('admin.layouts.master')
@section('title', 'Trang cá nhân')
@section('css')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@endsection
@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-full">
                    @include('admin.partial.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('admin.partial.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('admin.partial.delete-user-form')
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection
