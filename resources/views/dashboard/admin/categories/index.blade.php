@extends('dashboard.admin.layouts.app')

@section('content')

    <div>
        <h2>@lang('categoreys.categoreys')</h2>
    </div>

    <ul class="breadcrumb mt-2">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.admin.home') }}">@lang('site.home')</a></li>
        <li class="breadcrumb-item">@lang('categoreys.categoreys')</li>
    </ul>

    <div class="row">

        <div class="col-md-12">

            <div class="tile shadow">

                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" id="data-table-search" class="form-control" autofocus placeholder="@lang('site.search')">
                        </div>
                    </div>

                </div><!-- end of row -->

                <div class="row">

                    <div class="col-md-12">

                        <div class="table-responsive">

                            <table class="table datatable" id="categoreys-table" style="width: 100%;">
                                <thead>
                                <tr>
                                    <th>@lang('site.DT_RowIndex')</th>
                                    <th>@lang('categoreys.name')</th>
                                    <th>@lang('categoreys.logo')</th>
                                    <th>@lang('site.created_at')</th>
                                    <th>@lang('site.action')</th>
                                </tr>
                                </thead>
                            </table>

                        </div><!-- end of table responsive -->

                    </div><!-- end of col -->

                </div><!-- end of row -->

            </div><!-- end of tile -->

        </div><!-- end of col -->

    </div><!-- end of row -->

@endsection

@push('scripts')

    <script>

        let categoreysTable = $('#categoreys-table').DataTable({
            dom: "tiplr",
            scrollY: '500px',
            scrollCollapse: true,
            sScrollX: "100%",
            serverSide: true,
            processing: true,
            "language": {
                "url": "{{ asset('admin_assets/datatable-lang/' . app()->getLocale() . '.json') }}"
            },
            ajax: {
                url: '{{ route('dashboard.admin.categoreys.data') }}',
            },
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'logo', name: 'logo'},
                {data: 'created_at', name: 'created_at', searchable: false},
                {data: 'actions', name: 'actions', searchable: false, sortable: false, width: '20%'},
            ],
            order: [[4, 'desc']],
            drawCallback: function (settings) {
                $('.record__select').prop('checked', false);
                $('#record__select-all').prop('checked', false);
                $('#record-ids').val();
                $('#bulk-delete').attr('disabled', true);
            }
        });

        $('#data-table-search').keyup(function () {
            categoreysTable.search(this.value).draw();
        });
    </script>

@endpush