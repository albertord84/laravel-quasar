<!-- Status Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_id', 'Status Id:') !!}
    {!! Form::number('status_id', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Requested Value Field -->
<div class="form-group col-sm-6">
    {!! Form::label('requested_value', 'Requested Value:') !!}
    {!! Form::number('requested_value', null, ['class' => 'form-control']) !!}
</div>

<!-- Payed Value Field -->
<div class="form-group col-sm-6">
    {!! Form::label('payed_value', 'Payed Value:') !!}
    {!! Form::number('payed_value', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('extractions.index') }}" class="btn btn-default">Cancel</a>
</div>
