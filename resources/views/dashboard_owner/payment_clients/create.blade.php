@extends('dashboard_owner.layout.master')

@section('title', __('dashboard.dashboard') . ' | ' .  __('dashboard.add') . ' | ' . __('owner.payment_clients'))

@section('content')

<div class="page-header">
    <div class="page-title">
        <h3>@lang('dashboard.dashboard')</h3>
    </div>

    <nav class="breadcrumb-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('dashboard.owner.welcome') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                    <polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard.owner.payment_clients.index') }}">@lang('owner.payment_clients')</a></li>
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
                    <form action="{{ route('dashboard.owner.payment_clients.store') }}" method="POST" class="section general-info">
                            @csrf
                            @method('post')

                        <div class="info">
                            <div class="row">
                                <div class="col-lg-12 mx-auto">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-8 mt-md-0 mt-4">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label>@lang('owner.number_acount')</label>
                                                            <input type="number" name="number_acount" class="form-control mb-4 @error('number_acount') is-invalid @enderror" placeholder="@lang('owner.number_acount')" value="{{ old('number_acount') }}">
                                                            @error('number_acount')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label>@lang('owner.name_acount')</label>
                                                            <input type="text" name="name_acount" class="form-control mb-4 @error('name_acount') is-invalid @enderror" placeholder="@lang('owner.name_acount')" value="{{ old('name_acount') }}">
                                                            @error('name_acount')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label>@lang('owner.note')</label>
                                                            <input type="text" name="note" class="form-control mb-4 @error('note') is-invalid @enderror" placeholder="@lang('owner.note')" value="{{ old('note') }}">
                                                            @error('note')
                                                                <p class="text-danger">{{ $message }}</p>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label>@lang('owner.payment_admins_id')</label>
                                                            <select name="payment_admins_id" class="selectpicker form-control">
                                                                <option value="">@lang('owner.no_categorey')</option>
                                                                @foreach ($payment_admins as $payment)
                                                                    
                                                                    <option value="{{ $payment->id }}">{{ $payment->name }}</option>

                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>{{-- col-12 --}}

                                                </div>
                                            </div>
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