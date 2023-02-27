@extends('admin.admin_master')
@section('admin')
@php
$employeeinTeam = App\Models\ASC\EmpRecord::all();
$storeEmpID = "";
@endphp
<!-- Jquery 3.6 -->
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<!-- Google Charts Integration -->
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-7">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Manage Teams</h2>
                        <p class="card-title-desc">Dragg Teams to Sort</p>
                        <ul id="draggablePanelList" class="list-unstyled">
                            <li class="panel">
                                <div class="panel-heading bg-info " style="color:#ffffff; padding:10px; cursor: move;">Developers Team</div>
                                <div class="panel-body">
                                    <div class="card">
                                        <div class="row no-gutters align-items-center" style="padding:10px;">
                                            <div class="col-xl-12">
                                                <div class="card-body">
                                                    <h5 class="card-title">Team Members and Their Details</h5>
                                                    <div class="row">
                                                        <p class="card-text">
                                                        <div class="card-body">
                                                            @foreach($employeeinTeam as $teamMember)
                                                            @if($teamMember->allocated_in_team == "DTeam")
                                                            <div class="row" style="padding:10px">
                                                                @if($teamMember->emp_status == 1)
                                                                <div class="col-xl-4">
                                                                    <button class="btn-primary form-control btn-rounded waves-effect waves-light" data-bs-toggle="popover" data-bs-trigger="focus" title="Employee Details" data-bs-content="Status: Active | Position: {{$teamMember->emp_position}} | Employement Type: {{$teamMember->emp_type}} Employee | Salary {{$teamMember->emp_salary}}" data-bs-original-title="Dismissible popover"> <img src="{{asset('backend/assets/images/Teams/WDLogo.png')}}" alt="employee" class="rounded-circle avatar-sm"> {{$teamMember->emp_name}}</button>
                                                                </div>
                                                                @else
                                                                <div class="col-xl-4">
                                                                    <button class="btn-primary form-control btn-rounded waves-effect waves-light" data-bs-toggle="popover" data-bs-trigger="focus" title="Employee Details" data-bs-content="Status: DeActiveted | Position: {{$teamMember->emp_position}} | Employement Type: {{$teamMember->emp_type}} Employee | Salary {{$teamMember->emp_salary}}" data-bs-original-title="Dismissible popover"> <img src="{{asset('backend/assets/images/Teams/WDLogo.png')}}" alt="employee" class="rounded-circle avatar-sm"> {{$teamMember->emp_name}}</button>
                                                                </div>
                                                                @endif
                                                                <div class="col-xl-4">
                                                                    <button class="btn btn-danger form-control btn-rounded waves-effect waves-dark" data-bs-toggle="modal" data-bs-target="#RMFTModal-{{$teamMember->id}}">Remove Employee From Dev Team</button><br>
                                                                </div>
                                                                <div class="col-xl-4">
                                                                    <button class="btn btn-success form-control btn-rounded waves-effect waves-dark" data-bs-toggle="modal" data-bs-target="#RMFTModal-{{$teamMember->id}}">Assign Employee To Another Team</button>
                                                                </div>
                                                                </br>
                                                            </div>
                                                            <div id="RMFTModal-{{$teamMember->id}}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="myModalLabel">Remove {{$teamMember->emp_name}} From Developers Team</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="{{route('accountservices.addToTeam')}}" method="post">
                                                                                <!-- CSRF Token is used for active user session  -->
                                                                                @csrf
                                                                                <!-- NOTE: This token is used to verify the authenticated user -->
                                                                                <input name="id" value="{{$teamMember->id}}" style="display:none" />
                                                                                <h6 for="Employee Type" class="col-xl-12 col-form-label">Need to Assign To Different Team?</h6>
                                                                                <div class="row mb-3">
                                                                                    <div class="col-xl-12">
                                                                                        <select class="form-select" name="teamAllocated" alt="Allocate Team" id="teamAllocated">
                                                                                            <option name="teamAllocated" value="">None</option>
                                                                                            <option name="teamAllocated" value="MTeam">Marketing Team</option>
                                                                                            <option name="teamAllocated" value="STeam">Support Team</option>
                                                                                            <option name="teamAllocated" value="RDTeam">Research & Development Team</option>
                                                                                            <option name="teamAllocated" value="ATeam">Analyst Team</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row mb-3">
                                                                                    <div class="col-sm-10">
                                                                                        <input type="submit" class="btn btn-rounded btn-success" value="Assign"></br></br>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <small style="color:red">*You can keep none if you wish to not assing the employee to any team</small>
                                                                        </div>
                                                                    </div><!-- /.modal-content -->
                                                                </div><!-- /.modal-dialog -->
                                                            </div>

                                                            @endif
                                                            @endforeach
                                                        </div>
                                                        </p>
                                                    </div>
                                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                                    <button type="button" class="btn btn-primary waves-effect waves-light">Send Email</button>
                                                    <button type="button" class="btn btn-primary waves-effect waves-light">Book Meeting</button>
                                                    <button type="button" class="btn btn-primary waves-effect waves-light">Send SMS</button>
                                                    <a href="#"><button type="button" class="btn btn-primary waves-effect waves-light">Assign Project</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="panel">
                                <div class="panel-heading bg-primary" style="color:#ffffff; padding:10px; cursor: move;">Marketing Team</div>
                                <div class="panel-body">
                                    <div class="card">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-xl-12">
                                                <div class="card-body">
                                                    <h5 class="card-title">Team Members and Their Details</h5>
                                                    <p class="card-text">
                                                    <div class="row">
                                                        <div class="card-body">
                                                            @foreach($employeeinTeam as $teamMember)
                                                            @if($teamMember->allocated_in_team == "MTeam")
                                                            <div class="row" style="padding:10px">
                                                                @if($teamMember->emp_status == 1)
                                                                <div class="col-xl-4">
                                                                    <button class="btn-primary form-control btn-rounded waves-effect waves-light" data-bs-toggle="popover" data-bs-trigger="focus" title="Employee Details" data-bs-content="Status: Active | Position: {{$teamMember->emp_position}} | Employement Type: {{$teamMember->emp_type}} Employee | Salary {{$teamMember->emp_salary}}" data-bs-original-title="Dismissible popover"> <img src="{{asset('backend/assets/images/Teams/WDLogo.png')}}" alt="employee" class="rounded-circle avatar-sm"> {{$teamMember->emp_name}}</button>
                                                                </div>
                                                                @else
                                                                <div class="col-xl-4">
                                                                    <button class="btn-primary form-control btn-rounded waves-effect waves-light" data-bs-toggle="popover" data-bs-trigger="focus" title="Employee Details" data-bs-content="Status: DeActiveted | Position: {{$teamMember->emp_position}} | Employement Type: {{$teamMember->emp_type}} Employee | Salary {{$teamMember->emp_salary}}" data-bs-original-title="Dismissible popover"> <img src="{{asset('backend/assets/images/Teams/WDLogo.png')}}" alt="employee" class="rounded-circle avatar-sm"> {{$teamMember->emp_name}}</button>
                                                                </div>
                                                                @endif
                                                                <div class="col-xl-4">
                                                                    <button class="btn btn-danger form-control btn-rounded waves-effect waves-dark" data-bs-toggle="modal" data-bs-target="#RMFTModal-{{$teamMember->id}}">Remove Employee From Dev Team</button><br>
                                                                </div>
                                                                <div class="col-xl-4">
                                                                    <button class="btn btn-success form-control btn-rounded waves-effect waves-dark" data-bs-toggle="modal" data-bs-target="#RMFTModal-{{$teamMember->id}}">Assign Employee To Another Team</button>
                                                                </div>
                                                                </br>
                                                            </div>
                                                            <div id="RMFTModal-{{$teamMember->id}}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="myModalLabel">Remove {{$teamMember->emp_name}} From Developers Team</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="{{route('accountservices.addToTeam')}}" method="post">
                                                                                <!-- CSRF Token is used for active user session  -->
                                                                                @csrf
                                                                                <!-- NOTE: This token is used to verify the authenticated user -->
                                                                                <input name="id" value="{{$teamMember->id}}" style="display:none" />
                                                                                <h6 for="Employee Type" class="col-xl-12 col-form-label">Need to Assign To Different Team?</h6>
                                                                                <div class="row mb-3">
                                                                                    <div class="col-xl-12">
                                                                                        <select class="form-select" name="teamAllocated" alt="Allocate Team" id="teamAllocated">
                                                                                            <option name="teamAllocated" value="">None</option>
                                                                                            <option name="teamAllocated" value="DTeam">Developers Team</option>
                                                                                            <option name="teamAllocated" value="STeam">Support Team</option>
                                                                                            <option name="teamAllocated" value="RDTeam">Research & Development Team</option>
                                                                                            <option name="teamAllocated" value="ATeam">Analyst Team</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row mb-3">
                                                                                    <div class="col-sm-10">
                                                                                        <input type="submit" class="btn btn-rounded btn-success" value="Assign"></br></br>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <small style="color:red">*You can keep none if you wish to not assing the employee to any team</small>
                                                                        </div>
                                                                    </div><!-- /.modal-content -->
                                                                </div><!-- /.modal-dialog -->
                                                            </div>

                                                            @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    </p>
                                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                                    <button type="button" class="btn btn-primary waves-effect waves-light">Send Email</button>
                                                    <button type="button" class="btn btn-primary waves-effect waves-light">Book Meeting</button>
                                                    <button type="button" class="btn btn-primary waves-effect waves-light">Send SMS</button>
                                                    <a href="#"><button type="button" class="btn btn-primary waves-effect waves-light">Assign Task</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="panel">
                                <div class="panel-heading bg-warning" style="color:#ffffff ;padding:10px; cursor: move;">Support Team</div>
                                <div class="panel-body">
                                    <div class="card">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-xl-12">
                                                <div class="card-body">
                                                    <h5 class="card-title">Team & their Details</h5>
                                                    <p class="card-text">
                                                    <div class="row">
                                                        <div class="card-body">
                                                            @foreach($employeeinTeam as $teamMember)
                                                            @if($teamMember->allocated_in_team == "STeam")
                                                            <div class="row" style="padding:10px">
                                                                @if($teamMember->emp_status == 1)
                                                                <div class="col-xl-4">
                                                                    <button class="btn-primary form-control btn-rounded waves-effect waves-light" data-bs-toggle="popover" data-bs-trigger="focus" title="Employee Details" data-bs-content="Status: Active | Position: {{$teamMember->emp_position}} | Employement Type: {{$teamMember->emp_type}} Employee | Salary {{$teamMember->emp_salary}}" data-bs-original-title="Dismissible popover"> <img src="{{asset('backend/assets/images/Teams/WDLogo.png')}}" alt="employee" class="rounded-circle avatar-sm"> {{$teamMember->emp_name}}</button>
                                                                </div>
                                                                @else
                                                                <div class="col-xl-4">
                                                                    <button class="btn-primary form-control btn-rounded waves-effect waves-light" data-bs-toggle="popover" data-bs-trigger="focus" title="Employee Details" data-bs-content="Status: DeActiveted | Position: {{$teamMember->emp_position}} | Employement Type: {{$teamMember->emp_type}} Employee | Salary {{$teamMember->emp_salary}}" data-bs-original-title="Dismissible popover"> <img src="{{asset('backend/assets/images/Teams/WDLogo.png')}}" alt="employee" class="rounded-circle avatar-sm"> {{$teamMember->emp_name}}</button>
                                                                </div>
                                                                @endif
                                                                <div class="col-xl-4">
                                                                    <button class="btn btn-danger form-control btn-rounded waves-effect waves-dark" data-bs-toggle="modal" data-bs-target="#RMFTModal-{{$teamMember->id}}">Remove Employee From Dev Team</button><br>
                                                                </div>
                                                                <div class="col-xl-4">
                                                                    <button class="btn btn-success form-control btn-rounded waves-effect waves-dark" data-bs-toggle="modal" data-bs-target="#RMFTModal-{{$teamMember->id}}">Assign Employee To Another Team</button>
                                                                </div>
                                                                </br>
                                                            </div>
                                                            <div id="RMFTModal-{{$teamMember->id}}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="myModalLabel">Remove {{$teamMember->emp_name}} From Developers Team</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="{{route('accountservices.addToTeam')}}" method="post">
                                                                                <!-- CSRF Token is used for active user session  -->
                                                                                @csrf
                                                                                <!-- NOTE: This token is used to verify the authenticated user -->
                                                                                <input name="id" value="{{$teamMember->id}}" style="display:none" />
                                                                                <h6 for="Employee Type" class="col-xl-12 col-form-label">Need to Assign To Different Team?</h6>
                                                                                <div class="row mb-3">
                                                                                    <div class="col-xl-12">
                                                                                        <select class="form-select" name="teamAllocated" alt="Allocate Team" id="teamAllocated">
                                                                                            <option name="teamAllocated" value="">None</option>
                                                                                            <option name="teamAllocated" value="DTeam">Developers Team</option>
                                                                                            <option name="teamAllocated" value="MTeam">Marketing Team</option>
                                                                                            <option name="teamAllocated" value="RDTeam">Research & Development Team</option>
                                                                                            <option name="teamAllocated" value="ATeam">Analyst Team</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row mb-3">
                                                                                    <div class="col-sm-10">
                                                                                        <input type="submit" class="btn btn-rounded btn-success" value="Assign"></br></br>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <small style="color:red">*You can keep none if you wish to not assing the employee to any team</small>
                                                                        </div>
                                                                    </div><!-- /.modal-content -->
                                                                </div><!-- /.modal-dialog -->
                                                            </div>

                                                            @endif
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                    </p>
                                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                                    <button type="button" class="btn btn-primary waves-effect waves-light">Send Email</button>
                                                    <button type="button" class="btn btn-primary waves-effect waves-light">Book Meeting</button>
                                                    <button type="button" class="btn btn-primary waves-effect waves-light">Send SMS</button>
                                                    <a href="#"><button type="button" class="btn btn-primary waves-effect waves-light">Assign Task</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="panel">
                                <div class="panel-heading bg-danger" style="color:#ffffff; padding:10px;cursor: move;">Research & Development Team</div>
                                <div class="panel-body">
                                    <div class="card">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-xl-12">
                                                <div class="card-body">
                                                    <h5 class="card-title">Team & Their Details</h5>
                                                    <p class="card-text">
                                                    <div class="row">
                                                        <div class="card-body">
                                                            @foreach($employeeinTeam as $teamMember)
                                                            @if($teamMember->allocated_in_team == "RDTeam")
                                                            <div class="row" style="padding:10px">
                                                                @if($teamMember->emp_status == 1)
                                                                <div class="col-xl-4">
                                                                    <button class="btn-primary form-control btn-rounded waves-effect waves-light" data-bs-toggle="popover" data-bs-trigger="focus" title="Employee Details" data-bs-content="Status: Active | Position: {{$teamMember->emp_position}} | Employement Type: {{$teamMember->emp_type}} Employee | Salary {{$teamMember->emp_salary}}" data-bs-original-title="Dismissible popover"> <img src="{{asset('backend/assets/images/Teams/WDLogo.png')}}" alt="employee" class="rounded-circle avatar-sm"> {{$teamMember->emp_name}}</button>
                                                                </div>
                                                                @else
                                                                <div class="col-xl-4">
                                                                    <button class="btn-primary form-control btn-rounded waves-effect waves-light" data-bs-toggle="popover" data-bs-trigger="focus" title="Employee Details" data-bs-content="Status: DeActiveted | Position: {{$teamMember->emp_position}} | Employement Type: {{$teamMember->emp_type}} Employee | Salary {{$teamMember->emp_salary}}" data-bs-original-title="Dismissible popover"> <img src="{{asset('backend/assets/images/Teams/WDLogo.png')}}" alt="employee" class="rounded-circle avatar-sm"> {{$teamMember->emp_name}}</button>
                                                                </div>
                                                                @endif
                                                                <div class="col-xl-4">
                                                                    <button class="btn btn-danger form-control btn-rounded waves-effect waves-dark" data-bs-toggle="modal" data-bs-target="#RMFTModal-{{$teamMember->id}}">Remove Employee From Dev Team</button><br>
                                                                </div>
                                                                <div class="col-xl-4">
                                                                    <button class="btn btn-success form-control btn-rounded waves-effect waves-dark" data-bs-toggle="modal" data-bs-target="#RMFTModal-{{$teamMember->id}}">Assign Employee To Another Team</button>
                                                                </div>
                                                                </br>
                                                            </div>
                                                            <div id="RMFTModal-{{$teamMember->id}}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="myModalLabel">Remove {{$teamMember->emp_name}} From Developers Team</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="{{route('accountservices.addToTeam')}}" method="post">
                                                                                <!-- CSRF Token is used for active user session  -->
                                                                                @csrf
                                                                                <!-- NOTE: This token is used to verify the authenticated user -->
                                                                                <input name="id" value="{{$teamMember->id}}" style="display:none" />
                                                                                <h6 for="Employee Type" class="col-xl-12 col-form-label">Need to Assign To Different Team?</h6>
                                                                                <div class="row mb-3">
                                                                                    <div class="col-xl-12">
                                                                                        <select class="form-select" name="teamAllocated" alt="Allocate Team" id="teamAllocated">
                                                                                            <option name="teamAllocated" value="">None</option>
                                                                                            <option name="teamAllocated" value="DTeam">Developers Team</option>
                                                                                            <option name="teamAllocated" value="MTeam">Marketing Team</option>
                                                                                            <option name="teamAllocated" value="STeam">Support Team</option>
                                                                                            <option name="teamAllocated" value="ATeam">Analyst Team</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row mb-3">
                                                                                    <div class="col-sm-10">
                                                                                        <input type="submit" class="btn btn-rounded btn-success" value="Assign"></br></br>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <small style="color:red">*You can keep none if you wish to not assing the employee to any team</small>
                                                                        </div>
                                                                    </div><!-- /.modal-content -->
                                                                </div><!-- /.modal-dialog -->
                                                            </div>

                                                            @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    </p>
                                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                                    <button type="button" class="btn btn-primary waves-effect waves-light">Send Email</button>
                                                    <button type="button" class="btn btn-primary waves-effect waves-light">Book Meeting</button>
                                                    <button type="button" class="btn btn-primary waves-effect waves-light">Send SMS</button>
                                                    <a href="#"><button type="button" class="btn btn-primary waves-effect waves-light">Assign Task</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="panel">
                                <div class="panel-heading bg-success" style="color:#ffffff ;padding:10px;cursor: move;">Analyst Team</div>
                                <div class="panel-body">
                                    <div class="card">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-xl-12">
                                                <div class="card-body">
                                                    <h5 class="card-title">Team & Their Details</h5>
                                                    <p class="card-text">
                                                    <div class="row">
                                                        <div class="card-body">
                                                            @foreach($employeeinTeam as $teamMember)
                                                            @if($teamMember->allocated_in_team == "ATeam")
                                                            <div class="row" style="padding:10px">
                                                                @if($teamMember->emp_status == 1)
                                                                <div class="col-xl-4">
                                                                    <button class="btn-primary form-control btn-rounded waves-effect waves-light" data-bs-toggle="popover" data-bs-trigger="focus" title="Employee Details" data-bs-content="Status: Active | Position: {{$teamMember->emp_position}} | Employement Type: {{$teamMember->emp_type}} Employee | Salary {{$teamMember->emp_salary}}" data-bs-original-title="Dismissible popover"> <img src="{{asset('backend/assets/images/Teams/WDLogo.png')}}" alt="employee" class="rounded-circle avatar-sm"> {{$teamMember->emp_name}}</button>
                                                                </div>
                                                                @else
                                                                <div class="col-xl-4">
                                                                    <button class="btn-primary form-control btn-rounded waves-effect waves-light" data-bs-toggle="popover" data-bs-trigger="focus" title="Employee Details" data-bs-content="Status: DeActiveted | Position: {{$teamMember->emp_position}} | Employement Type: {{$teamMember->emp_type}} Employee | Salary {{$teamMember->emp_salary}}" data-bs-original-title="Dismissible popover"> <img src="{{asset('backend/assets/images/Teams/WDLogo.png')}}" alt="employee" class="rounded-circle avatar-sm"> {{$teamMember->emp_name}}</button>
                                                                </div>
                                                                @endif
                                                                <div class="col-xl-4">
                                                                    <button class="btn btn-danger form-control btn-rounded waves-effect waves-dark" data-bs-toggle="modal" data-bs-target="#RMFTModal-{{$teamMember->id}}">Remove Employee From Dev Team</button><br>
                                                                </div>
                                                                <div class="col-xl-4">
                                                                    <button class="btn btn-success form-control btn-rounded waves-effect waves-dark" data-bs-toggle="modal" data-bs-target="#RMFTModal-{{$teamMember->id}}">Assign Employee To Another Team</button>
                                                                </div>
                                                                </br>
                                                            </div>
                                                            <div id="RMFTModal-{{$teamMember->id}}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="myModalLabel">Remove {{$teamMember->emp_name}} From Developers Team</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="{{route('accountservices.addToTeam')}}" method="post">
                                                                                <!-- CSRF Token is used for active user session  -->
                                                                                @csrf
                                                                                <!-- NOTE: This token is used to verify the authenticated user -->
                                                                                <input name="id" value="{{$teamMember->id}}" style="display:none" />
                                                                                <h6 for="Employee Type" class="col-xl-12 col-form-label">Need to Assign To Different Team?</h6>
                                                                                <div class="row mb-3">
                                                                                    <div class="col-xl-12">
                                                                                        <select class="form-select" name="teamAllocated" alt="Allocate Team" id="teamAllocated">
                                                                                            <option name="teamAllocated" value="">None</option>
                                                                                            <option name="teamAllocated" value="DTeam">Developers Team</option>
                                                                                            <option name="teamAllocated" value="MTeam">Marketing Team</option>
                                                                                            <option name="teamAllocated" value="STeam">Support Team</option>
                                                                                            <option name="teamAllocated" value="RDTeam">Research & Development Team</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row mb-3">
                                                                                    <div class="col-sm-10">
                                                                                        <input type="submit" class="btn btn-rounded btn-success" value="Assign"></br></br>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <small style="color:red">*You can keep none if you wish to not assing the employee to any team</small>
                                                                        </div>
                                                                    </div><!-- /.modal-content -->
                                                                </div><!-- /.modal-dialog -->
                                                            </div>

                                                            @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    </p>
                                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                                    <button type="button" class="btn btn-primary waves-effect waves-light">Send Email</button>
                                                    <button type="button" class="btn btn-primary waves-effect waves-light">Book Meeting</button>
                                                    <button type="button" class="btn btn-primary waves-effect waves-light">Send SMS</button>
                                                    <a href="#"><button type="button" class="btn btn-primary waves-effect waves-light">Assign Task</button></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="panel">
                                <div class="panel-heading bg-dark" style="color:#ffffff ;padding:10px;cursor: move;">Employee With No Team</div>
                                <div class="panel-body">
                                    <div class="card">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-xl-12">
                                                <div class="card-body">
                                                    <h5 class="card-title">Employees with No Team</h5>
                                                    <p class="card-text">
                                                    <div class="row">
                                                        <div class="card-body">
                                                            @foreach($employeeinTeam as $teamMember)
                                                            @if($teamMember->allocated_in_team == "")
                                                            <div class="row" style="padding:10px">
                                                                @if($teamMember->emp_status == 1)
                                                                <div class="col-xl-4">
                                                                    <button class="btn-primary form-control btn-rounded waves-effect waves-light" data-bs-toggle="popover" data-bs-trigger="focus" title="Employee Details" data-bs-content="Status: Active | Position: {{$teamMember->emp_position}} | Employement Type: {{$teamMember->emp_type}} Employee | Salary {{$teamMember->emp_salary}}" data-bs-original-title="Dismissible popover"> <img src="{{asset('backend/assets/images/Teams/WDLogo.png')}}" alt="employee" class="rounded-circle avatar-sm"> {{$teamMember->emp_name}}</button>
                                                                </div>
                                                                @else
                                                                <div class="col-xl-4">
                                                                    <button class="btn-primary form-control btn-rounded waves-effect waves-light" data-bs-toggle="popover" data-bs-trigger="focus" title="Employee Details" data-bs-content="Status: DeActiveted | Position: {{$teamMember->emp_position}} | Employement Type: {{$teamMember->emp_type}} Employee | Salary {{$teamMember->emp_salary}}" data-bs-original-title="Dismissible popover"> <img src="{{asset('backend/assets/images/Teams/WDLogo.png')}}" alt="employee" class="rounded-circle avatar-sm"> {{$teamMember->emp_name}}</button>
                                                                </div>
                                                                @endif
                                                                <div class="col-xl-4">
                                                                    <button class="btn btn-danger form-control btn-rounded waves-effect waves-dark" data-bs-toggle="modal" data-bs-target="#RMFTModal-{{$teamMember->id}}">Remove Employee From Dev Team</button><br>
                                                                </div>
                                                                <div class="col-xl-4">
                                                                    <button class="btn btn-success form-control btn-rounded waves-effect waves-dark" data-bs-toggle="modal" data-bs-target="#RMFTModal-{{$teamMember->id}}">Assign Employee To Another Team</button>
                                                                </div>
                                                                </br>
                                                            </div>
                                                            <div id="RMFTModal-{{$teamMember->id}}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="myModalLabel">Remove {{$teamMember->emp_name}} From Developers Team</h5>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="{{route('accountservices.addToTeam')}}" method="post">
                                                                                <!-- CSRF Token is used for active user session  -->
                                                                                @csrf
                                                                                <!-- NOTE: This token is used to verify the authenticated user -->
                                                                                <input name="id" value="{{$teamMember->id}}" style="display:none" />
                                                                                <h6 for="Employee Type" class="col-xl-12 col-form-label">Need to Assign To Different Team?</h6>
                                                                                <div class="row mb-3">
                                                                                    <div class="col-xl-12">
                                                                                        <select class="form-select" name="teamAllocated" alt="Allocate Team" id="teamAllocated">
                                                                                            <option name="teamAllocated" value="">None</option>
                                                                                            <option name="teamAllocated" value="DTeam">Developer Team</option>
                                                                                            <option name="teamAllocated" value="MTeam">Marketing Team</option>
                                                                                            <option name="teamAllocated" value="STeam">Support Team</option>
                                                                                            <option name="teamAllocated" value="RDTeam">Research & Development Team</option>
                                                                                            <option name="teamAllocated" value="ATeam">Analyst Team</option>
                                                                                        </select>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row mb-3">
                                                                                    <div class="col-sm-10">
                                                                                        <input type="submit" class="btn btn-rounded btn-success" value="Assign"></br></br>
                                                                                    </div>
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <small style="color:red">*You can keep none if you wish to not assing the employee to any team</small>
                                                                        </div>
                                                                    </div><!-- /.modal-content -->
                                                                </div><!-- /.modal-dialog -->
                                                            </div>

                                                            @endif
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                    </p>
                                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                                    <button type="button" class="btn btn-primary waves-effect waves-light">Send Email</button>
                                                    <button type="button" class="btn btn-primary waves-effect waves-light">Book Meeting</button>
                                                    <button type="button" class="btn btn-primary waves-effect waves-light">Send SMS</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-xl-5">
                <div class="card">
                    <div class="card-body text-center">
                        <h2 class="card-title">Analysis</h2>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <ul id="draggablePanelList2" class="list-unstyled">
                            <li class="panel">
                                <div class="panel-heading bg-info " style="color:#ffffff; padding:10px; cursor: move;">Team Progress</div>
                                <div class="panel-body">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Current Projects</h5>
                                            <p class="card-text">ifodjsoidjsfoidsfjiodfsjio</p>
                                            <div>
                                            </div>
                                        </div>
                            </li>
                            <li class="panel">
                                <div class="panel-heading bg-primary " style="color:#ffffff; padding:10px; cursor: move;">Recently Completed Projects</div>
                                <div class="panel-body">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Team Details</h5>
                                            <p class="card-text">ifodjsoidjsfoidsfjiodfsjio</p>
                                            <div>
                                            </div>
                                        </div>
                            </li>
                            <li class="panel">
                                <div class="panel-heading bg-warning " style="color:#ffffff; padding:10px; cursor: move;">Upcoming Projects</div>
                                <div class="panel-body">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Team Details</h5>
                                            <p class="card-text">ifodjsoidjsfoidsfjiodfsjio</p>
                                            <div>
                                            </div>
                                        </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body text-center">
                        <h2 class="card-title">Add OR Remove Teams</h2>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Remove Teams</div>
                        <p class="card-title-desc">Press on Teams to Remove or click on Add New to Add new Team</p>
                        <button type="button" class="btn btn-danger btn-rounded waves-effect waves-light">
                            <img class="img-thumbnail rounded-circle avatar-sm" src="{{asset('backend/assets/images/users/avatar-5.jpg')}}" alt="Card image"> Developers Team
                        </button>&nbsp;&nbsp;
                        <button type="button" class="btn btn-danger btn-rounded waves-effect waves-light">
                            <img class="img-thumbnail rounded-circle avatar-sm" src="{{asset('backend/assets/images/users/avatar-1.jpg')}}" alt="Card image"> R & D Team
                        </button>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-danger btn-rounded waves-effect waves-light">
                            <img class="img-thumbnail rounded-circle avatar-sm" src="{{asset('backend/assets/images/users/avatar-4.jpg')}}" alt="Card image"> Marketing Team
                        </button>&nbsp;&nbsp;
                        <button type="button" class="btn btn-danger btn-rounded waves-effect waves-light">
                            <img class="img-thumbnail rounded-circle avatar-sm" src="{{asset('backend/assets/images/small/img-2.jpg')}}" alt="Card image"> Analyst Team
                        </button>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-danger btn-rounded waves-effect waves-light">
                            <img class="img-thumbnail rounded-circle avatar-sm" src="{{asset('backend/assets/images/users/avatar-3.jpg')}}" alt="Card image"> Support Team
                        </button>&nbsp;&nbsp;
                        <button type="button" class="btn btn-primary btn-rounded waves-effect waves-light" style="padding: 20px;">
                            <i class="fas fa-plus-square"></i> Add New Team
                        </button>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">All Team Managers</h2>
                        <p class="card-title-desc">Click on Manager to View</p>
                        <button type="button" class="btn btn-success btn-rounded waves-effect waves-light">
                            <img class="img-thumbnail rounded-circle avatar-sm" src="{{asset('backend/assets/images/users/avatar-5.jpg')}}" alt="Card image"> Developers Team
                        </button>&nbsp;&nbsp;
                        <button type="button" class="btn btn-success btn-rounded waves-effect waves-light">
                            <img class="img-thumbnail rounded-circle avatar-sm" src="{{asset('backend/assets/images/users/avatar-1.jpg')}}" alt="Card image"> R & D Team
                        </button>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-success btn-rounded waves-effect waves-light">
                            <img class="img-thumbnail rounded-circle avatar-sm" src="{{asset('backend/assets/images/users/avatar-4.jpg')}}" alt="Card image"> Marketing Team
                        </button>&nbsp;&nbsp;
                        <button type="button" class="btn btn-success btn-rounded waves-effect waves-light">
                            <img class="img-thumbnail rounded-circle avatar-sm" src="{{asset('backend/assets/images/small/img-2.jpg')}}" alt="Card image"> Analyst Team
                        </button>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-success btn-rounded waves-effect waves-light">
                            <img class="img-thumbnail rounded-circle avatar-sm" src="{{asset('backend/assets/images/users/avatar-3.jpg')}}" alt="Card image"> Support Team
                        </button>&nbsp;&nbsp;
                        <button type="button" class="btn btn-primary btn-rounded waves-effect waves-light" style="padding: 20px;">
                            <i class="fas fa-plus-square"></i> Add Manager
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

