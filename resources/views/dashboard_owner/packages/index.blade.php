@extends('dashboard_owner.layout.master')

@section('title', __('dashboard.dashboard') . ' | ' .  __('dashboard.list') . ' | ' . __('owner.packages'))

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
                <li class="breadcrumb-item active" aria-current="page"><span>@lang('owner.packages')</span></li>
            </ol>
        </nav>{{-- breadcrumb --}}
    </div>{{-- page-header --}}

    <div class="row" id="cancel-row">
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="table-form">
                    <div class="form-group row">
                        <div class="col-8 col-md-4">
                            <input type="text" class="form-control form-control-sm" name="min" id="min" placeholder="@lang('dashboard.search')">
                        </div>
                        <a href="{{ route('dashboard.owner.packages.create') }}" class="btn btn-primary">@lang('dashboard.add')</a>                        
                    </div>
                </div>{{-- table-form --}}
            </div>{{-- widget-content --}}
        </div>{{-- col col-xl-12 --}}
    </div>{{-- row --}}

    <div class="row" id="cancel-row">
    
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="table-responsive">
                    <table class="display table" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>@lang('dashboard.name')</th>
                                <th>@lang('owner.form')</th>
                                <th>@lang('owner.to')</th>
                                <th>@lang('dashboard.created_at')</th>
                                <th class="no-content">@lang('dashboard.action')</th>
                            </tr>
                        </thead>
                        <tbody>
                        	@foreach ($packages as $index=>$package)

    	                        <tr>
    	                            <td>{{ $index+1 }}</td>
    	                            <td>{{ $package->name }}</td>
                                    <td>{{ $package->form }}</td>
                                    <td>{{ $package->to }}</td>
    	                            <td>{{ $package->created_at->toFormattedDateString() }}</td>
    	                            <td>
                                        <a href="{{ route('dashboard.owner.packages.edit',$package->id) }}" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-success">
                                                <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                            </svg>
                                        </a>
                                        <form method="post" action="{{ route('dashboard.owner.packages.destroy', $package->id) }}" style="display: inline-block;">
                                            @csrf
                                            @method('delete')
                                            
                                            <button type="submit" class="delete">
                                                <svg type="submit" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-danger">
                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                    <line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line>
                                                </svg>
                                            </button>
                                        </form><!-- end of form -->
                                    </td>
    	                        </tr>
                        		
                        	@endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>{{-- row --}}

@endsection