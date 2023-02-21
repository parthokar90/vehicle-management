@extends('layouts.app')


@section('content')
<section class="content">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left pb-2 pt-2">
            <h2>Role Management</h2>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<div class="card">
  <div class="card-body">
  <div class="pull-right pb-2 pt-2">
           @can('role-create')
            <a class="btn btn-success" href="{{ route('roles.create') }}"> <i class="fa fa-plus"></i> Create New Role</a>
            @endcan
        </div>
<table class="table table-bordered">
  <tr>
     <th>No</th>
     <th>Role</th>
     <th width="280px">Action</th>
  </tr>
    @foreach ($roles as $key => $role)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $role->name }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
            @can('role-edit')
                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
            @endcan
            @can('role-delete')
                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            @endcan
        </td>
    </tr>
    @endforeach
  </table>
</div>
</div>
</div>


{!! $roles->render() !!}


</section>
@endsection