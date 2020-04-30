<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Question Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('question_id', 'Question Id:') !!}
    {!! Form::number('question_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Campaign Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('campaign_id', 'Campaign Id:') !!}
    {!! Form::number('campaign_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Response Option Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('response_option_id', 'Response Option Id:') !!}
    {!! Form::number('response_option_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Discursive Text Field -->
<div class="form-group col-sm-6">
    {!! Form::label('discursive_text', 'Discursive Text:') !!}
    {!! Form::text('discursive_text', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('responses.index') }}" class="btn btn-default">Cancel</a>
</div>
