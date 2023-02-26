@extends('layouts.app')

@section('content')

<section class="content pt-2">

<!-- begin:: Content -->
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
							<div class="row">
                            <div class="col-md-3"></div>
								<div class="col-lg-6">

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
                                                <i class="flaticon2-shelter"></i> Add  Staff
												</h3>
											</div>
										</div>
										<!--begin::Form-->
                                        {!! Form::open(array('route' => 'vehicle-staff.store','method'=>'POST','enctype'=>'multipart/form-data')) !!}
											<div class="kt-portlet__body">
												<div class="kt-section kt-section--first">
													<div class="kt-section__body">

														<div class="form-group row">
															<label class="col-lg-3 col-form-label">Staff ID:</label>
															<div class="col-lg-6">
                                                            {!! Form::text('staff_id', null, array('placeholder' => 'Staff Id','class' => 'form-control')) !!}
															</div>
														</div>

                                                        <div class="form-group row">
															<label class="col-lg-3 col-form-label">Staff Name:</label>
															<div class="col-lg-6">
                                                            {!! Form::text('staff_name', null, array('placeholder' => 'Staff Name','class' => 'form-control')) !!}
															</div>
														</div>

                                                        <div class="form-group row">
															<label class="col-lg-3 col-form-label">Father Name:</label>
															<div class="col-lg-6">
                                                            {!! Form::text('father_name', null, array('placeholder' => 'Father Name','class' => 'form-control')) !!}
															</div>
														</div>

                                                        <div class="form-group row">
															<label class="col-lg-3 col-form-label">Mother Name:</label>
															<div class="col-lg-6">
                                                            {!! Form::text('mother_name', null, array('placeholder' => 'Mother Name','class' => 'form-control')) !!}
															</div>
														</div>

                                                        <div class="form-group row">
															<label class="col-lg-3 col-form-label">Phone:</label>
															<div class="col-lg-6">
                                                            {!! Form::text('phone', null, array('placeholder' => 'Phone','class' => 'form-control')) !!}
															</div>
														</div>


                                                        <div class="form-group row">
															<label class="col-lg-3 col-form-label">Email:</label>
															<div class="col-lg-6">
                                                            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
															</div>
														</div>


                                                        <div class="form-group row">
															<label class="col-lg-3 col-form-label">Contact One:</label>
															<div class="col-lg-6">
                                                            {!! Form::text('contact_one', null, array('placeholder' => 'Contact One','class' => 'form-control')) !!}
															</div>
														</div>

                                                        <div class="form-group row">
															<label class="col-lg-3 col-form-label">Contact Two:</label>
															<div class="col-lg-6">
                                                            {!! Form::text('contact_two', null, array('placeholder' => 'Contact Two','class' => 'form-control')) !!}
															</div>
														</div>


                                                        <div class="form-group row">
															<label class="col-lg-3 col-form-label">Date of Birth:</label>
															<div class="col-lg-6">
                                                            {!! Form::date('date_of_birth', null, array('placeholder' => 'Date of birth','class' => 'form-control')) !!}
															</div>
														</div>


                                                        <div class="form-group row">
															<label class="col-lg-3 col-form-label">Nid No:</label>
															<div class="col-lg-6">
                                                            {!! Form::text('nid_no', null, array('placeholder' => 'Nid No','class' => 'form-control')) !!}
															</div>
														</div>


                                                        <div class="form-group row">
															<label class="col-lg-3 col-form-label">Present Address:</label>
															<div class="col-lg-6">
                                                            {!! Form::textarea('present_address', null, array('placeholder' => 'Present Address','class' => 'form-control','cols'=>2,'rows'=>2)) !!}
															</div>
														</div>


                                                        <div class="form-group row">
															<label class="col-lg-3 col-form-label">Permanent Address:</label>
															<div class="col-lg-6">
                                                            {!! Form::textarea('permanent_address', null, array('placeholder' => 'Permanent Address','class' => 'form-control','cols'=>2,'rows'=>2)) !!}
															</div>
														</div>


                                                        <div class="form-group row">
															<label class="col-lg-3 col-form-label">Staff Type:</label>
															<div class="col-lg-6">
                                                            <select class="form-control" name="staff_type">
                                                                @foreach($type as $types)
                                                                <option value="{{$types->id}}">{{$types->staff_type}}</option>
                                                                @endforeach 
                                                            </select>
															</div>
														</div>


                                                        <div class="form-group row">
															<label class="col-lg-3 col-form-label">Work Experience:</label>
															<div class="col-lg-6">
                                                            {!! Form::text('work_experience', null, array('placeholder' => 'Work Experience','class' => 'form-control')) !!}
															</div>
														</div>


                                                        <div class="form-group row">
															<label class="col-lg-3 col-form-label">Previous  Organisation:</label>
															<div class="col-lg-6">
                                                            {!! Form::text('previous_organisation', null, array('placeholder' => 'Previous Organisation','class' => 'form-control')) !!}
															</div>
														</div>

                                                        <div class="form-group row">
															<label class="col-lg-3 col-form-label">Assigned Vehicle:</label>
															<div class="col-lg-6">
                                                             <select class="form-control" name="assigned_vehicle">
                                                                @foreach($vehicle as $vehicles)
                                                                <option value="{{$vehicles->id}}">{{$vehicles->name}}</option>
                                                                @endforeach 
                                                            </select>
															</div>
														</div>


                                                        <div class="form-group row">
															<label class="col-lg-3 col-form-label">Profile Photo:</label>
															<div class="col-lg-6">
                                                            {!! Form::file('profile_photo', null, array('placeholder' => 'Work Experience','class' => 'form-control ml-3')) !!}
															</div>
														</div>


                                                        <div class="form-group row">
															<label class="col-lg-3 col-form-label">Status:</label>
															<div class="col-lg-6">
                                                            <select class="form-control" name="status">
                                                                <option value="1">Active</option>
                                                                <option value="0">InActive</option>
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
                                <div class="col-md-3"></div>
							</div>
						</div>
</section>
@endsection