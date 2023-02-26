@extends('layouts.app')


@section('content')
<section class="content">





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



<div class="card">
    <div class="col-lg-12 card_header">
        <h5> </h5>
    </div>
</div>

<div class="card">
<div class="col-lg-12 card_header">
        <h5> <i class="flaticon2-shelter"></i> View Department</h5>
    </div>
<div class="container-fluid">
    
@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
    <div class="col-lg-12 margin-tb">
     
     </div>

  <div class="card-body">

        <div class="pull-right pt-4 pb-4">
            <a class="btn btn-success" href="{{ route('department.create') }}"> <i class="fa fa-plus"></i> Create New Department</a>
        </div>
 
        <div class="table-responsive">
        <table id="example" class="display" width="100%">
<thead>
 <tr>
   <th>No</th>
   <th>Department</th>
   <th width="280px">Action</th>
 </tr>
</thead>
 @foreach ($data as $key => $user)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->name }}</td>
    <td>
       <!-- <a class="btn btn-info" href="{{ route('department.show',$user->id) }}">Show</a> -->

       <a class="btn btn-primary" href="{{ route('department.edit',$user->id) }}">Edit</a>
 

    
    </td>
  </tr>
 @endforeach
</table>
</div>
</div>
</div>





</section>
@endsection