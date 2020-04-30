<!-- Question Id Field -->
<div class="form-group">
    {!! Form::label('question_id', 'Question Id:') !!}
    <p>{{ $optionsResponses->question_id }}</p>
</div>

<!-- Response Field -->
<div class="form-group">
    {!! Form::label('response', 'Response:') !!}
    <p>{{ $optionsResponses->response }}</p>
</div>

<!-- Truth Field -->
<div class="form-group">
    {!! Form::label('truth', 'Truth:') !!}
    <p>{{ $optionsResponses->truth }}</p>
</div>

