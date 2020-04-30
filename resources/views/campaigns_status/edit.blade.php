@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Campaigns Statu
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($campaignsStatu, ['route' => ['campaignsStatus.update', $campaignsStatu->id], 'method' => 'patch']) !!}

                        @include('campaigns_status.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection