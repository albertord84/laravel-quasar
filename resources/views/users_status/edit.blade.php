@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Users Statu
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($usersStatu, ['route' => ['usersStatus.update', $usersStatu->id], 'method' => 'patch']) !!}

                        @include('users_status.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection