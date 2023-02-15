@extends('admin.admin_master')
@section('admin')
@php
$listAllUsers = App\Models\ASC\EmpRecord::all();
@endphp
@php
    $newSalary = 0;
@endphp
@foreach($listAllUsers as $salary)
    @if($salary->emp_status != 0 )
    @php
    $newSalary += (int)filter_var($salary->emp_salary, FILTER_SANITIZE_NUMBER_INT)
    @endphp
    @endif
@endforeach

<!-- Jquery 3.6 -->
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<!-- Google Charts Integration -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Task', 'Profit Calculator'],
                ['Total Spent on Employees', <?= $newSalary ?>],
                ['Total Earnings', 1000000],
                ['Profit', 105000]
            ]);

            var options = {
                chartArea: {
                    height: '100%',
                    width: '100%',

                },
                is3D: true,
                legend: 'none',
                pieHole: 0.4
            };

            var chart = new google.visualization.PieChart(document.getElementById('pieChart'));

            chart.draw(data, options);
        }
    </script>

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Payroll Dashboard</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2">Total Employees</p>
                                <h4 class="mb-2">
                                <h4 >{{$listAllUsers->count()}}</h4>        
                                </h4> 
                                <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>9.23%</span>from previous period</p>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-primary rounded-3">
                                    <i class="fas fa-user-tie font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2">Total spent on Employees</p>
                                <h4 class="mb-2">
                                    
                                    {{$newSalary}}
                                </h4>
                                <p class="text-muted mb-0"><span class="text-danger fw-bold font-size-12 me-2"><i class="ri-arrow-right-down-line me-1 align-middle"></i>1.09%</span>from previous period</p>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-success rounded-3">
                                    <i class="mdi mdi-currency-usd font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2">Total Payroll Created</p>
                                <h4 class="mb-2">8246</h4>
                                <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>16.2%</span>from previous period</p>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-primary rounded-3">
                                    <i class="fas fa-tasks font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="text-truncate font-size-14 mb-2">Total Earnings by Employees</p>
                                <h4 class="mb-2">29670</h4>
                                <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>11.7%</span>from previous period</p>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-success rounded-3">
                                    <i class="fas fa-search-dollar font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->
            <div class="col-xl-8">
                <div class="card" id = "ShowTeams">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" id="DisplayEmployees" class="dropdown-item">Employes</a>
                                <!-- item-->
                                <a href="javascript:void(0);" id="DisplayTeams" class="dropdown-item">Teams</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Sales Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Export Report</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Profit</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                            </div>
                        </div>

                        <h4 class="card-title mb-4">Employees</h4>

                        <div class="table-responsive">
                            <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                <thead class="table-light">
                                    <tr>
                                        <th>Employee Name</th>
                                        <th>Employee Position</th>
                                        <th>Employee Status</th>
                                        <th>Start date</th>
                                        <th style="width: 120px;">Salary</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead><!-- end thead -->
                                <tbody>
                                    @foreach($listAllUsers as $employees)
                                    <tr>    
                                        <td>
                                            <h6 class="mb-0">{{$employees->emp_name}}</h6>
                                        </td>
                                        <td>{{$employees->emp_position}}</td>
                                        <td>
                                            @if($employees->emp_status == 1)
                                            <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active</div>
                                            @else
                                            <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-warning align-middle me-2"></i>Deactive</div>
                                            @endif
                                        </td>
                                        <td>
                                            {{$employees->emp_start_date}}
                                        </td>
                                        <td>{{$employees->emp_salary}}</td>
                                        <td>
                                            <div class="dropdown float-end">
                                                <a href="#" class="dropdown-toggle arrow-none card-drop hide" data-bs-toggle="dropdown">
                                                    <i class="mdi mdi-dots-vertical"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <!-- item-->
                                                    <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#CreatePayRoll-{{$employees->id}}">Create Payroll</a>
                                                    <!-- item -->
                                                    <a href="#" class="dropdown-item">Add Sin Number</a>
                                                    <!-- item-->
                                                    <a href="#" class="dropdown-item">Add Direct Deposit</a>
                                                    <!-- item -->
                                                    <a href="#" class="dropdown-item">Add Benifits</a>
                                                    <!-- item -->
                                                    <a href="#" class="dropdown-item">Add Number of Working Hours</a>
                                                    <!-- item -->
                                                    <a href="#" class="dropdown-item">Add Bonus rate</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div id="CreatePayRoll-{{$employees->id}}" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myModalLabel">Remove {{$employees->emp_name}} From Developers Team</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="#" method="post">
                                                                <!-- CSRF Token is used for active user session  -->
                                                                @csrf
                                                                <!-- NOTE: This token is used to verify the authenticated user -->
                                                                <input name="id" value="{{$employees->id}}" style="display:block" />
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
                                                                        <input type="submit" class="btn btn-rounded btn-success" value="Generate Payroll"></br></br>
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
                                        </td>
                                                            
                                    </tr>
                                    @endforeach
                                    <!-- end -->
                                </tbody><!-- end tbody -->
                            </table> <!-- end table -->
                        </div>
                    </div><!-- end card -->
                </div>
                
                <!-- end card -->
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">View Pay Roll</h4>

                        <div class="row">
                            <div class="col-4">
                                <div class="text-center mt-4">
                                    <h5>{{$newSalary}}</h5>
                                    <p class="mb-2 text-truncate">Spent on Employees</p>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-4">
                                <div class="text-center mt-4">
                                    <h5>458</h5>
                                    <p class="mb-2 text-truncate">Total Earnings</p>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-4">
                                <div class="text-center mt-4">
                                    <h5>25%</h5>
                                    <p class="mb-2 text-truncate">Total Profit</p>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->


                    </div>
                    <div class="mt-4" style="position: relative;">

                        <div id="pieChart" calss="text-center" style="width:100%;min-height: 264.7px;"></div>

                    </div>
                </div><!-- end card -->

            </div><!-- end col -->


        </div><!-- end row -->
    </div>

    @endsection
    