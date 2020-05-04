@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Recompenses
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($recompenses, ['route' => ['recompenses.update', $recompenses->id], 'method' => 'patch']) !!}

                        @include('recompenses.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection