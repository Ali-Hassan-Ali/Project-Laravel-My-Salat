@extends('dashboard_admin.layout.master')

@section('title', __('dashboard.orders'))

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
                <li class="breadcrumb-item"><a href="{{ route('dashboard.admin.orders.index') }}">@lang('orders.orders')</a></li>
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
                    <form method="post" action="{{ route('dashboard.admin.orders.update', $order->id) }}" enctype="multipart/form-data" class="section general-info">
                          @csrf
                          @method('put')

                        <div class="info">
                            <div class="row">
                                <div class="col-lg-12 mx-auto">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 mt-md-0 mt-4">
                                            
                                            <div class="row">

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label>@lang('orders.order_statuses')</label>
                                                        <select name="order_statuses_id" class="selectpicker form-control">
                                                            <option selected disabled>@lang('dashboard.choose') @lang('orders.order_statuses')</option>
                                                            @foreach ($orderStatus as $status)
                                                                
                                                                <option value="{{ $status->id }}" {{ $status->id == old('', $order->order_statuses_id) ? 'selected' : ' ' }}>@lang('orders.'. $status->id)</option>

                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>{{-- col-12 --}}

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