</div>
<script>
    jQuery(function($) {
        var panelList = $('#draggablePanelList');

        panelList.sortable({
            // Only make the .panel-heading child elements support dragging.
            // Omit this to make then entire <li>...</li> draggable.
            handle: '.panel-heading',
            update: function() {
                $('.panel', panelList).each(function(index, elem) {
                    var $listItem = $(elem),
                        newIndex = $listItem.index();

                    // Persist the new indices.
                });
            }
        });
    });

    jQuery(function($) {
        var panelList2 = $('#draggablePanelList2');

        panelList2.sortable({
            // Only make the .panel-heading child elements support dragging.
            // Omit this to make then entire <li>...</li> draggable.
            handle: '.panel-heading',
            update: function() {
                $('.panel', panelList2).each(function(index, elem) {
                    var $listItem = $(elem),
                        newIndex = $listItem.index();

                    // Persist the new indices.
                });
            }
        });
    });
    jQuery(function($) {
        var sidepanelList = $('#draggablePanelList2');

        sidepanelList.sortable({
            // Only make the .panel-heading child elements support dragging.
            // Omit this to make then entire <li>...</li> draggable.
            handle: '.panel-heading',
            update: function() {
                $('.panel', panelList).each(function(index, elem) {
                    var $listItem = $(elem),
                        newIndex = $listItem.index();

                    // Persist the new indices.
                });
            }
        });
    });

    jQuery(function($) {
        var sidepanelList2 = $('#draggablePanelList2');

        sidepanelList2.sortable({
            // Only make the .panel-heading child elements support dragging.
            // Omit this to make then entire <li>...</li> draggable.
            handle: '.panel-heading',
            update: function() {
                $('.panel', panelList2).each(function(index, elem) {
                    var $listItem = $(elem),
                        newIndex = $listItem.index();

                    // Persist the new indices.
                });
            }
        });
    });
</script>
@endsection