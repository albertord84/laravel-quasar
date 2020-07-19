@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Invitations Status
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($invitationsStatus, ['route' => ['invitationsStatuses.update', $invitationsStatus->id], 'method' => 'patch']) !!}

                        @include('invitations_statuses.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection