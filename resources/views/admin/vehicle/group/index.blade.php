@extends('layouts.app')
@section('content')
<section class="content">

@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
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
        <h5> <i class="flaticon2-shelter"></i> View Vehicle Group</h5>
    </div>
</div>


<div class="card">
<div class="container-fluid">
  <div class="card-body">

        <div class="pull-right pt-4 pb-4">
            <a class="btn btn-success" href="{{ route('vehicle-group.create') }}"> <i class="fa fa-plus"></i> Create New Group</a>
        </div>
 
        <table id="example" class="table table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Sl</th>
                <th>Group</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          @foreach($data as $key=> $item)
            <tr>
                <td>{{++$key}}</td>
                <td>{{$item->group}}</td>
                <td>
                <a class="btn btn-info btn-sm" href="{{ route('vehicle-group.show',$item->id) }}">Show</a>
                    <a class="btn btn-primary btn-sm" href="{{ route('vehicle-group.edit',$item->id) }}">Edit</a>
               
                </td>
            </tr>    
           @endforeach 
        </tbody>
    </table>
</div>
</section>
@endsection