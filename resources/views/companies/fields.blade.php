<!-- Responsible Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('responsible_id', 'Responsible Id:') !!}
    {!! Form::number('responsible_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address_id', 'Address Id:') !!}
    {!! Form::number('address_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Social Reason Field -->
<div class="form-group col-sm-6">
    {!! Form::label('social_reason', 'Social Reason:') !!}
    {!! Form::text('social_reason', null, ['class' => 'form-control']) !!}
</div>

<!-- Fantasy Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fantasy_name', 'Fantasy Name:') !!}
    {!! Form::text('fantasy_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Cnpj Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cnpj', 'Cnpj:') !!}
    {!! Form::text('cnpj', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', 'Phone:') !!}
    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
</div>

<!-- Phone2 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone2', 'Phone2:') !!}
    {!! Form::text('phone2', null, ['class' => 'form-control']) !!}
</div>

<!-- Decription Field -->
<div class="form-group col-sm-6">
    {!! Form::label('decription', 'Decription:') !!}
    {!! Form::text('decription', null, ['class' => 'form-control']) !!}
</div>

<!-- Observation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('observation', 'Observation:') !!}
    {!! Form::text('observation', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('companies.index') }}" class="btn btn-default">Cancel</a>
</div>
