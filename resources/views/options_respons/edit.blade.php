@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Options Respons
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($optionsRespons, ['route' => ['optionsRespons.update', $optionsRespons->id], 'method' => 'patch']) !!}

                        @include('options_respons.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection