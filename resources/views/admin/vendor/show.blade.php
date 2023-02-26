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

/* Style the tab */
</style>
<section class="content container-fluid card">


<div class="container-fluid">
    <div class="card">
        <div class="col-lg-12 card_header">
            <h5> <i class="flaticon2-shelter"></i> Show Vendor</h5>
        </div>


        <div class="row">
           <div class="col-md-4 mt-2">


             <div class="kt-widget__media">
               <img src="{{asset('admin/customer/customer.png')}}" height="200px" alt="image">
             </div>

             <div class="kt-widget__content">
                <div class="kt-widget__section">
                    <a href="javascript:;" class="kt-widget__username" id="show_vehicle_no" style="font-size:14px; color:#8e91a0; font-weight:bold;">{{$user->customer_name}}
                    </a>
                </div>
                <div class="kt-widget__action">    
                     </div>
                </div>

       
                  <ul class="nav nav-tabs flex-column nav-pills" role="tablist">
                     <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#home-v" role="tab" aria-controls="home">Customer Information</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#profile-v" role="tab" aria-controls="profile">Complain</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#messages-v" role="tab" aria-controls="messages">Total Trip</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#settings-v" role="tab" aria-controls="settings">Total Schedule</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#settingss-v" role="tab" aria-controls="settings">Invoice</a>
                     </li>
                  </ul>
                 
               
           </div>
           <div class="col-md-8 mt-2">
               

           <div class="tab-content">
                     <div class="tab-pane active" id="home-v" role="tabpanel">
                        <div class="sv-tab-panel">

                        <div class="row"> 
                                <div class="col-xs-12 col-sm-12 col-md-9">
                                    Vendor Information
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-3">
                                    <a href="{{route('vendor.edit',$user->id)}}" class="btn btn-primary" style="float:left"> <i class="fa fa-edit"></i> Edit</a>
                                    <a href="{{route('vendor.index')}}" class="btn btn-danger mr-2" style="float:right"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
                                </div>
                           </div>

                       <div class="row">     
                        <div class="col-md-4">
                                <ul>
                                <li> <span>Vendor Name: </span> {{$user->vendor_name}}</li>
                                <li> <span>Company Name: </span> {{$user->company_name}}</li>
                              
                             
                                <li> <span>NID No: </span> {{$user->nid_no}}</li>
                            
                                <li> <span>Division: </span> {{optional($user->divisions)->division_name}}</li>
                                <li> <span>District: </span> {{optional($user->districts)->district_name}}</li>
                                <li> <span>Thana: </span>{{optional($user->thanas)->thana_name}}</li>
                                <li> <span>Present Address: </span>{{$user->present_address}}</li>
                                <li> <span>Permanent Address: </span>{{$user->permanent_address}}</li>
                                <li> <span>Billing Address: </span>{{$user->billing_address}}</li>
                            </ul>
                        </div>


                            <div class="col-md-4">
                                    <ul>
                  
                                    <li> <span>SMS Phone: </span>{{$user->sms_phone}}</li>
                                    <li> <span>Contact One: </span>{{$user->contact_one}}</li>
                                    <li> <span>Contact Two: </span>{{$user->contact_two}}</li>
                                    <li> <span>Email: </span>{{$user->contact_email}}</li>
                                    <li> <span>A/C Opening Date: </span> {{date('d-M-Y',strtotime($user->account_opening_date))}}</li>
                                    <li> <span>Account Note: </span>{{$user->account_note}}</li>
                                  
                                </ul>
                            </div>
                        </div>
                         


                        </div>
                     </div>
                     <div class="tab-pane" id="profile-v" role="tabpanel">
                        <div class="sv-tab-panel">Blank</div>
                     </div>
                     <div class="tab-pane" id="messages-v" role="tabpanel">
                        <div class="sv-tab-panel">Blank</div>
                     </div>
                     <div class="tab-pane" id="settings-v" role="tabpanel">
                        <div class="sv-tab-panel">Blank</div>
                     </div>
                     <div class="tab-pane" id="settingss-v" role="tabpanel">
                        <div class="sv-tab-panel">Blank</div>
                     </div>
                  </div>



           </div>
        </div>
        






    </div>
</div>



</section>
@endsection