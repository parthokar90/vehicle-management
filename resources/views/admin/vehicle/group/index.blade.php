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
        <h5> <i class="flaticon2-shelter"></i> View Vehicle Group</h5>
    </div>
<div class="container-fluid">
@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
  <div class="card-body">

        <div class="pull-right pt-4 pb-4">
            <a style="color:#ffffff" data-toggle="modal" data-target="#exampleModal" class="btn btn-success"> <i class="fa fa-plus"></i> Create New Group</a>
        </div>



<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Vehicle Group</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      {!! Form::open(array('route' => 'vehicle-group.store','method'=>'POST')) !!}
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Group Name:</strong>
                    {!! Form::text('group', null, array('placeholder' => 'Group Name','class' => 'form-control','required'=>'true')) !!}
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
</div>


 
<div class="table-responsive">
        <table id="example" class="display" width="100%">
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
                <!-- <a class="btn btn-info btn-sm" href="{{ route('vehicle-group.show',$item->id) }}">Show</a> -->
                    <a style="color:#ffffff" data-toggle="modal" onclick="openModal({{ $item->id }})" class="btn btn-primary btn-sm">Edit</a>
                </td>
            </tr>    


<div class="modal fade" id="modal_{{ $item->id }}" tabindex="-1" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="">Vehicle Group</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      {!! Form::model($item, ['method' => 'PATCH','route' => ['vehicle-group.update', $item->id]]) !!}
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Group Name:</strong>
                    {!! Form::text('group', null, array('placeholder' => 'Group Name','class' => 'form-control','required'=>'true')) !!}
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
</div>








           @endforeach 
        </tbody>
    </table>
</div>
</div>

<script>
function openModal(id) {
  // Get the modal with the corresponding ID
  var modal = document.getElementById('modal_' + id);

  // Show the modal
  $(modal).modal('show');
}
</script>

</section>
@endsection