@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Campaigns Status
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($campaignsStatus, ['route' => ['campaignsStatuses.update', $campaignsStatus->id], 'method' => 'patch']) !!}

                        @include('campaigns_statuses.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection