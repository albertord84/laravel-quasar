<div class="table-responsive">
    <table class="table" id="users-table">
        <thead>
            <tr>
                <th>Company Id</th>
        <th>Cost Center Id</th>
        <th>Address Id</th>
        <th>Role Id</th>
        <th>Status Id</th>
        <th>Username</th>
        <th>Email</th>
        <th>Password</th>
        <th>Email Verified At</th>
        <th>Remember Token</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $users)
            <tr>
                <td>{{ $users->company_id }}</td>
            <td>{{ $users->cost_center_id }}</td>
            <td>{{ $users->address_id }}</td>
            <td>{{ $users->role_id }}</td>
            <td>{{ $users->status_id }}</td>
            <td>{{ $users->username }}</td>
            <td>{{ $users->email }}</td>
            <td>{{ $users->password }}</td>
            <td>{{ $users->email_verified_at }}</td>
            <td>{{ $users->remember_token }}</td>
                <td>
                    {!! Form::open(['route' => ['users.destroy', $users->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('users.show', [$users->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('users.edit', [$users->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
