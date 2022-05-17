@extends('dashboard_admin.layout.master')

@section('title', __('dashboard.dashboard') . ' | ' .  __('dashboard.edit') . ' | ' . __('admin.payment_admins'))

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
            <li class="breadcrumb-item"><a href="{{ route('dashboard.admin.payment_admins.index') }}">@lang('admin.payment_admins')</a></li>
            <li class="breadcrumb-item active" aria-current="page"><span>@lang('dashboard.add')</span></li>
        </ol>
    </nav>

</div>

 <!--  BEGIN CONTENT AREA  -->
                            
<div class="account-settings-container layout-top-spacing">

    <div class="account-content">
        <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
            <div class="row">
                
                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                    <form action="{{ route('dashboard.admin.payment_admins.update', $paymentAdmin->id) }}" method="POST" class="section general-info" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="info">
                            <div class="row">
                                <div class="col-lg-12 mx-auto">

                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-8 mt-md-0 mt-4">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-12 col-md-2">
                                                        <div class="upload mt-4 pr-md-4">
                                                            <input type="file" name="image" id="input-file-max-fs" class="dropify" 
                                                            data-default-file="{{ $paymentAdmin->image_path }}" 
                                                            data-max-file-size="2M"/>
                                                            <p class="mt-2">
                                                                <i class="flaticon-cloud-upload mr-1"></i> 
                                                                @lang('dashboard.upload_picture')
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-10">
                                                        <div class="form-group">
                                                            <label>@lang('dashboard.name')</label>
                                                            <input type="text" name="name" class="form-control mb-4 @error('name') is-invalid @enderror" placeholder="@lang('dashboard.name')" value="{{ $paymentAdmin->name }}">
                                                            @error('name')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <button class="btn btn-primary col-12">@lang('dashboard.add')</button>
                                                    </div>

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