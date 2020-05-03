<div class="table-responsive">
    <table class="table" id="questionnaires-table">
        <thead>
            <tr>
                <th>Plane Id</th>
        <th>Criator Id</th>
        <th>Updater Id</th>
        <th>Name</th>
        <th>Description</th>
        <th>Observation</th>
        <th>Released</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($questionnaires as $questionnaires)
            <tr>
                <td>{{ $questionnaires->plane_id }}</td>
            <td>{{ $questionnaires->criator_id }}</td>
            <td>{{ $questionnaires->updater_id }}</td>
            <td>{{ $questionnaires->name }}</td>
            <td>{{ $questionnaires->description }}</td>
            <td>{{ $questionnaires->observation }}</td>
            <td>{{ $questionnaires->released }}</td>
                <td>
                    {!! Form::open(['route' => ['questionnaires.destroy', $questionnaires->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('questionnaires.show', [$questionnaires->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('questionnaires.edit', [$questionnaires->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
