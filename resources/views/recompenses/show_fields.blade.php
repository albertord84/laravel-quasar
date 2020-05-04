<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{{ $recompenses->user_id }}</p>
</div>

<!-- Questionnaire Id Field -->
<div class="form-group">
    {!! Form::label('questionnaire_id', 'Questionnaire Id:') !!}
    <p>{{ $recompenses->questionnaire_id }}</p>
</div>

<!-- Campaign Id Field -->
<div class="form-group">
    {!! Form::label('campaign_id', 'Campaign Id:') !!}
    <p>{{ $recompenses->campaign_id }}</p>
</div>

<!-- Value Field -->
<div class="form-group">
    {!! Form::label('value', 'Value:') !!}
    <p>{{ $recompenses->value }}</p>
</div>

