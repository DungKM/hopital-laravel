@extends('admin.layouts.master')
@section('title', 'Danh sách người dùng')
@section('css')

@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-title">Danh sách người dùng</div>
        </div>
        <div class="card-body">
            <form action="" method="post" class="row">
                @csrf
                <div class="input-group col-4" style="width: 30%">
                    <input type="text" class="form-control" placeholder="Search" aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="button" id="button-addon2">Search</button>
                </div>
                <div class="col-4">
                    <label for="">Chuyên môn</label>
                    <select name="" id="" class="form-select">
                        <option value="">All</option>
                        <option value=""></option>
                    </select>
                </div>
                <div class="col-4">
                    <label for="">Phòng làm việc</label>
                    <select name="" id="" class="form-select">
                        <option value="">All</option>
                        <option value=""></option>
                    </select>
                </div>
            </form>
            <table id="example" class="table table-bordered mt-3" style="width:100%">
                <thead>
                    <tr>
                        <th>Mã nhân viên</th>
                        <th class="text-center">Avatar</th>
                        <th>Họ và tên</th>
                        <th>Chuyên môn</th>
                        <th>Phòng làm việc</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <body>
                    <tr>
                        <td>BS-1345</td>
                        <td class="text-center">
                            <div class="avatar avatar-online">
                                <img src="{{ asset('admin/assets/img/jm_denis.jpg') }}" alt="..."
                                    class="avatar-img rounded-circle">
                            </div>
                        </td>
                        <td>Hoàng Anh Dũng</td>
                        <td>Bác sĩ tâm lý, Bác sĩ nội soi</td>
                        <td>P302</td>
                        <td class="">
                            <a href="" class="btn btn-info">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd"
                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                </svg>
                            </a>
                            <a href="" class="btn btn-secondary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-eye" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                    <path
                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                                </svg>
                            </a>
                        </td>

                    </tr>
                    {{-- @foreach ($specialties as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->description }}</td>
                    <td class="d-flex gap-2">
                        <form action="{{ route('users.destroy', $item->id) }}" id="delete-form-{{ $item->id }}"
                            method="post">
                            @csrf
                            @method('delete')
                            <button type="button" data-id="{{ $item->id }}" class="btn btn-danger delete-button"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-archive-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1M.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8z" />
                                </svg></button>
                        </form>
                        <a href="{{ route('users.edit', $item->id) }}" class="btn btn-info">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path
                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd"
                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                            </svg>
                        </a>
                        <a href="{{ route('users.show', $item->id) }}" class="btn btn-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-eye" viewBox="0 0 16 16">
                                <path
                                    d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                <path
                                    d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                            </svg>
                        </a>
                    </td>

                </tr>
            @endforeach --}}
                </body>
            </table>
        </div>
    </div>
@endsection
@section('script')

@endsection
