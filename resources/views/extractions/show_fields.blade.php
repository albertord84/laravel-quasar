<!-- Status Id Field -->
<div class="form-group">
    {!! Form::label('status_id', 'Status Id:') !!}
    <p>{{ $extractions->status_id }}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $extractions->user_id }}</p>
</div>

<!-- Requested Value Field -->
<div class="form-group">
    {!! Form::label('requested_value', 'Requested Value:') !!}
    <p>{{ $extractions->requested_value }}</p>
</div>

<!-- Payed Value Field -->
<div class="form-group">
    {!! Form::label('payed_value', 'Payed Value:') !!}
    <p>{{ $extractions->payed_value }}</p>
</div>

