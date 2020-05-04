<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $planes->name }}</p>
</div>

<!-- Price Field -->
<div class="form-group">
    {!! Form::label('price', 'Price:') !!}
    <p>{{ $planes->price }}</p>
</div>

<!-- Recompense Field -->
<div class="form-group">
    {!! Form::label('recompense', 'Recompense:') !!}
    <p>{{ $planes->recompense }}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{{ $planes->description }}</p>
</div>

<!-- Has Boolean Selection Field -->
<div class="form-group">
    {!! Form::label('has_boolean_selection', 'Has Boolean Selection:') !!}
    <p>{{ $planes->has_boolean_selection }}</p>
</div>

<!-- Has Unique Selection Field -->
<div class="form-group">
    {!! Form::label('has_unique_selection', 'Has Unique Selection:') !!}
    <p>{{ $planes->has_unique_selection }}</p>
</div>

<!-- Has Multiple Selection Field -->
<div class="form-group">
    {!! Form::label('has_multiple_selection', 'Has Multiple Selection:') !!}
    <p>{{ $planes->has_multiple_selection }}</p>
</div>

<!-- Has Scale Response Field -->
<div class="form-group">
    {!! Form::label('has_scale_response', 'Has Scale Response:') !!}
    <p>{{ $planes->has_scale_response }}</p>
</div>

<!-- Has Discursive Response Field -->
<div class="form-group">
    {!! Form::label('has_discursive_response', 'Has Discursive Response:') !!}
    <p>{{ $planes->has_discursive_response }}</p>
</div>

<!-- Has Image Content Field -->
<div class="form-group">
    {!! Form::label('has_image_content', 'Has Image Content:') !!}
    <p>{{ $planes->has_image_content }}</p>
</div>

<!-- Has Video Content Field -->
<div class="form-group">
    {!! Form::label('has_video_content', 'Has Video Content:') !!}
    <p>{{ $planes->has_video_content }}</p>
</div>

<!-- Has Link Content Field -->
<div class="form-group">
    {!! Form::label('has_link_content', 'Has Link Content:') !!}
    <p>{{ $planes->has_link_content }}</p>
</div>

