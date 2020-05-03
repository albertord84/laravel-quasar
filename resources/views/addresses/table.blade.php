<div class="table-responsive">
    <table class="table" id="addresses-table">
        <thead>
            <tr>
                <th>Cep</th>
        <th>Street</th>
        <th>Number</th>
        <th>Complement</th>
        <th>District</th>
        <th>City</th>
        <th>Uf</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($addresses as $address)
            <tr>
                <td>{{ $address->cep }}</td>
            <td>{{ $address->street }}</td>
            <td>{{ $address->number }}</td>
            <td>{{ $address->complement }}</td>
            <td>{{ $address->district }}</td>
            <td>{{ $address->city }}</td>
            <td>{{ $address->uf }}</td>
                <td>
                    {!! Form::open(['route' => ['addresses.destroy', $address->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('addresses.show', [$address->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('addresses.edit', [$address->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
