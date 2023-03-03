@extends('admin.admin_master')
@section('admin')

<!-- Jquery 3.6 -->
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<!-- Google Charts Integration -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Expense Records</h4>
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
                                <p class="text-truncate font-size-14 mb-2">Total Business Expense</p>
                                <h4 class="mb-2">
                                <h4 ></h4>        
                                </h4> 
                                <p class="text-muted mb-0"><span class="text-success fw-bold font-size-12 me-2"><i class="ri-arrow-right-up-line me-1 align-middle"></i>9.23%</span>from previous period</p>
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-primary rounded-3">
                                    <i class="fas fa-user-tie font-size-24"></i>
                                </span>
                            </div>
                        </div></br>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#AddNewExpense"><buttone type="button" class="btn form-control btn-primary">Add Another Expenses</buttone></a>
                    </div><!-- end cardbody -->
                </div><!-- end card -->
            </div><!-- end col -->
            <div class="col-xl-4">
                <div class="card" id = "ShowTeams">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" id="DisplayEmployees" class="dropdown-item">Download Excel Sheet</a>
                                <!-- item-->
                            </div>
                        </div>

                        <h4 class="card-title sm-4">Expense Record</h4>

                        <div class="table-responsive">
                            <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                <thead class="table-light">
                                    <tr>
                                        <th>Type of Expense</th>
                                        <th style="width: 120px;">Amount</th>
                                    </tr>
                                </thead><!-- end thead -->
                                <tbody>
                                    <tr>    
                                        <td>
                                            <h6 class="mb-0">Expense from Business</h6>
                                        </td>
                                        
                                        <td>
                                            $250000
                                        </td>
                                    </tr>
                                    
                                    <!-- end -->
                                </tbody><!-- end tbody -->
                            </table> <!-- end table -->
                        </div>
                    </div><!-- end card -->
                </div>
                
                <!-- end card -->
            </div>
            


        </div><!-- end row -->
    </div>
    <div id="AddNewExpense"class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel">Add New Expense Record</h5>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <select class="form-select" name = "ExpenseRecord" alt="ExpenseRecord" required>
                                            <option name="JobLocation" value="" selected>Please Select Type of Expense</option>
                                            <option name="JobLocation" value="SalesExpense">Sales Expense</option>
                                            <option name="JobLocation" value="InterestExpense"> Interest Expense</option>
                                            <option name="JobLocation" value="RentalExpense"> Rental Expense</option>
                                            <option name="JobLocation" value="DividendExpense"> Dividend Expense</option>
                                            <option name="JobLocation" value="CapitalGains"> Capital Gains</option>
                                            <option name="JobLocation" value="RoyaltyExpense"> Royalty Expense</option>
                                            <option name="JobLocation" value="CommissionExpense"> Commission Expense</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <input type="text" name="BusinessExpense" class="form-control" value="$0" readonly/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <input type="text" name="otherExpenseAmount" class="form-control"/>
                                    </div>
                                </div>
                                <input class="btn btn-primary" type="sumbit" name="AddThisRecord" value="Add This Record">
                            </form>
                        </div>
                        <div class="modal-footer">
                            <small style="color:red">To Update your Expense Record of Business select Sales Expense and submit</small>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
        </div>
    </div>
    @endsection
    