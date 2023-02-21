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
            <h2>Edit New Department</h2>
        </div>
        <div class="pull-right pl-1">
            <a class="btn btn-primary" href="{{ route('department.index') }}"> Back</a>
        </div>
    </div>
</div>
{!! Form::model($user, ['method' => 'PATCH','route' => ['department.update', $user->id]]) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-4">
        <div class="form-group">
            <strong>Department Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
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