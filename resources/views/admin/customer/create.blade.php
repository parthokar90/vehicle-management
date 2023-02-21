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
            <h5> <i class="flaticon2-shelter"></i> Add Customer</h5>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="card">
    <div class="col-lg-12 card_header">
    Add Customer
    </div>
    <div class="row">
  
</div>
        <div class="card-body">
-{!! Form::open(array('route' => 'customer.store','method'=>'POST')) !!}



<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">General</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Contact Details</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Platform Info</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="a-tab" data-toggle="tab" href="#contacts" role="tab" aria-controls="contact" aria-selected="false">Account Details</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

g
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
c
  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
p
  </div>
  <div class="tab-pane fade" id="contacts" role="tabpanel" aria-labelledby="contact-tab">
a
  </div>
</div>







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