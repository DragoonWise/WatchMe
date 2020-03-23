@extends('admin.base')
@section('content')

<table class="table table-dark">
    <thead>
        <tr>
            <th>Login</th>
            <th>Email</th>
            <th>Abonné</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{$user->login}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->subscription_id == NULL ? 'NON':'OUI'}}</td>
                <td>Modifier / {{$user->deleted_at == NULL ? 'Supprimer':'Réactiver'}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $users->links() }}
@endsection
