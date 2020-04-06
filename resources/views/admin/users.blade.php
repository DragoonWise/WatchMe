@extends('adminlte::page')

@section('title', 'WatchMe Admin')

@section('content_header')
<h1>@lang('admin.usersmanagement')</h1>
@stop

@section('content')

<table class="table table-dark">
    <thead>
        <tr>
            <th>Login</th>
            <th>Email</th>
            <th>@lang('admin.subscription')</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{$user->login}}</td>
            <td>{{$user->email}}</td>
            <td>{{ ucfirst($user->subscription_id == NULL ? __('admin.no') : __('admin.yes')) }}</td>
            <td class='row'>
                <a href="{{ url('admin/user/'.$user->id) }}" class='btn btn-primary col-6'>
                    <i class="fas fa-tools"></i> @lang('admin.modify')
                </a>
                @if(Auth::user() != $user)
                <form action="/admin/user/activate" method="POST" class='col-6'>
                    @csrf
                    <input name="user_id" type="hidden" value="{{ $user->id }}">
                    <button type="submit" class="btn btn-primary col-12">
                        @if($user->trashed())
                        <i class="fas fa-trash-restore"></i>@lang('admin.reactivate')
                        @else
                        <i class="fas fa-trash"></i>@lang('admin.delete')
                        @endif
                    </button>
                </form>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $users->links() }}
@endsection
