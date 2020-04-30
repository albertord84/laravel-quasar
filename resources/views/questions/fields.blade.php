<!-- Type Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('type_id', 'Type Id:') !!}
    {!! Form::number('type_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Response Type Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('response_type_id', 'Response Type Id:') !!}
    {!! Form::number('response_type_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Question Field -->
<div class="form-group col-sm-6">
    {!! Form::label('question', 'Question:') !!}
    {!! Form::text('question', null, ['class' => 'form-control']) !!}
</div>

<!-- Json Data Field -->
<div class="form-group col-sm-6">
    {!! Form::label('json_data', 'Json Data:') !!}
    {!! Form::text('json_data', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('questions.index') }}" class="btn btn-default">Cancel</a>
</div>
