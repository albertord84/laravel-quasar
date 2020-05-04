@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Accounts Banks
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($accountsBanks, ['route' => ['accountsBanks.update', $accountsBanks->id], 'method' => 'patch']) !!}

                        @include('accounts_banks.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection