@extends('layouts.app')


@section('content')

<style>

.card_header{
    border-bottom:1px solid #ccc;
    padding:15px;
}
.kt-header--fixed .kt-wrapper{
    padding-top:0px!important;
}
.card{
    margin:10px;
}
.nav-link {
  color:#000000 !important;
}
li{
    list-style:none;
    padding:5px 0px;
 
}
span{
    font-weight:bold;
}
.nav-item{
    display:inline-block;
}
.nav-pills .nav-link {
  border-radius: 0;
  text-align: left;
  padding: 10px;
  margin-bottom: 1px;
}

.nav-pills .nav-link.active {
  background-color: #f8f9fa;
}

.tab-content {
  border: 1px solid #dee2e6;
  border-radius: 0 4px 4px 0;
  padding: 20px;
}
</style>


<section class="content container-fluid card">


<div class="container-fluid">
    <div class="card">
        <div class="col-lg-12 card_header">
            <h5> <i class="flaticon2-shelter"></i> Show Vehicle</h5>
        </div>


        <div class="row">
           <div class="col-md-4 mt-2">


             <div class="kt-widget__media">
               <img src="{{asset('admin/vehicle/'.$data->photo)}}" height="100px" alt="image">
             </div>

             <div class="kt-widget__content">
                <div class="kt-widget__section">
                    <a href="javascript:;" class="kt-widget__username" id="show_vehicle_no" style="font-size:14px; color:#8e91a0; font-weight:bold;">{{$data->name}}
                    </a>
                </div>
                <div class="kt-widget__action">    
                     </div>
                </div>

       
                  <ul class="nav nav-tabs flex-column nav-pills" role="tablist">
                     <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home-v" role="tab" aria-controls="home">Vehicle Information</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#Complain-v" role="tab" aria-controls="profile">Complain</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#Staff-v" role="tab" aria-controls="messages">Vehicle Staff</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#Maintenance-v" role="tab" aria-controls="settings">Maintenance</a>
                     </li>

                     <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#Document-v" role="tab" aria-controls="settings">Document</a>
                     </li>

                     <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#Inspection-v" role="tab" aria-controls="settings">Inspection List</a>
                     </li>



                     <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#Emi-v" role="tab" aria-controls="settings">Vehicle Emi</a>
                     </li>


                     <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#Trip-v" role="tab" aria-controls="settings">Trip Schedule</a>
                     </li>


                     <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#History-v" role="tab" aria-controls="settings">Trip History</a>
                     </li>


                     <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#Location-v" role="tab" aria-controls="settings">Gps Location</a>
                     </li>

                  </ul>
           </div>
           <div class="col-md-8 mt-2">
           <div class="tab-content">
                     <div class="tab-pane active" id="home-v" role="tabpanel">
                        <div class="sv-tab-panel">

                        <div class="row"> 
                                <div class="col-xs-12 col-sm-12 col-md-9">
                                   Vehicle Information
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-3">
                                    <a href="{{route('vehicle.edit',$data->id)}}" class="btn btn-primary" style="float:left"> <i class="fa fa-edit"></i> Edit</a>
                                    <a href="{{route('vehicle.index')}}" class="btn btn-danger mr-2" style="float:right"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                                </div>
                           </div>

                       <div class="row">     
                        <div class="col-md-4">
                                <ul>
                                <li> <span>Vehicle Name: </span></li>
                                <li> <span>Vehicle Plate No: </span></li>
                                <li> <span>Vehicle Type: </span> </li>
                                <li> <span>Model Name: </span> </li>
                                <li> <span>Vehicle Color: </span></li>
                                <li> <span>Vehicle Year: </span> </li>
                                <li> <span>Vehicle Engine No: </span> </li>
                                <li> <span>Avarage Mileage: </span> </li>
                                <li> <span>Vehicle ownership: </span> </li>
                                <li> <span>Vehicle Group: </span></li>
                                <li> <span>Vehicle Status: </span></li>
                            </ul>
                        </div>


                            <div class="col-md-4">
                                    <ul>
                                    <li> {{$data->name}}</li>
                                    <li> {{$data->plate_no}}</li>
                                    <li> {{$data->vehicleType->vehicle_type}}</li>
                                    <li> {{$data->model}}</li>
                                    <li> {{ $data->color}}</li>
                                    <li> {{$data->year}}</li>
                                    <li> {{$data->engine_no}}</li>
                                    <li> {{$data->milage}}</li>
                                    <li> {{$data->vehicleOwnership->vehicle_ownership}}</li>
                                    <li> {{$data->vehicleGroup->group}}</li>
                                    <li> {{$data->vehicleStatus->vehicle_status}}</li>
                                </ul>
                            </div>
                        </div>
                         


                        </div>
                     </div>


                     <div class="tab-pane" id="Complain-v" role="tabpanel">
                        <div class="sv-tab-panel">Blank</div>
                     </div>

                     <div class="tab-pane" id="Staff-v" role="tabpanel">
                           <div class="sv-tab-panel">Vehicle Staff</div>
                            <table id="example" class="table table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Photo</th>
                                        <th>Staff ID</th>
                                        <th>Staff name</th>
                                        <th>Staff Type</th>
                                        <th>Phone</th>
                                        <th>Assigned vehicle</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($data->assignedStaff as $key=> $item)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td><img class="img-fluid" width="40px" src="{{asset('admin/vehicle/staff/'.$item->profile_photo)}}"></td>
                                        <td>{{$item->staff_id}}</td>
                                        <td>{{$item->staff_name}}</td>
                                        <td>{{optional($item->staffType)->staff_type}}</td>
                                        <td>{{$item->phone}}</td>
                                        <td>{{optional($item->assignedVehicle)->name}}</td>
                                        <td>
                                        <!-- <a class="btn btn-info btn-sm" href="{{ route('vehicle-staff.show',$item->id) }}">Show</a> -->
                                            <a class="btn btn-primary btn-sm" href="{{ route('vehicle-staff.edit',$item->id) }}">Edit</a>
                                        
                                        </td>
                                    </tr>    
                                @endforeach 
                                </tbody>
                            </table>
                     </div>


                     <div class="tab-pane" id="Maintenance-v" role="tabpanel">
                        <div class="sv-tab-panel">Blank</div>
                     </div>


                     <div class="tab-pane" id="Document-v" role="tabpanel">
                        <div class="sv-tab-panel">Blank</div>
                     </div>


                     <div class="tab-pane" id="Inspection-v" role="tabpanel">
                        <div class="sv-tab-panel">Blank</div>
                     </div>


                     <div class="tab-pane" id="Emi-v" role="tabpanel">
                        <div class="sv-tab-panel">Blank</div>
                     </div>


                     <div class="tab-pane" id="Trip-v" role="tabpanel">
                        <div class="sv-tab-panel">Blank</div>
                     </div>


                     <div class="tab-pane" id="History-v" role="tabpanel">
                        <div class="sv-tab-panel">Blank</div>
                     </div>


                     <div class="tab-pane" id="Location-v" role="tabpanel">
                        <div class="sv-tab-panel">Blank</div>
                     </div>

               </div>
           </div>
        </div>
    </div>
</div>
</section>
@endsection