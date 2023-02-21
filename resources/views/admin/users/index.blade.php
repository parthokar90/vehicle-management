@extends('layouts.app')


@section('content')
<section class="content">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Employee Management</h2>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif

<div. class="card">
  <div class="card-body">
  @can('user-create')
        <div class="pull-right pt-4 pb-4">
            <a class="btn btn-success" href="{{ route('users.create') }}"> <i class="fa fa-plus"></i> Create New Employee</a>
        </div>
        @endcan
<table id="example" class="table table-bordered">
 <tr>
   <th>No</th>
   <th>Name</th>
   <th>Email</th>
   <th>Department</th>
   <th>Designation</th>
   <th width="280px">Action</th>
 </tr>
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

       @can('user-delete')
        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
      @endcan
    </td>
  </tr>
 @endforeach
</table>
</div>
</div.


{!! $data->render() !!}


</section>
@endsection