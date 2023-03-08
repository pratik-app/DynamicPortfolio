@extends('admin.admin_master')
@section('admin')
@php
$projectlist = App\Models\Projects::all();
@endphp
@php
    $totalCost = 0;
    $earnings = 0;
    $outstanding = 0;
@endphp
@foreach($projectlist as $salary)
    
    @php
    $totalCost += (int)filter_var($salary->projectPrice, FILTER_SANITIZE_NUMBER_INT);
    $earnings += (int)filter_var($salary->projectAdvancePaymentAmount, FILTER_SANITIZE_NUMBER_INT);
    $outstanding += (int)filter_var($salary->client_outstandingAmount, FILTER_SANITIZE_NUMBER_INT);
    @endphp
    
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
                ['Total Project Cost', <?= $totalCost ?>],
                ['Total Earnings', <?= $earnings ?>],
                ['Total Outstandings', <?= $outstanding ?>]
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
                    <h4 class="mb-sm-0">Project Hub</h4>
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
                                <p class="text-truncate font-size-14 mb-2">Total Projects</p>
                                <h4 class="mb-2">
                                <h4 >{{$projectlist->count()}}</h4>        
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
                                <p class="text-truncate font-size-14 mb-2">Total Cost of Projects</p>
                                <h4 class="mb-2">
                                    
                                   ${{$totalCost}}
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
                                <p class="text-truncate font-size-14 mb-2">Total Outstanding</p>
                                <h4 class="mb-2">${{$outstanding}}</h4>
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
                                <p class="text-truncate font-size-14 mb-2">Total Earnings</p>
                                <h4 class="mb-2">${{$earnings}}</h4>
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
                                <a href="{{route('projects.downloadProjectsRecord')}}" class="dropdown-item">Download ExcelSheet</a>
                                
                            </div>
                        </div>

                        <h4 class="card-title mb-4">All Projects</h4>

                        <div class="table-responsive">
                            <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                <thead class="table-light">
                                    <tr>
                                        <th>Project ID</th>
                                        <th>Client ID</th>
                                        <th>Client Name</th>
                                        <th>Client Email</th>
                                        <th>Client Mobile</th>
                                        <th>Project Name</th>
                                        <th>Project DeadLine</th>
                                        <th>Project Status</th>
                                        <th style="width: 120px;">Project Price</th>
                                        <th style="width: 120px;">Advance Payment Amount</th>
                                        <th style="width: 120px;">OutStanding Amount</th>
                                    </tr>
                                </thead><!-- end thead -->
                                <tbody>
                                    @foreach($projectsData as $project)
                                    <tr>
                                        <td>
                                            {{$project->projectID}}
                                        </td>
                                        <td>
                                            {{$project->client_ID}}
                                        </td>
                                        <td>
                                            {{$project->clientName}}
                                        </td>
                                        
                                        <td>
                                            {{$project->clientEmail}}
                                        </td>
                                        
                                        <td>
                                            {{$project->clientMobile}}
                                        </td>    
                                        <td>
                                            <h6 class="mb-0">{{$project->projectName}}</h6>
                                        </td>
                                        <td>{{$project->projectDeadLine}}</td>
                                        <td>
                                            @if($project->project_status == 1)
                                            <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active Project</div>
                                            @else
                                            <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-warning align-middle me-2"></i>Not Activated</div>
                                            @endif
                                        </td>
                                        <td>{{$project->projectPrice}}</td>
                                        <td>{{$project->projectAdvancePaymentAmount}}</td>
                                        <td>{{$project->client_outstandingAmount}}</td>

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
                        <h4 class="card-title mb-4">Projects Portfolio</h4>

                        <div class="row">
                            <div class="col-4">
                                <div class="text-center mt-4">
                                    <h5>${{$totalCost}}</h5>
                                    <p class="mb-2 text-truncate">Total Projects Cost</p>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-4">
                                <div class="text-center mt-4">
                                    <h5>${{$earnings}}</h5>
                                    <p class="mb-2 text-truncate">Total Earnings </p>
                                </div>
                            </div>
                            <!-- end col -->
                            <div class="col-4">
                                <div class="text-center mt-4">
                                    <h5>${{$outstanding}}</h5>
                                    <p class="mb-2 text-truncate">Total Outstanding</p>
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
    