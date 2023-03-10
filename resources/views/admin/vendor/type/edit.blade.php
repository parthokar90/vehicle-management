@extends('layouts.app')


@section('content')
<section class="content pt-2">



<style>
.form-control {
    width: 80%;
    height: 30px;
    padding: 5px 12px;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #e2e5ec;
    border-radius: 4px;
    float:right;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
.card-body {
    flex: 1 1 auto;
    padding: 10px 300px;
}
.card_header{
    border-bottom:1px solid #ccc;
    padding:15px;
}
.kt-header--fixed .kt-wrapper{
    padding-top:0px!important;
}
.card{
    margin:10px;
}
</style>


<div class="container-fluid">
    <div class="card">
        <div class="col-lg-12 card_header">
            <h5></h5>
        </div>
    </div>
</div>

<div class="container-fluid">
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
    <div class="card">
    <div class="col-lg-12 card_header">
            <h5> <i class="flaticon2-shelter"></i> Edit Vendor Type</h5>
        </div>

    <div class="card-body">
    <div class="row">
    
</div>
{!! Form::model($user, ['method' => 'PATCH','route' => ['vendor-type.update', $user->id]]) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Type:</strong>
            {!! Form::text('type', null, array('placeholder' => 'Type','class' => 'form-control')) !!}
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <button type="reset" class="btn btn-danger" style="float:left">Reset</button>
        <button type="submit" class="btn btn-primary" style="float:right">Submit</button>
    </div>
</div>
{!! Form::close() !!}

</div>
</div>
</div>


</section>
@endsection