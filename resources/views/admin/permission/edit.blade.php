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
    <div class="card-body">
    <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left pl-1">
            <h2>Edit Permission</h2>
        </div>
        <div class="pull-right pl-1">
            <a class="btn btn-primary" href="{{ route('permit.index') }}"> Back</a>
        </div>
    </div>
</div>
{!! Form::model($designation, ['method' => 'PATCH','route' => ['permit.update', $designation->id]]) !!}
<div class="row">

  @if($parentPermission->count()>0)
    <div class="col-xs-12 col-sm-12 col-md-4">
        <div class="form-group">
            <strong>Select Parent Permission:</strong>
            <select name="parent_id" class="form-control">
                <option value="">Select Parent Permission</option>
                @foreach($parentPermission as $item)
                  <option value="{{$item->id}}" @if($item->id==$designation->parent_id) selected @endif>{{$item->name}}</option>
                @endforeach   
            </select>
        </div>
    </div>
    @endif 


    <div class="col-xs-12 col-sm-12 col-md-4">
        <div class="form-group">
            <strong>Permission:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-4">
        <div class="form-group">
            <strong>Resource:</strong>
            {!! Form::text('resource', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
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