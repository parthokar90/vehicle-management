@extends('layouts.app')

@section('content')

<style>
.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #444;
    line-height: 28px;
    padding: 7px 12px !important;
}


/* Select2 Bootstrap 4 Theme */
.select2-container--bootstrap {
  box-sizing: border-box !important;
  display: inline-block !important;
  margin: 0 !important;
  position: relative !important;
  vertical-align: middle !important;
}
.select2-container--bootstrap .select2-selection--single {
  background-color: #fff !important;
  border: 1px solid #ced4da !important;
  border-radius: 0.25rem!important;
  height: calc(2.25rem + 2px) !important;
  padding: 0.375rem 0.75rem !important;
}
.select2-container--bootstrap .select2-selection--single:focus {
  border-color: #80bdff !important;
  outline: 0 !important;
  box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25) !important;
}
.select2-container--bootstrap .select2-selection--single .select2-selection__rendered {
  color: #495057 !important;
  line-height: 1.5 !important;
}
.select2-container--bootstrap .select2-selection--single .select2-selection__arrow {
  height: calc(2.25rem + 2px) !important;
  position: absolute !important;
  top: 0.375rem !important;
  right: 0.75rem !important;
  width: 1.75rem !important;
}
.select2-container--bootstrap .select2-selection--single .select2-selection__arrow b {
  border-color: #555 transparent transparent transparent !important;
  border-style: solid !important;
  border-width: 0.3rem 0.3rem 0 0.3rem !important;
  height: 0 !important;
  left: 50% !important;
  margin-left: -0.15rem !important;
  margin-top: -0.15rem !important;
  position: absolute !important;
  top: 50% !important;
  width: 0 !important;
}

.select2-container .select2-selection--single {
  margin-top:10px !important;  
  height: 40px !important;
}

.select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 26px;
    position: absolute;
    top: 30px !important;
    right: 1px;
    width: 20px;
}
</style>

<section class="content pt-2">

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
							<div class="row">
                            <div class="col-md-2"></div>
								<div class="col-lg-8">

                                <!-- validation start -->
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
                                  <!-- validation end -->


									<!--begin::Portlet-->
									<div class="kt-portlet">
										<div class="kt-portlet__head">
											<div class="kt-portlet__head-label">
												<h3 class="kt-portlet__head-title">
                                                <i class="flaticon2-shelter"></i> Edit Vehicle
												</h3>
											</div>
										</div>
										<!--begin::Form-->
                                        {!! Form::model($data, ['method' => 'PATCH', 'enctype'=>'multipart/form-data', 'class'=>'kt-form', 'route' => ['vehicle.update', $data->id]]) !!}
											<div class="kt-portlet__body">
												<div class="kt-section kt-section--first">
													<div class="kt-section__body">

                                                       <div class="form-group row">
															<label class="col-lg-3 col-form-label">Vehicle Name:</label>
															<div class="col-lg-6">
                                                            {!! Form::text('name', null, array('placeholder' => 'Vehicle Name','class' => 'form-control')) !!}
															</div>
														</div>

                                                        <div class="form-group row">
															<label class="col-lg-3 col-form-label">Vehicle Plate No:</label>
															<div class="col-lg-6">
                                                            {!! Form::text('plate_no', null, array('placeholder' => 'Vehicle Plate No','class' => 'form-control')) !!}
															</div>
														</div>

														<div class="form-group row">
															<label class="col-lg-3 col-form-label">Vehicle Type:</label>
															<div class="col-lg-6">
                                                            <select class="form-control select_two" name="type">
                                                                @foreach($type as $types)
                                                                    <option value="{{$types->id}}" @if($types->id==$data->type) selected @endif>{{$types->vehicle_type}}</option>
                                                                    @endforeach 
                                                                </select>
															</div>
														</div>



                                                        <div class="form-group row">
															<label class="col-lg-3 col-form-label">Model Name:</label>
															<div class="col-lg-6">
                                                            {!! Form::text('model', null, array('placeholder' => 'Model Name','class' => 'form-control')) !!}
															</div>
														</div>


                                                        
                                                        <div class="form-group row">
															<label class="col-lg-3 col-form-label">Vehicle Color:</label>
															<div class="col-lg-6">
                                                            {!! Form::text('model', null, array('placeholder' => 'Model Name','class' => 'form-control')) !!}
															</div>
														</div>


                                                        
                                                        <div class="form-group row">
															<label class="col-lg-3 col-form-label">Vehicle Year:</label>
															<div class="col-lg-6">
                                                            {!! Form::text('year', null, array('placeholder' => 'Vehicle Year','class' => 'form-control')) !!}
															</div>
														</div>

                                                        
                                                        <div class="form-group row">
															<label class="col-lg-3 col-form-label">Vehicle Engine No:</label>
															<div class="col-lg-6">
                                                            {!! Form::text('engine_no', null, array('placeholder' => 'Vehicle Engine No','class' => 'form-control')) !!}
															</div>
														</div>

                                                        
                                                        <div class="form-group row">
															<label class="col-lg-3 col-form-label">Avarage Mileage:</label>
															<div class="col-lg-6">
                                                            {!! Form::text('milage', null, array('placeholder' => 'Avarage Mileage','class' => 'form-control')) !!}
															</div>
														</div>


                                                        <div class="form-group row">
															<label class="col-lg-3 col-form-label">Vehicle  Ownership:</label>
															<div class="col-lg-6">
                                                            <select class="form-control select_two" name="owner_ship">
                                                                @foreach($ownership as $ownerships)
                                                                <option value="{{$ownerships->id}}" @if($ownerships->id==$data->owner_ship) selected @endif>{{$ownerships->vehicle_ownership}}</option>
                                                                @endforeach 
                                                            </select>
															</div>
														</div>


                                                        <div class="form-group row">
															<label class="col-lg-3 col-form-label">Vehicle Group:</label>
															<div class="col-lg-6">
                                                            <select class="form-control select_two" name="group_id">
                                                                    @foreach($group as $groups) 
                                                                        <option value="{{$groups->id}}" @if($groups->id==$data->group_id) selected @endif>{{$groups->group}}</option>
                                                                    @endforeach
                                                                </select>
															</div>
														</div>


                                                        <div class="form-group row">
															<label class="col-lg-3 col-form-label">Photo:</label>
															<div class="col-lg-6">
                                                            <img class="img-fluid" width="40px" src="{{asset('admin/vehicle/'.$data->photo)}}">
                                                            <input type="file" name="photo" class="form-control">
															</div>
														</div>


                                                        <div class="form-group row">
															<label class="col-lg-3 col-form-label">Vehicle Status:</label>
															<div class="col-lg-6">
                                                            <select class="form-control" name="status">
                                                                @foreach($status as $statuss)
                                                                <option value="{{$statuss->id}}" @if($statuss->id==$data->status) selected @endif>{{$statuss->vehicle_status}}</option>
                                                                @endforeach 
                                                            </select>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="kt-portlet__foot">
												<div class="kt-form__actions">
													<div class="row">
														<div class="col-lg-3"></div>
														<div class="col-lg-6">
															<button type="submit" class="btn btn-success">Submit</button>
															<button type="reset" class="btn btn-danger">Reset</button>
														</div>
													</div>
												</div>
											</div>
                                            {!! Form::close() !!}
										<!--end::Form-->
									</div>
									<!--end::Portlet-->
								</div>
                                <div class="col-md-2"></div>
							</div>
						</div>
</section>
@endsection