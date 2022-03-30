
@extends('dashboard_admin.layout.master')

@section('title', __('dashboard.admins'))

@section('content')

    <div class="page-header">
        <div class="page-title">
            <h3>@lang('dashboard.dashboard')</h3>
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
                <li class="breadcrumb-item active" aria-current="page"><span>@lang('admin.supports')</span></li>
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
                @if ($supports->count() > 0)
                <table class="display table" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('dashboard.title')</th>
                            <th>@lang('dashboard.message')</th>
                            <th>@lang('dashboard.phone')</th>
                            <th>@lang('dashboard.owners')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($supports as $index=>$suport)

                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $suport->title }}</td>
                                <td>{{ $suport->message }}</td>
                                <td>{{ $suport->phone }}</td>
                                <td>{{ $suport->user }}</td>
                            </tr>
                            
                        @endforeach
                    </tbody>
                </table>
                @else
                <h3>@lang('dashboard.no_data_found')</h3>
                @endif
            </div>
        </div>

    </div>

@endsection