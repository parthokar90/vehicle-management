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
                                                <i class="flaticon2-shelter"></i> Create New Department
												</h3>
											</div>
										</div>
										<!--begin::Form-->
                                        {!! Form::open(array('route' => 'department.store','method'=>'POST','class'=>'kt-form')) !!}
											<div class="kt-portlet__body">
												<div class="kt-section kt-section--first">
													<div class="kt-section__body">
														<div class="form-group row">
															<label class="col-lg-3 col-form-label">Department:</label>
															<div class="col-lg-6">
															{!! Form::text('name', null, array('placeholder' => 'Department Name','class' => 'form-control')) !!}
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