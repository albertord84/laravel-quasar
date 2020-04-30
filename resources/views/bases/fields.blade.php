<!-- Origin Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('origin_id', 'Origin Id:') !!}
    {!! Form::number('origin_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Company Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('company_id', 'Company Id:') !!}
    {!! Form::number('company_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Criator Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('criator_id', 'Criator Id:') !!}
    {!! Form::number('criator_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Decription Field -->
<div class="form-group col-sm-6">
    {!! Form::label('decription', 'Decription:') !!}
    {!! Form::text('decription', null, ['class' => 'form-control']) !!}
</div>

<!-- Json Data Field -->
<div class="form-group col-sm-6">
    {!! Form::label('json_data', 'Json Data:') !!}
    {!! Form::text('json_data', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('bases.index') }}" class="btn btn-default">Cancel</a>
</div>
