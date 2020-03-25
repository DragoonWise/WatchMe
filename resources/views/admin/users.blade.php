@extends('admin.base')
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
                <td>
                    <i class="fas fa-tools"></i> @lang('admin.modify')
                    /
                    {!! $user->deleted_at == NULL ?
                    '<i class="fas fa-trash"></i> '.__('admin.delete')
                    : '<i class="fas fa-trash-restore"></i> '.__('admin.reactivate')
                     !!}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $users->links() }}
@endsection
