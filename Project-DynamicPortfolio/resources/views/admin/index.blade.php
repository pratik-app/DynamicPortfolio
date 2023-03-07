@extends('admin.admin_master')
@section('admin')
@php
    $projects = App\Models\Projects::all();
    $totalSales = 0;
    $totalNewLeads = App\Models\LeadStat::where('lead_action', '=', 'Fresh Lead')->count();
    $totalIncome = 0;
    $totalExpense = 0;
    $incomesource = App\Models\IncomeRecord::all();
    $expensesource = App\Models\ExpenseRecord::all();
    $investmentsource = App\Models\InvestmentRecord::all();
    $otherSourceIncome = 0;
    $totalInvestment = 0;
@endphp
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div class="page-content">
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Dashboard</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Upcube</a></li>
                                            <li class="breadcrumb-item active">Dashboard</li>
                                        </ol>
                                    </div>

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
                                                <p class="text-truncate font-size-14 mb-2">Total Sales</p>
                                                    @foreach($projects as $sales)
                                                        @php $totalSales += preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $sales->projectPrice)@endphp
                                                    @endforeach
                                                <h4 class="mb-2">${{$totalSales}}</h4>
                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-primary rounded-3">
                                                    <i class="ri-shopping-cart-2-line font-size-24"></i>  
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
                                                <p class="text-truncate font-size-14 mb-2">New Leads</p>
                                                <h4 class="mb-2">{{$totalNewLeads}}</h4>
                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-primary rounded-3">
                                                    <i class="ri-user-3-line font-size-24"></i>  
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
                                                <p class="text-truncate font-size-14 mb-2">Total Income</p>
                                                @foreach($incomesource as $incomeAmount)
                                                @php $totalIncome += preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $incomeAmount->amount) ;@endphp
                                                @endforeach
                                                <h4 class="mb-2">${{$totalIncome}}</h4>
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
                                                <p class="text-truncate font-size-14 mb-2">Total Expense</p>
                                                @foreach($expensesource as $expenseamount)
                                                @php $totalExpense += preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $expenseamount->amount) ;@endphp 
                                                @endforeach
                                                <h4 class="mb-2">${{$totalExpense}}</h4>
                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-success rounded-3">
                                                    <i class="mdi mdi-currency-btc font-size-24"></i>  
                                                </span>
                                            </div>
                                        </div>                                              
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                        </div><!-- end row -->

                        
                        <!-- end row -->
    
                        <div class="row">
                            <div class="col-xl-8">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Latest Projects</h4>
    
                                        <div class="table-responsive">
                                            <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Project Price</th>
                                                        <th>Project Dead Line</th>
                                                        <th>Project Assigned To</th>
                                                        <th>Project Status</th>
                                                        
                                                    </tr>
                                                </thead><!-- end thead -->
                                                <tbody>
                                                    @foreach($projects as $details)
                                                    <tr>
                                                        <td>{{$details->projectName}}</td>
                                                        <td>{{$details->projectPrice}}</td>
                                                        <td>{{$details->projectDeadLine}}</td>
                                                        <td>{{$details->projectAssignedTo}}</td>
                                                        @if($details->project_status == 1)
                                                        <td><div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-success align-middle me-2"></i>Active</div></td>
                                                        @else
                                                        <td><div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 text-warning align-middle me-2"></i>Deactive</div></td>
                                                        @endif
                                                    </tr>
                                                    @endforeach
                                                     <!-- end -->
                                                     
                                                     <!-- end -->
                                                </tbody><!-- end tbody -->
                                            </table> <!-- end table -->
                                        </div>
                                    </div><!-- end card -->
                                </div><!-- end card -->
                            </div>
                            <!-- end col -->
                            <div class="col-xl-4">
                                <div class="card">
                                    <div class="card-body">
                                        
                                        <h4 class="card-title mb-4">Earnings</h4>
                                        
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="text-center mt-4">
                                                    <h5>${{$totalSales}}</h5>
                                                    <p class="mb-2 text-truncate">Projects Earnings</p>
                                                </div>
                                            </div>
                                            <!-- end col -->
                                            <div class="col-4">
                                                <div class="text-center mt-4">
                                                    @foreach($incomesource as $incomeRecord)
                                                    @if($incomeRecord->type_of_income != "Sales Income")
                                                    @php $otherSourceIncome +=  preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $incomeRecord->amount) ;@endphp 
                                                    @endif
                                                    @endforeach
                                                    <h5>${{$otherSourceIncome}}</h5>
                                                    <p class="mb-2 text-truncate">Other Earnings</p>
                                                </div>
                                            </div>
                                            <!-- end col -->
                                            <div class="col-4">
                                                <div class="text-center mt-4">
                                                    @foreach($investmentsource as $investedamount)
                                                    @php $totalInvestment +=  preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $investedamount->amount) ;@endphp 
                                                    @endforeach
                                                    <h5>${{$totalInvestment}}</h5>
                                                    <p class="mb-2 text-truncate">Total InvestMent</p>
                                                </div>
                                            </div>
                                            <!-- end col -->
                                        </div>
                                        <!-- end row -->

                                        <div class="mt-4">
                                            <div id= "chart_div"  style="width:100%; height:100%"></div>
                                        </div>
                                    </div>
                                </div><!-- end card -->
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->
                    </div>
                    
                </div>
                <script type="text/javascript">
                    google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Sales', 'Expenses'],
          ['2013',  1000,      400],
          ['2014',  1170,      460],
          ['2015',  660,       1120],
          ['2016',  1030,      540]
        ]);

        var options = {
          title: 'Company Performance',
          hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }

                </script>
                @endsection