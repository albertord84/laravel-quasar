<!-- Cep Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cep', 'Cep:') !!}
    {!! Form::text('cep', null, ['class' => 'form-control']) !!}
</div>

<!-- Street Field -->
<div class="form-group col-sm-6">
    {!! Form::label('street', 'Street:') !!}
    {!! Form::text('street', null, ['class' => 'form-control']) !!}
</div>

<!-- Number Field -->
<div class="form-group col-sm-6">
    {!! Form::label('number', 'Number:') !!}
    {!! Form::text('number', null, ['class' => 'form-control']) !!}
</div>

<!-- Complement Field -->
<div class="form-group col-sm-6">
    {!! Form::label('complement', 'Complement:') !!}
    {!! Form::text('complement', null, ['class' => 'form-control']) !!}
</div>

<!-- District Field -->
<div class="form-group col-sm-6">
    {!! Form::label('district', 'District:') !!}
    {!! Form::text('district', null, ['class' => 'form-control']) !!}
</div>

<!-- City Field -->
<div class="form-group col-sm-6">
    {!! Form::label('city', 'City:') !!}
    {!! Form::text('city', null, ['class' => 'form-control']) !!}
</div>

<!-- Uf Field -->
<div class="form-group col-sm-6">
    {!! Form::label('uf', 'Uf:') !!}
    {!! Form::text('uf', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('addresses.index') }}" class="btn btn-default">Cancel</a>
</div>
