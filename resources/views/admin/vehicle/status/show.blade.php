@extends('layouts.app')


@section('content')
<section class="content container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show Status</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('vehicle-status.index') }}"> Back</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Status:</strong>
            {{ $user->vehicle_status }}
        </div>
    </div>
</div>
</section>
@endsection