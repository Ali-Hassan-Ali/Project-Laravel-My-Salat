@extends('dashboard_owner.layout.master')

@section('title', __('dashboard.banners'))

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
                <li class="breadcrumb-item active" aria-current="page"><span>@lang('owner.exterior')</span></li>
            </ol>
        </nav>

    </div>

    <div class="row" id="cancel-row">
    
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <form action="{{ route('dashboard.owner.banners.update', auth('owner')->user()->banner->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    
                    <div class="form-group mb-4">
                        <label class="text-success">@lang('dashboard.name')</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                               placeholder="name" 
                               value="{{ auth('owner')->user()->banner->name }}">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="text-success">@lang('dashboard.cost')</label>
                        <input type="number" name="cost" class="form-control @error('cost') is-invalid @enderror" 
                               placeholder="name" 
                               value="{{ auth('owner')->user()->banner->cost }}">
                        @error('cost')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label class="text-success">@lang('dashboard.description')</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror" placeholder="description" >{{ auth('owner')->user()->banner->description }}</textarea>
                        @error('description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="form-group mb-4">
                        <label class="text-success">@lang('owner.map')</label>
                        <input type="text" name="map" class="form-control @error('map') is-invalid @enderror" 
                               placeholder="map" 
                               value="{{ auth('owner')->user()->banner->map }}">
                        @error('map')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="custom-file-container" data-upload-id="myFirstImage">
                        <label>@lang('dashboard.image')</label>
                        <label class="custom-file-container__custom-file">
                            <input type="file" class="custom-file-container__custom-file__custom-file-input" name="image" 
                                   oninput="bannerImage.src=window.URL.createObjectURL(this.files[0])" accept="image/*">
                            <span class="custom-file-container__custom-file__custom-file-control"></span>
                        </label>
                        <img id="bannerImage" src="{{ auth('owner')->user()->banner->image_path }}" class="mt-5 my-auth">
                        {{-- <div class="custom-file-container__image-preview"
                         style="background-image: url({{ auth('owner')->user()->banner->image_path }})"></div> --}}
                    </div>

                    <div class="form-group my-5">
                        <button class="btn btn-primary col-12">@lang('dashboard.update')</button>
                    </div>

                </form>
            </div>
        </div>

    </div>

@endsection