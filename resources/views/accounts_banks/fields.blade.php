<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Bank Field -->
<div class="form-group col-sm-6">
    {!! Form::label('bank', 'Bank:') !!}
    {!! Form::text('bank', null, ['class' => 'form-control']) !!}
</div>

<!-- Agency Field -->
<div class="form-group col-sm-6">
    {!! Form::label('agency', 'Agency:') !!}
    {!! Form::text('agency', null, ['class' => 'form-control']) !!}
</div>

<!-- Account Field -->
<div class="form-group col-sm-6">
    {!! Form::label('account', 'Account:') !!}
    {!! Form::text('account', null, ['class' => 'form-control']) !!}
</div>

<!-- Account Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('account_type', 'Account Type:') !!}
    {!! Form::text('account_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Dig Field -->
<div class="form-group col-sm-6">
    {!! Form::label('dig', 'Dig:') !!}
    {!! Form::text('dig', null, ['class' => 'form-control']) !!}
</div>

<!-- Titular Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('titular_name', 'Titular Name:') !!}
    {!! Form::text('titular_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Titular Cpf Field -->
<div class="form-group col-sm-6">
    {!! Form::label('titular_cpf', 'Titular Cpf:') !!}
    {!! Form::text('titular_cpf', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('accountsBanks.index') }}" class="btn btn-default">Cancel</a>
</div>
