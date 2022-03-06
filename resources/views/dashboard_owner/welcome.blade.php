@extends('dashboard_owner.layout.master')

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
    
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-card-four">
            <div class="widget-content">
                <div class="w-header">
                    <div class="w-info">
                        <h6 class="value">@lang('owner.completed_orders')</h6>
                    </div>
                </div>

                <div class="w-content">

                    <div class="w-info">
                        <p class="value">{{ $completed_order }}
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up">
                                <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                <polyline points="17 6 23 6 23 12"></polyline>
                            </svg>
                        </p>
                    </div>
                    
                </div>

                <div class="w-progress-stats">                                            
                    <div class="progress">
                        <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: {{ $completed_order }}%" aria-valuenow="{{ $completed_order }}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>

                    <div class="">
                        <div class="w-icon">
                            <p>{{ $completed_order }}</p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-card-four">
            <div class="widget-content">
                <div class="w-header">
                    <div class="w-info">
                        <h6 class="value">@lang('owner.waiting_order')</h6>
                    </div>
                </div>

                <div class="w-content">

                    <div class="w-info">
                        <p class="value">{{ $waiting_order }}
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up">
                                <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                <polyline points="17 6 23 6 23 12"></polyline>
                            </svg>
                        </p>
                    </div>
                    
                </div>

                <div class="w-progress-stats">                                            
                    <div class="progress">
                        <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: {{ $waiting_order }}%" aria-valuenow="{{ $waiting_order }}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>

                    <div class="">
                        <div class="w-icon">
                            <p>{{ $waiting_order }}</p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div> 

    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
        <div class="widget widget-card-four">
            <div class="widget-content">
                <div class="w-header">
                    <div class="w-info">
                        <h6 class="value">@lang('owner.cancel_order')</h6>
                    </div>
                </div>

                <div class="w-content">

                    <div class="w-info">
                        <p class="value">{{ $cancel_order }}
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up">
                                <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                                <polyline points="17 6 23 6 23 12"></polyline>
                            </svg>
                        </p>
                    </div>
                    
                </div>

                <div class="w-progress-stats">                                            
                    <div class="progress">
                        <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: {{ $cancel_order }}%" aria-valuenow="{{ $cancel_order }}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>

                    <div class="">
                        <div class="w-icon">
                            <p>{{ $cancel_order }}</p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 layout-spacing">
        <div class="widget widget-chart-three">
            <div class="widget-heading">
                <div class="">
                    <h5 class="">@lang('owner.monthly_statistics')</h5>
                </div>

                <div class="dropdown ">
                    <a class="dropdown-toggle" href="#" role="button" id="uniqueVisitors" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="uniqueVisitors">
                        <a class="dropdown-item" href="javascript:void(0);">View</a>
                        <a class="dropdown-item" href="javascript:void(0);">Update</a>
                        <a class="dropdown-item" href="javascript:void(0);">Download</a>
                    </div>
                </div>
            </div>

            <div class="widget-content">
                <div id="uniqueVisits"></div>
            </div>
        </div>
    </div>

</div>
@endsection