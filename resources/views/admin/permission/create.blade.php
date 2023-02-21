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
            <h2>Create New Permission</h2>
        </div>
        <div class="pull-right pl-4">
            <a class="btn btn-primary" href="{{ route('permit.index') }}"> Back</a>
        </div>
    </div>
</div>
        <div class="card-body">
-{!! Form::open(array('route' => 'permit.store','method'=>'POST')) !!}
<div class="row">

   @if($parentPermission->count()>0)
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Select Parent Permission:</strong>
            <select name="parent_id" class="form-control">
                <option value="">Select Parent Permission</option>
                @foreach($parentPermission as $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach   
            </select>
        </div>
    </div>
    @endif 


    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permission:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Resource:</strong>
            {!! Form::text('resource', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}
        </div>
    </div>
</div>



</section>
@endsection