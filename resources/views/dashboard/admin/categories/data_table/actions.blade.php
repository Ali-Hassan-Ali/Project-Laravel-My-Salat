@if (auth()->user()->hasPermission('categories_update'))
    <a href="{{ route('dashboard.admin.categoreys.edit', $id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> @lang('site.edit')</a>
@endif

{{-- @if (auth()->user()->hasPermission('admins_delete'))
    <form action="{{ route('dashboard.admin.admins.destroy', $id) }}" class="my-1 my-xl-0" method="post" style="display: inline-block;">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i> @lang('site.delete')</button>
    </form>
@endif --}}