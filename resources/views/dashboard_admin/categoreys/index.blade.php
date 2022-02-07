
@extends('dashboard_admin.layout.master')

@section('title', __('dashboard.admins'))

@section('content')

    <div class="page-header">
        <div class="page-title">
            <h3>Dashboard</h3>
        </div>

        <nav class="breadcrumb-one" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard.admin.welcome') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"><span>categorys</span></li>
            </ol>
        </nav>

    </div>

    <div class="row" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="table-form">
                    <div class="form-group row">
                        <div class="col-4">
                            <input type="text" class="form-control form-control-sm" name="min" id="min" placeholder="">
                        </div>
                        {{-- <a href="{{ route('dashboard.admin.admins.create') }}" class="btn btn-primary">add</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row" id="cancel-row">
    
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <table class="display table" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categoreys as $index=>$categorey)

                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $categorey->name }}</td>
                                <td><img src="{{ $categorey->logo_path }}" width="100"></td>
                                <td>
                                    <a href="{{ route('dashboard.admin.categoreys.edit', $categorey->id) }}" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-success">
                                            <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection