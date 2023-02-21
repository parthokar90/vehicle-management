@extends('layouts.app')


@section('content')
<section class="content container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> Show Type</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('staff-type.index') }}"> Back</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Type:</strong>
            {{ $user->staff_type }}
        </div>
    </div>
</div>
</section>
@endsection