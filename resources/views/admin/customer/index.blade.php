@extends('layouts.app')
@section('content')
<section class="content">





<style>

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

.form-control.select2-selection {
  height: 40px !important;
  padding: 0.375rem 0.75rem !important;
  font-size: 1rem !important;
  line-height: 1.5 !important;
  color: #495057 !important;
  background-color: #fff !important;
  background-clip: padding-box !important;
  border: 1px solid #ced4da !important;
  border-radius: 0.25rem !important;
  transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out !important;
}

.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #444;
    line-height: 28px;
    padding: 1px 12px !important;
}


/* Select2 Bootstrap 4 Theme */
.select2-container--bootstrap {
  box-sizing: border-box !important;
  display: inline-block !important;
  margin: 0 !important;
  position: relative !important;
  vertical-align: middle !important;
}
.select2-container--bootstrap .select2-selection--single {
  background-color: #fff !important;
  border: 1px solid #ced4da !important;
  border-radius: 0.25rem!important;
  height: calc(2.25rem + 2px) !important;
  padding: 0.375rem 0.75rem !important;
}
.select2-container--bootstrap .select2-selection--single:focus {
  border-color: #80bdff !important;
  outline: 0 !important;
  box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25) !important;
}
.select2-container--bootstrap .select2-selection--single .select2-selection__rendered {
  color: #495057 !important;
  line-height: 1.5 !important;
}
.select2-container--bootstrap .select2-selection--single .select2-selection__arrow {
  height: calc(2.25rem + 2px) !important;
  position: absolute !important;
  top: 0.375rem !important;
  right: 0.75rem !important;
  width: 1.75rem !important;
}
.select2-container--bootstrap .select2-selection--single .select2-selection__arrow b {
  border-color: #555 transparent transparent transparent !important;
  border-style: solid !important;
  border-width: 0.3rem 0.3rem 0 0.3rem !important;
  height: 0 !important;
  left: 50% !important;
  margin-left: -0.15rem !important;
  margin-top: -0.15rem !important;
  position: absolute !important;
  top: 50% !important;
  width: 0 !important;
}

.select2-container .select2-selection--single {
  height: 30px !important;
}

.select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 26px;
    position: absolute;
    top: 18px !important;
    right: 1px;
    width: 20px;
}

.form-control {
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


</style>



<div class="card">
    <div class="col-lg-12 card_header">
        <h5> <i class="flaticon2-shelter"></i> View Customer</h5>
    </div>
</div>


<div class="card">
    <div class="col-lg-12 card_header">
        <h5> <i class="flaticon2-shelter"></i> At a glance</h5>
        <button type="button" class="btn btn-info">Total Customer</button>
    </div>
</div>

{!! Form::open(array('route' => 'customer.index','method'=>'GET')) !!}
<div class="card">
@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger">
  <p>{{ $message }}</p>
</div>
@endif
    <div class="col-lg-12 card_header">
        <h5> <i class="flaticon2-shelter"></i> Filter customer list</h5>


  <div class="row">

    <div class="col-xs-12 col-sm-12 col-md-4">
        <div class="form-group">
            <select class="form-control select_two" name="status">
            <option value="">Select</option>
                    <option value="1">Inactive</option>              
                    <option value="2">Active</option>              
                    <option value="3">Over due</option>              
                    <option value="4">On Hold</option>              
                    <option value="5">Stop</option>                        
            <select>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-4">
        <div class="form-group">
            <select class="form-control select_two" name="employee">
            <option value="">Select Employee</option>
              @foreach($users as $userss)
                 <option value="{{$userss->id}}">{{$userss->name}}</option>    
               @endforeach                           
            <select>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-4">
        <div class="form-group">
            <select class="form-control select_two" name="district">
            <option value="">Select District</option>
              @foreach($district as $districts)
                 <option value="{{$districts->id}}">{{$districts->district_name}}</option>    
               @endforeach                           
            <select>
        </div>
    </div>

<br><br>
    <div class="col-xs-12 col-sm-12 col-md-4 mt-4">
    <div class="form-group">
            <select class="form-control select_two" name="thana">
            <option value="">Select Thana</option>
               @foreach($thana as $thanas)
                  <option value="{{$thanas->id}}">{{$thanas->thana_name}}</option>    
                @endforeach                               
            <select>
        </div>
   </div>

   <br><br>
   <div class="col-xs-12 col-sm-12 col-md-4">
      <div class="form-group">
            <strong>AC opening form:*</strong>
            {!! Form::date('from', null, array('placeholder' => 'Date of Birth','class' => 'form-control')) !!}
        </div>
   </div>

   <br><br>
   <div class="col-xs-12 col-sm-12 col-md-4">
       <div class="form-group">
            <strong>AC opening to:*</strong>
            {!! Form::date('to', null, array('placeholder' => 'Date of Birth','class' => 'form-control')) !!}
        </div>
   </div>



   <div class="col-xs-12 col-sm-12 col-md-3">
        <button type="reset" class="btn btn-danger" style="float:left">Reset</button>
        <button type="submit" class="btn btn-primary" style="float:right">Show customer list</button>
    </div>

    </div>
</div>

{!! Form::close() !!}


<div class="card">
<div class="container-fluid">
   
  <div class="card-body">

        <div class="pull-right pt-4 pb-4">
            <a class="btn btn-success" href="{{ route('customer.create') }}"> <i class="fa fa-plus"></i> Create New Customer</a>
        </div>
 
        <div class="table-responsive">
        <table id="example" class="display" width="100%">
        <thead>
            <tr>
                <th>Sl</th>
                <th>Customer ID</th>
                <th>Customer Name</th>
                <th>User Type</th>
                <th>Sms</th>
                <th>User ID</th>
                <th>District</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          @foreach($data as $key=> $item)
            <tr>
                <td>{{++$key}}</td>
                <td>CST00{{ substr($item->contact_one, 0,  4) }}</td>
                <td>  <span class=" ml-2 kt-badge kt-badge--success custom-kt-badge"> &nbsp; </span>   {{$item->customer_name}} 
                    @if($item->global_status==1) 
                     <span class="badge badge-danger">Inactive</span> 
                     @elseif($item->global_status==2)
                     <span class="badge badge-success">Active</span> 
                     @elseif($item->global_status==3)
                     <span class="badge badge-secondary">Over due</span>
                     @elseif($item->global_status==4)
                     <span class="badge badge-warning">On Hold</span>
                     @elseif($item->global_status==5)
                     <span class="badge badge-success">Stop</span>
                    @endif
                </td>
                <td>Enduser</td>
                <td>{{$item->sms_phone}}</td>
                <td>gm{{$item->sms_phone}}</td>
                <td>{{optional($item->districts)->district_name}}</td>
                <td>
                <a href="{{ route('customer.show',$item->id) }}"><i class="fa fa-eye"></i></a>
                <a  href="{{ route('customer.edit',$item->id) }}"><i class="fa fa-edit"></i></a>
                </td>
            </tr>    
           @endforeach 
        </tbody>
    </table>
</div>
</div>
</section>
@endsection