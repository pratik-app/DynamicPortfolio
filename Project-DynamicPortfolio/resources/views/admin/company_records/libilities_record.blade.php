@extends('admin.admin_master')
@section('admin')
@php 
$unearnedRevenueData = App\Models\Projects::all();
$totalUnearnedRevenue = 0;

$getallLibilitiesData = App\Models\LibilitiesRecord::all();
$total = 0;
$previousRecord = 0;
@endphp


<!-- Jquery 3.6 -->
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<!-- Google Charts Integration -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Liabilities Records</h4>
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
                                <p class="text-truncate font-size-14 mb-2">Total Liabilities</p>
                                <h4 class="mb-2">
                                    @foreach($getallLibilitiesData as $newData)
                                    @php $previousRecord += (preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $newData->amount)); @endphp
                                    @endforeach
                                <h4>${{$previousRecord}}</h4>        
                                </h4> 
                            </div>
                            <div class="avatar-sm">
                                <span class="avatar-title bg-light text-primary rounded-3">
                                    <i class="fas fa-user-tie font-size-24"></i>
                                </span>
                            </div>
                        </div></br>
                        <a href="#" data-bs-toggle="modal" data-bs-target="#AddNewLibilities"><buttone type="button" class="btn form-control btn-primary">Add Liabilities</buttone></a>
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

                        <h4 class="card-title sm-4">Liabilities Record</h4>
                        <div class="table-responsive">
                            <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                <thead class="table-light">
                                    <tr>
                                        <th>Type of Liabilities</th>
                                        <th style="width: 120px;">Amount</th>
                                        <th>Action</th>
                                    </tr>
                                </thead><!-- end thead -->
                                <tbody>
                                    @foreach($getallLibilitiesData as $data)
                                    
                                    @if($data != null)
                                    
                                        @php $total += (preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $data->amount)); @endphp
                                    
                                    @endif
                                    <tr>    
                                        <td>
                                            <h6 class="mb-0">{{$data->type_of_libilities}}</h6>
                                        </td>
                                        
                                        <td>
                                            {{$data->amount}}
                                        </td>
                                        <td>
                                            <a href="{{route('companyrecord.deleteLibilitiesRecord',['id'=>$data->id])}}"><button class="btn btn-danger" type="button">Delete</button></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <td>
                                            <h6 class="mb-0">Total</h6>
                                        </td>
                                        <td>
                                            ${{$total}}
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
    <div id="AddNewLibilities"class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="myModalLabel">Add New Liabilities Record</h5>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('companyrecord.savenewLibilitiesRecord')}}" method="post">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <select class="form-select" name ="LibilitiesRecord" alt="LibilitiesRecord" required>
                                            <option value="" selected>Please Select Type of Liabilities</option>
                                            <option value="Accounts Payable">Accounts Payable</option>
                                            <option value="Notes Payable">Notes Payable</option>
                                            <option value="Salary Payable">Salary Payable</option>
                                            <option value="Interest Payable">Interest Payable</option>
                                            <option value="Loans Payable"> Loans Payable</option>
                                            <option value="Unearned Revenue"> Unearned Revenue</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <input type="text" id="LibilitiesAmount" name="LibilitiesAmount" placeholder = "Enter the Liabilities Amount" class="form-control" required/>
                                    </div>
                                </div>
                                @foreach($unearnedRevenueData as $newAmount)
                                    @php $totalUnearnedRevenue += (preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $newAmount->projectPrice))@endphp
                                @endforeach
                                <div class="row mb-3">
                                    <div class="col-sm-10">
                                        <input type="text" id="UnearnedRevenueVal" name="UnearnedRevenue" value="${{$totalUnearnedRevenue}}"  class="form-control" readonly/>
                                    </div>
                                </div>
                                
                                <input class="btn btn-primary" name="AddThisRecord" type="submit" value="Add This Record"/>
                            </form>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
        </div>
    </div>
    <script>
        $("#UnearnedRevenueVal").hide()
        $("#LibilitiesAmount").hide()
        $(".form-select").on('change', function(){
            if($(".form-select").val() == 'Unearned Revenue')
            {
                $("#LibilitiesAmount").val('$0')
                $("#LibilitiesAmount").hide()
                $("#UnearnedRevenueVal").show()
            }
            else
            {
                $("#LibilitiesAmount").show()
                $("#UnearnedRevenueVal").hide()
            }
        })
        
    </script>
    @endsection
    