<!-- Question Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('question_id', 'Question Id:') !!}
    {!! Form::number('question_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Response Field -->
<div class="form-group col-sm-6">
    {!! Form::label('response', 'Response:') !!}
    {!! Form::text('response', null, ['class' => 'form-control']) !!}
</div>

<!-- Truth Field -->
<div class="form-group col-sm-6">
    {!! Form::label('truth', 'Truth:') !!}
    {!! Form::number('truth', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('optionsResponses.index') }}" class="btn btn-default">Cancel</a>
</div>
