@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Planes
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($planes, ['route' => ['planes.update', $planes->id], 'method' => 'patch']) !!}

                        @include('planes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection