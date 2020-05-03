<!-- Cep Field -->
<div class="form-group">
    {!! Form::label('cep', 'Cep:') !!}
    <p>{{ $address->cep }}</p>
</div>

<!-- Street Field -->
<div class="form-group">
    {!! Form::label('street', 'Street:') !!}
    <p>{{ $address->street }}</p>
</div>

<!-- Number Field -->
<div class="form-group">
    {!! Form::label('number', 'Number:') !!}
    <p>{{ $address->number }}</p>
</div>

<!-- Complement Field -->
<div class="form-group">
    {!! Form::label('complement', 'Complement:') !!}
    <p>{{ $address->complement }}</p>
</div>

<!-- District Field -->
<div class="form-group">
    {!! Form::label('district', 'District:') !!}
    <p>{{ $address->district }}</p>
</div>

<!-- City Field -->
<div class="form-group">
    {!! Form::label('city', 'City:') !!}
    <p>{{ $address->city }}</p>
</div>

<!-- Uf Field -->
<div class="form-group">
    {!! Form::label('uf', 'Uf:') !!}
    <p>{{ $address->uf }}</p>
</div>

