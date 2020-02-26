<div class="table-responsive">
    <table class="table" id="usersRoles-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Decription</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($usersRoles as $usersRole)
            <tr>
                <td>{{ $usersRole->name }}</td>
            <td>{{ $usersRole->decription }}</td>
                <td>
                    {!! Form::open(['route' => ['usersRoles.destroy', $usersRole->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('usersRoles.show', [$usersRole->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('usersRoles.edit', [$usersRole->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>