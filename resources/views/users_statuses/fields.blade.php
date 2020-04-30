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

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('usersStatuses.index') }}" class="btn btn-default">Cancel</a>
</div>
