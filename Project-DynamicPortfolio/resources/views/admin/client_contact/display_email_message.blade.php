@extends('admin.admin_master')
@section('admin')
@php

$currentStatus = App\Models\LeadStat::where('client_Email', '=',$clientId->client_Email)->first()->lead_status;
$currentAction = App\Models\LeadStat::where('client_Email', '=',$clientId->client_Email)->first()->lead_action;
$listAllUsers = App\Models\User::all();
@endphp
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex mb-4">
                            <i class="fas fa-user-circle" style="font-size: 50px;"></i>&nbsp;
                            <div class="flex-1">
                                <h5 class="font-size-14 my-1">{{$clientId->client_fullName}}</h5>
                                <small class="text-muted">{{$clientId->client_Email}}</small>
                                @php
                                if($currentStatus == 1)
                                {
                                    echo "<small  style='background-color: green; color:#fff;  padding:5px; cursor:pointer;border-radius:20px 20px'>Active Lead</small>";
                                }
                                else
                                {
                                    echo "<small  style='background-color: red; color:#fff;  padding:5px; cursor:pointer; border-radius:20px 20px'>InActive Lead</small>";
                                }
                                @endphp
                                
                            </div>
                        </div>

                        <h4 class="font-size-16">Message</h4>

                        <p>{{$clientId->client_Message}}</p>

                        <hr>
                        
                        <p>
                            @php
                            switch($currentAction)
                            {
                                case "Fresh Lead":
                                    echo "<i><h7>Lead Events: This lead is {$currentAction} <span style='background-color: red; padding:5px; color:#fff;cursor:pointer; border-radius:20px 20px'> (New Lead)</span></h7></i>";
                                break;
                                case "Called":
                                    echo "<i><h7>Lead Events: We {$currentAction} this lead <span style='background-color: green; padding:5px; color:#fff;cursor:pointer; border-radius:20px 20px'> (Called)</span></h7></i>";
                                break;
                                case "Emailed":
                                    echo "<i><h7>Lead Events: We {$currentAction} this lead <span style='background-color: green; padding:5px; color:#fff;cursor:pointer; border-radius:20px 20px'> (Emailed)</span></h7></i>";
                                break;
                                case "Booked Appointment":
                                    echo "<i><h7>Lead Events: {$currentAction}  <span style='background-color: green; padding:5px; color:#fff;cursor:pointer; border-radius:20px 20px'> (Booked)</span></h7></i>";
                                break;
                                case "In Progress":
                                    echo "<i><h7>Lead Events: Lead is {$currentAction}  <span style='background-color: blue; padding:5px; color:#fff;cursor:pointer; border-radius:20px 20px'> (In Progress)</span></h7></i>";
                                break;
                                case "No Response":
                                    echo "<i><h7>Lead Events: {$currentAction}  <span style='background-color: black; padding:5px; color:#fff;cursor:pointer; border-radius:20px 20px'> (Not Responded)</span></h7></i>";
                                break;
                                case "Dead Lead":
                                    echo "<i><h7>Lead Events: {$currentAction}  <span style='background-color: red; padding:5px; color:#fff;cursor:pointer; border-radius:20px 20px'> (Dead Lead)</span></h7></i>";
                                break;
                            }
                            @endphp
                            
                        </p>
                        <hr>
                        <p>
                        
                        <div class="flex-1">
                            <button class="btn btn-primary"><i class="fas fas fa-at" style="font-size: 20px;"></i>
                                <h5 class="font-size-14 my-1" style="color:#ffffff">{{$clientId->client_Email}}</h5>
                            </button>
                            <button class="btn btn-primary"><i class="fas fa-phone" style="font-size: 20px;"></i>
                                <h5 class="font-size-14 my-1" style="color:#ffffff">{{$clientId->client_Mobile}}</h5>
                            </button>
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fas fa-edit" style="font-size: 20px;"></i>
                                <h5 class="font-size-14 my-1" style="color:#ffffff">Modify Status</h5>
                            </button>
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#addAction"><i class="fas fa-plus-circle" style="font-size: 20px;"></i>
                                <h5 class="font-size-14 my-1" style="color:#ffffff">Add Event</h5>
                            </button>
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#bookAppointment"><i class="fas fa-address-book" style="font-size: 20px;"></i>
                                <h5 class="font-size-14 my-1" style="color:#ffffff">Book new Event</h5>
                            </button>
                            <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#assignUser"><i class="fas fa-plus-circle" style="font-size: 20px;"></i>
                                <h5 class="font-size-14 my-1" style="color:#ffffff">Assign New User</h5>
                            </button>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Modify Status of Lead</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{route('lead.status')}}" method="POST">
                                            @csrf
                                        <div class="modal-body">
                                            <p>
                                                <div class="row mb-3" hidden>
                                                    <label for="client_id" class="col-sm-2 col-form-label">Client ID</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" name = "client_id" alt="Client Name" type="text" value="{{$clientId->id}}">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="client_Name" class="col-sm-2 col-form-label">Client Name</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" name = "client_Name"  alt="Client Name" type="text" value="{{$clientId->client_fullName}}">
                                                    </div>
                                                </div>
                                                
                                                <div class="row mb-3">
                                                    <label for="client_Email" class="col-sm-2 col-form-label">Client Email</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" name = "client_Email"  alt="Client Email Address" type="text" value="{{$clientId->client_Email}}">
                                                    </div>
                                                </div>
                                                
                                                <div class="row mb-3">
                                                    <label for="client_Mobile" class="col-sm-2 col-form-label">Client Mobile Number</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" name = "client_Mobile"  alt="Client Mobile Number" type="text" value="{{$clientId->client_Mobile}}">
                                                    </div>
                                                </div>
                                                
                                                <div class="row mb-3">
                                                    <label for="Select Status" class="col-sm-2 col-form-label">Select Status</label>
                                                    <div class="col-sm-10">
                                                        <select name="client_status" class="form-control form-select">
                                                            <option value="">Select Status</option>
                                                            <option name="client_status" value="1">Active</option>
                                                            <option name="client_status" value="0">Inactive</option>
                                                        </select>
                                                        
                                                    </div>
                                                </div>
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="addAction" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticaddAction" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticaddAction">Add Event</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{route('lead.action')}}" method="POST">
                                            @csrf
                                        <div class="modal-body">
                                            <p>
                                                <div class="row mb-3" hidden>
                                                    <label for="client_id" class="col-sm-2 col-form-label">Client ID</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" name = "client_id" alt="Client Name" type="text" value="{{$clientId->id}}">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="client_Name" class="col-sm-2 col-form-label">Client Name</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" name = "client_Name"  alt="Client Name" type="text" value="{{$clientId->client_fullName}}">
                                                    </div>
                                                </div>
                                                
                                                <div class="row mb-3">
                                                    <label for="client_Email" class="col-sm-2 col-form-label">Client Email</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" name = "client_Email"  alt="Client Email Address" type="text" value="{{$clientId->client_Email}}">
                                                    </div>
                                                </div>
                                                
                                                <div class="row mb-3">
                                                    <label for="client_Mobile" class="col-sm-2 col-form-label">Client Mobile Number</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" name = "client_Mobile"  alt="Client Mobile Number" type="text" value="{{$clientId->client_Mobile}}">
                                                    </div>
                                                </div>
                                                
                                                <div class="row mb-3">
                                                    <label for="Select Status" class="col-sm-2 col-form-label">Events</label>
                                                    <div class="col-sm-10">
                                                        <select name="lead_action" class="form-control form-select">
                                                            <option value="">Select Event</option>
                                                            <option name="lead_action" value="Called">Called</option>
                                                            <option name="lead_action" value="Emailed">Emailed</option>
                                                            <option name="lead_action" value="Booked Appointment">Booked Appointment</option>
                                                            <option name="lead_action" value="In Progress">In Progress</option>
                                                            <option name="lead_action" value="No Response">No Response</option>
                                                            <option name="lead_action" value="Dead Lead">Dead Lead</option>
                                                        </select>
                                                        
                                                    </div>
                                                </div>
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="bookAppointment" tabindex="-1" aria-labelledby="exampleModalScrollableTitle" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalScrollableTitle">Book an Appointment</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p><iframe src="https://calendly.com/morepratik1616/chat-with-pratik-more" title="Book an Appointment with Pratik More" style="outline:none; display:block" height="800px" width="100%"></iframe></p>
                                    </div>
                                    
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div>
                        <div class="modal fade" id="assignUser" tabindex="-1" aria-labelledby="exampleModalScrollableTitle" style="display: none;" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalScrollableTitle">Assign New User</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="{{route('lead.userAssigned')}}" method="POST">
                                            @csrf
                                        <div class="modal-body">
                                            <p>
                                                <div class="row mb-3" hidden>
                                                    <label for="client_id" class="col-sm-2 col-form-label">Client ID</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" name = "client_id" alt="Client Name" type="text" value="{{$clientId->id}}">
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="client_Name" class="col-sm-2 col-form-label">Client Name</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" name = "client_Name"  alt="Client Name" type="text" value="{{$clientId->client_fullName}}">
                                                    </div>
                                                </div>
                                                
                                                <div class="row mb-3">
                                                    <label for="client_Email" class="col-sm-2 col-form-label">Client Email</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" name = "client_Email"  alt="Client Email Address" type="text" value="{{$clientId->client_Email}}">
                                                    </div>
                                                </div>
                                                
                                                <div class="row mb-3">
                                                    <label for="client_Mobile" class="col-sm-2 col-form-label">Client Mobile Number</label>
                                                    <div class="col-sm-10">
                                                        <input class="form-control" name = "client_Mobile"  alt="Client Mobile Number" type="text" value="{{$clientId->client_Mobile}}">
                                                    </div>
                                                </div>
                                                
                                                <div class="row mb-3">
                                                    <label for="Available Users" class="col-sm-2 col-form-label">Available Users</label>
                                                    <div class="col-sm-10">
                                                        <select name="available_user" class="form-control form-select">
                                                            <option value="">Available Sales Person</option>
                                                            @foreach($listAllUsers as $user)
                                                            <option name='available_user' value='{{$user->name}}'>{{$user->name}}</option>;
                                                            @endforeach
                                                        </select>
                                                        
                                                    </div>
                                                </div>
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>
                                        </div>
                                    </form>
                                    
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div>
                        </p>
                        <hr>
                    </div>
                </div>

            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
</div>

@endsection