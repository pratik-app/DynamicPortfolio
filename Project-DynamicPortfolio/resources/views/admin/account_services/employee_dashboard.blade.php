@extends('admin.admin_master')
@section('admin')
<!-- Jquery 3.6 -->
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Profit Calculator'],
          ['Total Spent on Employees',     5000],
          ['Total Earnings',      10000],
          ['Profit', 5000]
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
                <h4 class="mb-sm-0">Employees Dashboard</h4>
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
                            <h4 class="mb-2">1452</h4>
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
                            <p class="text-truncate font-size-14 mb-2">Total Cost of Employees</p>
                            <h4 class="mb-2">938</h4>
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
                            <p class="text-truncate font-size-14 mb-2">Total Project Completed</p>
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
                                <div class="card">
                                    <div class="card-body">
                                        <div class="dropdown float-end">
                                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end">
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
    
                                        <h4 class="card-title mb-4">Employement Details</h4>
    
                                        <div class="table-responsive">
                                            <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Managemnet Team</th>
                                                        <th>Positions</th>
                                                        <th>Status</th>
                                                        <th>Age</th>
                                                        <th>Start date</th>
                                                        <th style="width: 120px;">Salary</th>
                                                    </tr>
                                                </thead><!-- end thead -->
                                                <tbody>
                                                    <tr>
                                                        <td><h6 class="mb-0">Charles Casey</h6></td>
                                                        <td>Web Developer</td>
                                                        <td>
                                                            <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active</div>
                                                        </td>
                                                        <td>
                                                            23
                                                        </td>
                                                        <td>
                                                            04 Apr, 2021
                                                        </td>
                                                        <td>$42,450</td>
                                                    </tr>
                                                     <!-- end -->
                                                     <tr>
                                                        <td><h6 class="mb-0">Alex Adams</h6></td>
                                                        <td>Python Developer</td>
                                                        <td>
                                                            <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-warning align-middle me-2"></i>Deactive</div>
                                                        </td>
                                                        <td>
                                                            28
                                                        </td>
                                                        <td>
                                                            01 Aug, 2021
                                                        </td>
                                                        <td>$25,060</td>
                                                    </tr>
                                                     <!-- end -->
                                                     <tr>
                                                        <td><h6 class="mb-0">Prezy Kelsey</h6></td>
                                                        <td>Senior Javascript Developer</td>
                                                        <td>
                                                            <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active</div>
                                                        </td>
                                                        <td>
                                                            35
                                                        </td>
                                                        <td>
                                                            15 Jun, 2021
                                                        </td>
                                                        <td>$59,350</td>
                                                    </tr>
                                                     <!-- end -->
                                                     <tr>
                                                        <td><h6 class="mb-0">Ruhi Fancher</h6></td>
                                                        <td>React Developer</td>
                                                        <td>
                                                            <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active</div>
                                                        </td>
                                                        <td>
                                                            25
                                                        </td>
                                                        <td>
                                                            01 March, 2021
                                                        </td>
                                                        <td>$23,700</td>
                                                    </tr>
                                                     <!-- end -->
                                                     <tr>
                                                        <td><h6 class="mb-0">Juliet Pineda</h6></td>
                                                        <td>Senior Web Designer</td>
                                                        <td>
                                                            <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active</div>
                                                        </td>
                                                        <td>
                                                            38
                                                        </td>
                                                        <td>
                                                            01 Jan, 2021
                                                        </td>
                                                        <td>$69,185</td>
                                                    </tr>
                                                     <!-- end -->
                                                     <tr>
                                                        <td><h6 class="mb-0">Den Simpson</h6></td>
                                                        <td>Web Designer</td>
                                                        <td>
                                                            <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-warning align-middle me-2"></i>Deactive</div>
                                                        </td>
                                                        <td>
                                                            21
                                                        </td>
                                                        <td>
                                                            01 Sep, 2021
                                                        </td>
                                                        <td>$37,845</td>
                                                    </tr>
                                                     <!-- end -->
                                                     <tr>
                                                        <td><h6 class="mb-0">Mahek Torres</h6></td>
                                                        <td>Senior Laravel Developer</td>
                                                        <td>
                                                            <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active</div>
                                                        </td>
                                                        <td>
                                                            32
                                                        </td>
                                                        <td>
                                                            20 May, 2021
                                                        </td>
                                                        <td>$55,100</td>
                                                    </tr>
                                                     <!-- end -->
                                                </tbody><!-- end tbody -->
                                            </table> <!-- end table -->
                                        </div>
                                    </div><!-- end card -->
                                </div><!-- end card -->
                            </div>
        <div class="col-xl-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Profit from Employees</h4>
                    
                    <div class="row">
                        <div class="col-4">
                            <div class="text-center mt-4">
                                <h5>3475</h5>
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