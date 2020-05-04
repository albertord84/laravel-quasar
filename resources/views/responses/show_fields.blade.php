<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $responses->user_id }}</p>
</div>

<!-- Question Id Field -->
<div class="form-group">
    {!! Form::label('question_id', 'Question Id:') !!}
    <p>{{ $responses->question_id }}</p>
</div>

<!-- Campaign Id Field -->
<div class="form-group">
    {!! Form::label('campaign_id', 'Campaign Id:') !!}
    <p>{{ $responses->campaign_id }}</p>
</div>

<!-- Response Option Id Field -->
<div class="form-group">
    {!! Form::label('response_option_id', 'Response Option Id:') !!}
    <p>{{ $responses->response_option_id }}</p>
</div>

<!-- Discursive Text Field -->
<div class="form-group">
    {!! Form::label('discursive_text', 'Discursive Text:') !!}
    <p>{{ $responses->discursive_text }}</p>
</div>

