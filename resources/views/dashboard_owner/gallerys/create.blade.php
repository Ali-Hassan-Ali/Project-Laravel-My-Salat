@extends('dashboard_owner.layout.master')

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
            <li class="breadcrumb-item"><a href="{{ route('dashboard.owner.gallerys.index') }}">@lang('owner.the_banners')</a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.owner.gallerys.index') }}">@lang('owner.interior')</a></li>
            <li class="breadcrumb-item active" aria-current="page"><span>@lang('dashboard.create')</span></li>
        </ol>
    </nav>

</div>

 <!--  BEGIN CONTENT AREA  -->
                            
<div class="account-settings-container layout-top-spacing">

    <div class="account-content">
        <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
            <div class="row">

                @include('partials._errors')
                
                <div class="col-xl-12 layout-spacing">
                    <form action="{{ route('dashboard.owner.gallerys.store') }}" method="POST" enctype="multipart/form-data" class="section general-info">
                        @csrf
                        @method('post')

                        <div class="info py-5">
                            <h6>create new interior</h6>
                            <div class="row">
                                <div class="col-12 mx-auto">
                                    <div class="row">
                                       
                                        <div class="col-12 mt-4">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label>@lang('dashboard.title')</label>
                                                            <input type="text" name="title" class="form-control mb-4" placeholder="enter title">
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="custom-file-container" data-upload-id="mySecondImage">
                                                                <label>@lang('dashboard.image')</label>
                                                                <br>
                                                                <label> @lang('owner.Upload_multe_image') <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                                                <label class="custom-file-container__custom-file" >
                                                                    <input type="file" name="images[]" class="custom-file-container__custom-file__custom-file-input" multiple>
                                                                    <span class="custom-file-container__custom-file__custom-file-control"></span>
                                                                </label>
                                                                <div class="custom-file-container__image-preview"></div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>{{-- form --}}
                                            <button class="btn btn-primary col-12">@lang('dashboard.add')</button>
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