@extends('layouts.app')


@section('content')
<section class="content pt-2">

@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif


<div class="container-fluid">
    <div class="card">
    <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left pl-4 pt-4">
            <h2>Create New Ownership</h2>
        </div>
        <div class="pull-right pt-4 pr-4">
            <a class="btn btn-primary" href="{{ route('vehicle-ownership.index') }}"> Back</a>
        </div>
    </div>
</div>
        <div class="card-body">
-{!! Form::open(array('route' => 'vehicle-ownership.store','method'=>'POST')) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-4">
        <div class="form-group">
            <strong>Ownership:</strong>
            {!! Form::text('vehicle_ownership', null, array('placeholder' => 'Ownership','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}
        </div>
    </div>
</div>

</section>
@endsection