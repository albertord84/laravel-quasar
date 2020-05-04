<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Recompense Field -->
<div class="form-group col-sm-6">
    {!! Form::label('recompense', 'Recompense:') !!}
    {!! Form::number('recompense', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Has Boolean Selection Field -->
<div class="form-group col-sm-6">
    {!! Form::label('has_boolean_selection', 'Has Boolean Selection:') !!}
    {!! Form::number('has_boolean_selection', null, ['class' => 'form-control']) !!}
</div>

<!-- Has Unique Selection Field -->
<div class="form-group col-sm-6">
    {!! Form::label('has_unique_selection', 'Has Unique Selection:') !!}
    {!! Form::number('has_unique_selection', null, ['class' => 'form-control']) !!}
</div>

<!-- Has Multiple Selection Field -->
<div class="form-group col-sm-6">
    {!! Form::label('has_multiple_selection', 'Has Multiple Selection:') !!}
    {!! Form::number('has_multiple_selection', null, ['class' => 'form-control']) !!}
</div>

<!-- Has Scale Response Field -->
<div class="form-group col-sm-6">
    {!! Form::label('has_scale_response', 'Has Scale Response:') !!}
    {!! Form::number('has_scale_response', null, ['class' => 'form-control']) !!}
</div>

<!-- Has Discursive Response Field -->
<div class="form-group col-sm-6">
    {!! Form::label('has_discursive_response', 'Has Discursive Response:') !!}
    {!! Form::number('has_discursive_response', null, ['class' => 'form-control']) !!}
</div>

<!-- Has Image Content Field -->
<div class="form-group col-sm-6">
    {!! Form::label('has_image_content', 'Has Image Content:') !!}
    {!! Form::number('has_image_content', null, ['class' => 'form-control']) !!}
</div>

<!-- Has Video Content Field -->
<div class="form-group col-sm-6">
    {!! Form::label('has_video_content', 'Has Video Content:') !!}
    {!! Form::number('has_video_content', null, ['class' => 'form-control']) !!}
</div>

<!-- Has Link Content Field -->
<div class="form-group col-sm-6">
    {!! Form::label('has_link_content', 'Has Link Content:') !!}
    {!! Form::number('has_link_content', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('planes.index') }}" class="btn btn-default">Cancel</a>
</div>
