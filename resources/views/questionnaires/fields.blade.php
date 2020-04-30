<!-- Plane Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('plane_id', 'Plane Id:') !!}
    {!! Form::number('plane_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Criator Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('criator_id', 'Criator Id:') !!}
    {!! Form::number('criator_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Updater Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updater_id', 'Updater Id:') !!}
    {!! Form::number('updater_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Observation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('observation', 'Observation:') !!}
    {!! Form::text('observation', null, ['class' => 'form-control']) !!}
</div>

<!-- Released Field -->
<div class="form-group col-sm-6">
    {!! Form::label('released', 'Released:') !!}
    {!! Form::number('released', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('questionnaires.index') }}" class="btn btn-default">Cancel</a>
</div>
