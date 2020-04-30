@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Users Roles
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($usersRoles, ['route' => ['usersRoles.update', $usersRoles->id], 'method' => 'patch']) !!}

                        @include('users_roles.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection