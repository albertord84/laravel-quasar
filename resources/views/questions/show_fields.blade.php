<!-- Type Id Field -->
<div class="form-group">
    {!! Form::label('type_id', 'Type Id:') !!}
    <p>{{ $questions->type_id }}</p>
</div>

<!-- Response Type Id Field -->
<div class="form-group">
    {!! Form::label('response_type_id', 'Response Type Id:') !!}
    <p>{{ $questions->response_type_id }}</p>
</div>

<!-- Question Field -->
<div class="form-group">
    {!! Form::label('question', 'Question:') !!}
    <p>{{ $questions->question }}</p>
</div>

<!-- Json Data Field -->
<div class="form-group">
    {!! Form::label('json_data', 'Json Data:') !!}
    <p>{{ $questions->json_data }}</p>
</div>

