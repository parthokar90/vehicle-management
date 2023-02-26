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

<div. class="card">
<div class="col-lg-12 card_header">
        <h5> <i class="flaticon2-shelter"></i> View Employee</h5>
    </div>
<div class="container-fluid">
@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
  <div class="card-body">
  @can('user-create')
        <div class="pull-right pt-4 pb-4">
            <a class="btn btn-success" href="{{ route('users.create') }}"> <i class="fa fa-plus"></i> Create New Employee</a>
        </div>
        @endcan
 <div class="table-responsive">
        <table id="example" class="display" width="100%">
<thead>
 <tr>
   <th>No</th>
   <th>Name</th>
   <th>Email</th>
   <th>Department</th>
   <th>Designation</th>
   <th width="280px">Action</th>
 </tr>
</thead>
 @foreach ($data as $key => $user)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>
      {{$user->department->name}}
    </td>
    <td>
    {{$user->designation->designation_name}}
    </td>
    <td>
       <!-- <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a> -->
       @can('user-edit')
       <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
       @endcan

    
    </td>
  </tr>
 @endforeach
</table>
</div>
</div>


</section>
@endsection