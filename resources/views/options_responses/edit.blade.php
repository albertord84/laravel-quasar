@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Options Responses
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($optionsResponses, ['route' => ['optionsResponses.update', $optionsResponses->id], 'method' => 'patch']) !!}

                        @include('options_responses.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection