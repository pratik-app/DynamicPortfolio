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
                                                <div class="modal-dialog modal-xl">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="myModalLabel">Generate Payroll for {{$employees->emp_name}}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="#" method="post">
                                                                <!-- CSRF Token is used for active user session  -->
                                                                @csrf
                                                                <!-- NOTE: This token is used to verify the authenticated user -->
                                                                <input name="id" value="{{$employees->id}}" style="display:none" />
                                                                <h6 for="Employee Type" class="col-xl-12 col-form-label">Add Details</h6>
                                                                <div class="row mb-3">
                                                                    <div class="col-xl-12">
                                                                        <select class="form-select" name="provinceSelection" alt="Allocate Team" id="teamAllocated" required>
                                                                            <option name="provinceSelection" value="">Select Province For Tax</option>
                                                                            <option name="provinceSelection" value="Alberta">Alberta</option>
                                                                            <option name="provinceSelection" value="British Columbia">British Columbia</option>
                                                                            <option name="provinceSelection" value="Manitoba">Manitoba</option>
                                                                            <option name="provinceSelection" value="New Brunswick">New Brunswick</option>
                                                                            <option name="provinceSelection" value="Newfoundland and Labrador">Newfoundland and Labrador</option>
                                                                            <option name="provinceSelection" value="Northwest Territories">Northwest Territories</option>
                                                                            <option name="provinceSelection" value="Nova Scotia">Nova Scotia</option>
                                                                            <option name="provinceSelection" value="Nunavut">Nunavut</option>
                                                                            <option name="provinceSelection" value="Ontario">Ontario</option>
                                                                            <option name="provinceSelection" value="British Columbia">British Columbia</option>
                                                                            <option name="provinceSelection" value="Prince Edward Island">Prince Edward Island</option>
                                                                            <option name="provinceSelection" value="Saskatchewan">Saskatchewan</option>
                                                                            <option name="provinceSelection" value="Yukon">Yukon</option>
                                                                            <option name="provinceSelection" value="Quebec">Quebec</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="Employee Name" class="col-sm-2 col-form-label">Employee Name</label>
                                                                    <div class="col-xl-4">
                                                                        <input class="form-control" name = "empName" alt="Employee Name" type="text" value="{{$employees->emp_name}}" readonly/>
                                                                    </div>
                                                                    <label for="Employee Postion" class="col-sm-2 col-form-label">Employee Postion</label>
                                                                    <div class="col-xl-4">
                                                                    <input class="form-control" name = "empPosition" alt="Employee Position" type="text" value="{{$employees->emp_position}}" readonly/>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="Employee Salary" class="col-sm-2 col-form-label">Employee Salary</label>
                                                                    <div class="col-xl-4">
                                                                        <input class="form-control" name = "empSalary" alt="Employee Salary" type="text" value="{{$employees->emp_salary}}" readonly/>
                                                                    </div>
                                                                    <label for="Employee Address" class="col-sm-2 col-form-label">Employee Address</label>
                                                                    <div class="col-xl-4">
                                                                        <input class="form-control" name = "empAddress" alt="Employee Address" type="text" value="{{$employees->emp_address}}" readonly/>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="Employee Mobile" class="col-sm-2 col-form-label">Employee Mobile No.</label>
                                                                    <div class="col-xl-4">
                                                                        <input class="form-control" name = "empMobile" alt="Employee Mobile No" type="text" value="{{$employees->emp_mobile}}" readonly/>
                                                                    </div>
                                                                    <label for="Employee Email" class="col-sm-2 col-form-label">Employee Email Address</label>
                                                                    <div class="col-xl-4">
                                                                        <input class="form-control" name = "empEmail" alt="Employee Email" type="text" value="{{$employees->emp_email}}" readonly/>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="Employee EI Deduction" class="col-sm-2 col-form-label">Employee EI Deduction</label>
                                                                    <div class="col-xl-4">
                                                                        <input  name = "empEIDeduction" class="form-control" alt="Employee Ei Deduction" type="text" value="1.58%" readonly/>
                                                                    </div>
                                                                    <label for="Employee CPP Contribution" class="col-sm-2 col-form-label">Employee CPP Contribution</label>
                                                                    <div class="col-xl-4">
                                                                        <input  name = "empCPPContribution" class="form-control" alt="Employee Worked Hours" type="text" value="5.45%" readonly/>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <label for="Employee Sin Number" class="col-sm-2 col-form-label">Employee SIN Number</label>
                                                                    <div class="col-xl-4">
                                                                        <input class="form-control" name = "empSIN" alt="Employee SIN Number" type="text" required/>
                                                                    </div>
                                                                    <label for="Employee Work Hours" class="col-sm-2 col-form-label">Employee Worked Hours</label>
                                                                    <div class="col-xl-4">
                                                                        <input class="form-control" name = "empWorkedHours" alt="Employee Worked Hours" type="text" required/>
                                                                    </div>
                                                                </div>
                                                                <div class="row mb-3">
                                                                    <div class="col-xl-6">
                                                                        <select class="form-select" name="paymentMethod" alt="Payment Method" id="PaymentMethod" required>
                                                                            <option name="provinceSelection" value="">Select Payment Method</option>
                                                                            <option name="provinceSelection" value="Cheque">Cheque</option>
                                                                        </select>
                                                                    </div>
                                                                    <label for="Cheque Number" class="col-sm-2 col-form-label">Cheque Number*</label>
                                                                    <div class="col-xl-4">
                                                                        <input class="form-control" name = "chequeNumber" alt="Payment Cheque Number" type="text" required/>
                                                                    </div>
                                                                </div>
                                                                @if($employees->emp_status == '1')
                                                                <div class="row mb-3">
                                                                    <label for="Employee Status" class="col-sm-2 col-form-label">Employee Status</label>
                                                                    <div class="col-xl-4">
                                                                        <input class="form-control" alt="Employee SIN Number" type="text" value="Active" readonly/>
                                                                    </div>
                                                                    <div class="col-xl-4">
                                                                        <input type="submit" class="btn btn-rounded btn-success" value="Generate Payroll"></br></br>
                                                                    </div>
                                                                </div>
                                                                @else
                                                                <div class="row mb-3">
                                                                    <div class="col-sm-10">
                                                                        <input type="submit" class="btn btn-rounded btn-success" value="Generate Payroll" disabled></br></br>
                                                                    </div>
                                                                </div>
                                                                @endif
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <small style="color:red">*IF Employee is not Active you Can't Generate payroll</small>
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
    