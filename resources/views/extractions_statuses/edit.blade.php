@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Extractions Status
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($extractionsStatus, ['route' => ['extractionsStatuses.update', $extractionsStatus->id], 'method' => 'patch']) !!}

                        @include('extractions_statuses.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection