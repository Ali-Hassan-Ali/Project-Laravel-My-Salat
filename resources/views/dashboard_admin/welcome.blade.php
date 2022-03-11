@extends('dashboard_admin.layout.master')

@section('title', __('dashboard.dashboard') . ' | ' . __('dashboard.statistics'))

@section('content')

    <div class="page-header">
        <div class="page-title">
            <h3>@lang('owner.dashboard')</h3>
        </div>

        <nav class="breadcrumb-one" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="javascript:void(0);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        <polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"><span>@lang('dashboard.statistics')</span></li>
            </ol>
        </nav>

    </div>

    <div class="row layout-top-spacing">
        
        @foreach ($min_categorys as $category)
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
        <a href="{{ route('dashboard.admin.categoreys.index') }}">
            <div class="widget widget-card-four">
                <div class="widget-content">
                    <div class="w-header">
                        <div class="w-info">
                            <h6 class="value">
                                {{ $category->name }}
                            </h6>
                        </div>
                    </div>

                    <div class="w-content">

                        <div class="w-info">
                            <p class="value">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up">
                                    <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                    <polyline points="17 6 23 6 23 12"></polyline>
                                </svg>
                            </p>
                        </div>
                        
                    </div>
                    @php
                        $count = App\Models\Banner::where('categoreys_id', $category->id)->count();
                    @endphp
                    <div class="w-progress-stats">                                            
                        <div class="progress">
                            <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: {{ $count }}%" aria-valuenow="{{ $count }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="">
                            <div class="w-icon">{{ $count }}</div>
                        </div>                        
                    </div>
                </div>
            </div>
        </a>
        </div>
        @endforeach

    </div>

@endsection