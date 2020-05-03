<!-- Status Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('status_id', 'Status Id:') !!}
    {!! Form::number('status_id', null, ['class' => 'form-control']) !!}
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

<!-- Questionary Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('questionary_id', 'Questionary Id:') !!}
    {!! Form::number('questionary_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Base Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('base_id', 'Base Id:') !!}
    {!! Form::number('base_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Objetive Field -->
<div class="form-group col-sm-6">
    {!! Form::label('objetive', 'Objetive:') !!}
    {!! Form::text('objetive', null, ['class' => 'form-control']) !!}
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

<!-- Response Limit Field -->
<div class="form-group col-sm-6">
    {!! Form::label('response_limit', 'Response Limit:') !!}
    {!! Form::number('response_limit', null, ['class' => 'form-control']) !!}
</div>

<!-- Response Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('response_amount', 'Response Amount:') !!}
    {!! Form::number('response_amount', null, ['class' => 'form-control']) !!}
</div>

<!-- Invitations Sent Field -->
<div class="form-group col-sm-6">
    {!! Form::label('invitations_sent', 'Invitations Sent:') !!}
    {!! Form::number('invitations_sent', null, ['class' => 'form-control']) !!}
</div>

<!-- Invitations Accepted Field -->
<div class="form-group col-sm-6">
    {!! Form::label('invitations_accepted', 'Invitations Accepted:') !!}
    {!! Form::number('invitations_accepted', null, ['class' => 'form-control']) !!}
</div>

<!-- Invitations Declined Field -->
<div class="form-group col-sm-6">
    {!! Form::label('invitations_declined', 'Invitations Declined:') !!}
    {!! Form::number('invitations_declined', null, ['class' => 'form-control']) !!}
</div>

<!-- Invitations Send Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('invitations_send_date', 'Invitations Send Date:') !!}
    {!! Form::date('invitations_send_date', null, ['class' => 'form-control','id'=>'invitations_send_date']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#invitations_send_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Requested Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('requested_date', 'Requested Date:') !!}
    {!! Form::date('requested_date', null, ['class' => 'form-control','id'=>'requested_date']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#requested_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Analyzed Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('analyzed_date', 'Analyzed Date:') !!}
    {!! Form::date('analyzed_date', null, ['class' => 'form-control','id'=>'analyzed_date']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#analyzed_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Start Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start_date', 'Start Date:') !!}
    {!! Form::date('start_date', null, ['class' => 'form-control','id'=>'start_date']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#start_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- End Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('end_date', 'End Date:') !!}
    {!! Form::date('end_date', null, ['class' => 'form-control','id'=>'end_date']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#end_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endpush

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('campaigns.index') }}" class="btn btn-default">Cancel</a>
</div>
