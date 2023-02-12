@extends('admin.admin_master')
@section('admin')
<!-- Jquery 3.6 -->
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<!-- Google Charts Integration -->
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Employees Desk</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" style="padding:20px">
                                <!-- item-->
                                <a href="{{route('accountservices.addnewEmp')}}" class="dropdown-item">Add/Update Employee</a>
                                <!-- item-->
                                <a href="{{route('accountservices.exportEmp')}}" class="dropdown-item">Export All Employees Record</a>
                            </div>
                        </div>
                        <h4 class="card-title mb-4">Employement Details</h4>
                        <div class="table-responsive">
                            <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                <thead class="table-light">
                                    <tr>
                                        <th>Employee Name</th>
                                        <th>Employee Positions</th>
                                        <th>Employee Address</th>
                                        <th>Employee Mobile</th>
                                        <th>Employee Email</th>
                                        <th>Employee Type</th>
                                        <th>Employment Letter</th>
                                        <th>Employee Work Authorization</th>
                                        <th>Employee Work Authorization Copy</th>
                                        <th>Employee experience</th>
                                        <th>Employee Salary</th>
                                        <th>Employee Start Date</th>
                                        <th>Empoyee Status</th>
                                        <th>Empoyee Created ON </th>
                                        <th></th>
                                    </tr>
                                </thead><!-- end thead -->
                                <tbody>
                                    @foreach($allempRecord as $record)
                                    <tr style="cursor: pointer;">
                                        <td style="display:none">{{$record->id}}</td>
                                        <td>
                                            <h6 class="mb-0">{{$record->emp_name}}</h6>
                                        </td>
                                        <td>{{$record->emp_position}}</td>
                                        <td>{{$record->emp_address}}</td>
                                        <td>{{$record->emp_mobile}}</td>
                                        <td>{{$record->emp_email}}</td>
                                        <td>{{$record->emp_type}}</td>
                                        <td>{{$record->emp_letter}}</td>
                                        <td>{{$record->emp_work_permit}}</td>
                                        <td><a href="{{(!empty($record->emp_work_proof))? url($record->emp_work_proof):url('upload/no_image.jpg')}}"><img class="rounded-circle avatar-xl" src="{{(!empty($record->emp_work_proof))? url($record->emp_work_proof):url('upload/no_image.jpg')}}"/></a></td>
                                        <td>{{$record->emp_experience}}</td>
                                        <td>{{$record->emp_salary}}</td>
                                        <td>{{$record->emp_start_date}}</td>
                                        
                                        @if($record->emp_status === 1)
                                            <td><div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active</div></td>
                                        @else
                                            <td><div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-warning align-middle me-2"></i>Deactive</div></td>
                                        @endif
                                        <td>{{$record->created_at}}</td>
                                        <td>
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end" style="padding:20px">
                                                <!-- item-->
                                                <a href="#" class="dropdown-item">Add This Employee to Team</a>
                                                <!-- item-->
                                                <a href="{{route('accountservices.downloadEmpContract',['empName' =>$record->emp_name])}}" class="dropdown-item">Download/View Contract</a>
                                            </div>
                                        </div>
                                        </td>
                                    </tr>
                                    
                                    @endforeach
                                    
                                    <!-- end -->
                                </tbody><!-- end tbody -->
                            </table> <!-- end table -->
                            
                                    
                            
                        </div>
                    </div><!-- end card -->
                </div><!-- end card -->
            </div>



        </div><!-- end row -->
    </div>

    @endsection