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

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif


<div class="container-fluid">
    <div class="card">
    <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left pl-4 pt-4">
            <h2>Assign Permission</h2>
        </div>
        <div class="pull-right pl-4">
            <a class="btn btn-primary" href="{{ route('permit.index') }}"> Back</a>
        </div>
    </div>
</div>
        <div class="card-body">
        {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
<div class="row">


    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Select Department:</strong>
            <select name="name" class="form-control">
                <option value="">Select Department</option>
                @foreach($department as $item)
                  <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach   
            </select>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Select Designation:</strong>
            <select id="designation" class="form-control">
               @foreach($designation as $designations)
                  <option value="{{$designations->id}}">{{$designations->designation_name}}</option>
                @endforeach   
            </select>
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
                    <td>
                        {{ $value->resource}}

                         @php 
                           $data_sub=DB::table('permissions')->where('resource',$value->resource)->where('parent_id','!=',0)->get();
                         @endphp 

                       @if($data_sub->count()>0)
										        <ul>
                              @foreach($data_sub as $sub)
                                 <li style="list-style:none">{{ Form::checkbox('permission[]', $sub->id, false, array('class' => 'name')) }} {{$sub->name}} </li>
                              @endforeach 
                            </ul>
                       @endif 
                    </td>
                    @php 
                      $data=DB::table('permissions')->where('resource',$value->resource)->where('parent_id',0)->get();
                    @endphp 
                  @foreach($data as $permit)
                   <td>{{ Form::checkbox('permission[]', $permit->id, false, array('class' => 'name')) }}</td>
                  @endforeach 
                </tr>
                @endforeach
            </table>
        </div>
      </div>
    </div>
 
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Assign Permission</button>
    </div>
</div>
{!! Form::close() !!}
        </div>
    </div>
</div>


</section>
@endsection