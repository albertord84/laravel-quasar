<div class="table-responsive">
    <table class="table" id="usersStatus-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Decription</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($usersStatus as $usersStatu)
            <tr>
                <td>{{ $usersStatu->name }}</td>
            <td>{{ $usersStatu->decription }}</td>
                <td>
                    {!! Form::open(['route' => ['usersStatus.destroy', $usersStatu->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('usersStatus.show', [$usersStatu->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('usersStatus.edit', [$usersStatu->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
