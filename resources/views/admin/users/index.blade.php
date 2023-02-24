@extends('layouts.app')


@section('content')
<section class="content">



@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif

<div. class="card">
<div class="container-fluid">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left  pt-4">
            <h2>Employee Management</h2>
        </div>
     </div>
  <div class="card-body">
  @can('user-create')
        <div class="pull-right pt-4 pb-4">
            <a class="btn btn-success" href="{{ route('users.create') }}"> <i class="fa fa-plus"></i> Create New Employee</a>
        </div>
        @endcan
<table id="example" class="table table-bordered">
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
       <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
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