<div class="table-responsive">
    <table class="table" id="accountsBanks-table">
        <thead>
            <tr>
                <th>User Id</th>
        <th>Bank</th>
        <th>Agency</th>
        <th>Account</th>
        <th>Account Type</th>
        <th>Dig</th>
        <th>Titular Name</th>
        <th>Titular Cpf</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($accountsBanks as $accountsBanks)
            <tr>
                <td>{{ $accountsBanks->user_id }}</td>
            <td>{{ $accountsBanks->bank }}</td>
            <td>{{ $accountsBanks->agency }}</td>
            <td>{{ $accountsBanks->account }}</td>
            <td>{{ $accountsBanks->account_type }}</td>
            <td>{{ $accountsBanks->dig }}</td>
            <td>{{ $accountsBanks->titular_name }}</td>
            <td>{{ $accountsBanks->titular_cpf }}</td>
                <td>
                    {!! Form::open(['route' => ['accountsBanks.destroy', $accountsBanks->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('accountsBanks.show', [$accountsBanks->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('accountsBanks.edit', [$accountsBanks->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
