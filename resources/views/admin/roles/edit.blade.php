@extends('layouts.app')


@section('content')
<section class="content">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Role</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
        </div>
    </div>
</div>


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


{!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">





    <div class="card">
        <div class="card-body">
        <strong>Permission:</strong>
          <table class="table table-bordered">
            <tr class="bg-primary">
                <th>Resource Name</th>
                <th>List</th>
                <th>Create</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
               @foreach($resourcePermission as $value)
                <tr>
                    <td>{{ $value->resource}}</td>
                    @php 
                      $data=DB::table('permissions')->where('resource',$value->resource)->get();
                    @endphp 
                  @foreach($data as $permit)
                   <td>                   {{ Form::checkbox('permission[]', $permit->id, in_array($permit->id, $rolePermissions) ? true : false, array('class' => 'name')) }}</td>

                  @endforeach 
                </tr>
                @endforeach
            </table>
        </div>
      </div>
   
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!}
</section>

@endsection