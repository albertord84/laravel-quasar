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
        @foreach($usersRoles as $usersRoles)
            <tr>
                <td>{{ $usersRoles->name }}</td>
            <td>{{ $usersRoles->decription }}</td>
                <td>
                    {!! Form::open(['route' => ['usersRoles.destroy', $usersRoles->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('usersRoles.show', [$usersRoles->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('usersRoles.edit', [$usersRoles->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
