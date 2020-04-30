<div class="table-responsive">
    <table class="table" id="campaignsStatus-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Decription</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($campaignsStatus as $campaignsStatu)
            <tr>
                <td>{{ $campaignsStatu->name }}</td>
            <td>{{ $campaignsStatu->decription }}</td>
                <td>
                    {!! Form::open(['route' => ['campaignsStatus.destroy', $campaignsStatu->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('campaignsStatus.show', [$campaignsStatu->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('campaignsStatus.edit', [$campaignsStatu->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
