<!-- Company Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('company_id', 'Company Id:') !!}
    {!! Form::number('company_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Cost Center Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cost_center_id', 'Cost Center Id:') !!}
    {!! Form::number('cost_center_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Address Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address_id', 'Address Id:') !!}
    {!! Form::number('address_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Role Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('role_id', 'Role Id:') !!}
    {!! Form::number('role_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Status Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_id', 'Status Id:') !!}
    {!! Form::number('status_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Username Field -->
<div class="form-group col-sm-6">
    {!! Form::label('username', 'Username:') !!}
    {!! Form::text('username', null, ['class' => 'form-control']) !!}
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<!-- Password Field -->
<div class="form-group col-sm-6">
    {!! Form::label('password', 'Password:') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
</div>

<!-- Email Verified At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email_verified_at', 'Email Verified At:') !!}
    {!! Form::date('email_verified_at', null, ['class' => 'form-control','id'=>'email_verified_at']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#email_verified_at').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Remember Token Field -->
<div class="form-group col-sm-6">
    {!! Form::label('remember_token', 'Remember Token:') !!}
    {!! Form::text('remember_token', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('users.index') }}" class="btn btn-default">Cancel</a>
</div>
