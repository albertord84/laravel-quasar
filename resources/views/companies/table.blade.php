<div class="table-responsive">
    <table class="table" id="companies-table">
        <thead>
            <tr>
                <th>Responsible Id</th>
        <th>Address Id</th>
        <th>Social Reason</th>
        <th>Fantasy Name</th>
        <th>Cnpj</th>
        <th>Phone</th>
        <th>Phone2</th>
        <th>Decription</th>
        <th>Observation</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($companies as $companies)
            <tr>
                <td>{{ $companies->responsible_id }}</td>
            <td>{{ $companies->address_id }}</td>
            <td>{{ $companies->social_reason }}</td>
            <td>{{ $companies->fantasy_name }}</td>
            <td>{{ $companies->cnpj }}</td>
            <td>{{ $companies->phone }}</td>
            <td>{{ $companies->phone2 }}</td>
            <td>{{ $companies->decription }}</td>
            <td>{{ $companies->observation }}</td>
                <td>
                    {!! Form::open(['route' => ['companies.destroy', $companies->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('companies.show', [$companies->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('companies.edit', [$companies->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
