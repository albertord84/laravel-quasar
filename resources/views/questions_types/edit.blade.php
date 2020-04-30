@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Questions Types
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($questionsTypes, ['route' => ['questionsTypes.update', $questionsTypes->id], 'method' => 'patch']) !!}

                        @include('questions_types.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection