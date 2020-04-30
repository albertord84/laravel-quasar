@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Users Bases
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($usersBases, ['route' => ['usersBases.update', $usersBases->id], 'method' => 'patch']) !!}

                        @include('users_bases.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection