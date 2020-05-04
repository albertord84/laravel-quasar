@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Extractions Statu
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($extractionsStatu, ['route' => ['extractionsStatus.update', $extractionsStatu->id], 'method' => 'patch']) !!}

                        @include('extractions_status.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection