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
                <li class="breadcrumb-item"><a href="{{ route('dashboard.admin.categoreys.index') }}">@lang('admin.categoreys')</a></li>
                <li class="breadcrumb-item active" aria-current="page"><span>@lang('dashboard.edit')</span></li>
            </ol>
        </nav>

    </div>

 <!--  BEGIN CONTENT AREA  -->
                            
<div class="account-settings-container layout-top-spacing">

    <div class="account-content">
        <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                    <form method="post" action="{{ route('dashboard.admin.categoreys.update', $categorey->id) }}" enctype="multipart/form-data" class="section general-info">
                          @csrf
                          @method('put')

                        <div class="info">
                            <div class="row">
                                <div class="col-lg-11 mx-auto">
                                    <div class="row">
                                        <div class="col-xl-2 col-lg-12 col-md-4">
                                            <div class="upload mt-4 pr-md-4">
                                                <input type="file" name="s" id="input-file-max-fs" class="dropify" 
                                                data-default-file="{{ $categorey->logo_path }}" 
                                                data-max-file-size="2M"/>
                                                <p class="mt-2">
                                                    <i class="flaticon-cloud-upload mr-1"></i> 
                                                    @lang('dashboard.upload_picture')
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                            
                                            <div class="row">
                                                
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="fullName">@lang('dashboard.name')</label>
                                                        <input type="text" name="name" class="form-control mb-4" placeholder="@lang('dashboard.name')" value="{{ $categorey->name }}">
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <button class="btn btn-primary col-12">@lang('dashboard.add')</button>
                                                </div>

                                            </div>
                                            
                                        </div>
                                    </div>{{-- row --}}
                                </div>{{-- col mx-auto --}}
                            </div>{{-- row --}}
                        </div>{{-- info --}}
                    </form>
                </div>{{-- layout-spacing --}}
            </div>{{-- row --}}
        </div>{{-- scrollspy-example --}}
    </div>{{-- account-content --}}
</div>{{-- container --}}

<!--  END CONTENT AREA  -->

@endsection