@if ($crud->hasAccess('update'))

@php
    $user = App\User::where('id', $entry->getKey())->first();
@endphp

<a href="{{ url($crud->route.'/'.$entry->getKey().'/moderate') }}" class="btn btn-xs @if ($user->status == 'Active') btn-success @else btn-danger @endif"><i class="fa fa-ban"></i> @if ($user->status == 'Active') Active @else Inactive @endif </a>
@endif