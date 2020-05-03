<div class="table-responsive">
    <table class="table" id="extractionsStatus-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Decription</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($extractionsStatus as $extractionsStatu)
            <tr>
                <td>{{ $extractionsStatu->name }}</td>
            <td>{{ $extractionsStatu->decription }}</td>
                <td>
                    {!! Form::open(['route' => ['extractionsStatus.destroy', $extractionsStatu->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('extractionsStatus.show', [$extractionsStatu->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('extractionsStatus.edit', [$extractionsStatu->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
