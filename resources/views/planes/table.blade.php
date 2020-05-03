<div class="table-responsive">
    <table class="table" id="planes-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Price</th>
        <th>Recompense</th>
        <th>Description</th>
        <th>Has Boolean Selection</th>
        <th>Has Unique Selection</th>
        <th>Has Multiple Selection</th>
        <th>Has Scale Response</th>
        <th>Has Discursive Response</th>
        <th>Has Image Content</th>
        <th>Has Video Content</th>
        <th>Has Link Content</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($planes as $planes)
            <tr>
                <td>{{ $planes->name }}</td>
            <td>{{ $planes->price }}</td>
            <td>{{ $planes->recompense }}</td>
            <td>{{ $planes->description }}</td>
            <td>{{ $planes->has_boolean_selection }}</td>
            <td>{{ $planes->has_unique_selection }}</td>
            <td>{{ $planes->has_multiple_selection }}</td>
            <td>{{ $planes->has_scale_response }}</td>
            <td>{{ $planes->has_discursive_response }}</td>
            <td>{{ $planes->has_image_content }}</td>
            <td>{{ $planes->has_video_content }}</td>
            <td>{{ $planes->has_link_content }}</td>
                <td>
                    {!! Form::open(['route' => ['planes.destroy', $planes->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('planes.show', [$planes->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('planes.edit', [$planes->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
