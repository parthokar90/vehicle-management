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
            <h5> <i class="flaticon2-shelter"></i> Create Permission</h5>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="card">
    <div class="col-lg-12 card_header">
    Create Permission
    </div>
    <div class="row">
   
</div>
        <div class="card-body">
-{!! Form::open(array('route' => 'permit.store','method'=>'POST')) !!}
<div class="row">

   @if($parentPermission->count()>0)
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Select Parent <br> Permission:</strong>
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