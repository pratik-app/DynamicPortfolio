<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Account Summary</title>
</head>
<body>
    @php 
    $totalExpense = 0; 
    $totalIncome = 0;
    $totalOutstanding = 0;
    $officeEquipment = 0;
    $officeFurniture = 0;
    $buildingCost = 0;
    $totalAssets = 0;
    @endphp
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Account Summary</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="invoice-title">
            <h4 class="float-end font-size-16"><strong></strong></h4>
            <h3>
                Income Statement & Balance Sheet of Company
            </h3>
        </div>
        <hr>
        <table class="table" style="border-spacing: 15px;">
            <tr>
                <td>
                    <h3>Income Statement</h3>
                    <hr style="width:30%; margin:0px">
                    <table class="table table-responsive" >
                        <tbody>
                            <tr>
                                <td style="border-bottom: 2px solid #000;"><h3>Revenue</h3></td>
                            </tr>
                            <tr>
                                <td>
                                    <table>
                                        @foreach($incomeRecordData as $incomeRecord)
                                        @php $totalIncome += preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $incomeRecord->amount) ;@endphp
                                        <tr>
                                            <td>{{$incomeRecord->type_of_income}}</td>
                                            <td>{{$incomeRecord->amount}}</td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="border-bottom: 2px solid #000;"><h3>Operating Expense</h3></td>
                            </tr>
                            <tr>
                                <td>
                                    <table>
                                        @foreach($expenseRecordData as $expenseRecord)

                                        @php $totalExpense += preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $expenseRecord->amount) ;@endphp
                                        <tr>
                                            <td>{{$expenseRecord->type_of_expense}}</td>
                                            <td>{{$expenseRecord->amount}}</td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px solid #000;"><h3> Net Income</h6></td>
                                <td> ${{$totalIncome - $totalExpense}}</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td> 
                    <h3>Balance Sheet</h3>
                    <hr style="width:30%; margin:0px">
                    <table class="table table-responsive" >
                        <tbody>
                            <tr>
                                <td style="border-bottom: 2px solid #000;"><h3>Assets</h3></td>
                            </tr>
                            <tr>
                                <td>
                                    <table>
                                        
                                        @foreach($projectOutstandings as $outstanding)
                                            @php $totalOutstanding += preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $outstanding->client_outstandingAmount) ;@endphp
                                        @endforeach
                                        <tr>
                                            <td>Account Receivable</td>
                                            <td>$ {{$totalOutstanding}}</td>
                                            @php $totalAssets += $totalOutstanding ;@endphp
                                        </tr>
                                        @foreach($expenseRecordData as $expenseRecord)
                                            @if($expenseRecord->type_of_expense == 'Insurance Expense')
                                                @php $totalAssets += preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $expenseRecord->amount) ;@endphp
                                                <tr>
                                                    <td>Prepaid Insurance</td>
                                                    <td>{{$expenseRecord->amount}}</td>
                                                </tr>
                                            @endif
                                            @if($expenseRecord->type_of_expense == 'Rent Expense')
                                            @php $totalAssets += preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $expenseRecord->amount) ;@endphp
                                            <tr>
                                                <td>Prepaid Rent</td>
                                                <td>{{$expenseRecord->amount}}</td>
                                            </tr>
                                            @endif
                                        @endforeach
                                        <tr>
                                            <td>Merchandise Inventory</td>
                                            <td>Not Applicable (N/A)</td>
                                        </tr>
                                        @foreach($expenseRecordData as $expenseRecord)
                                            @if($expenseRecord->type_of_expense == 'Office Supplies Expense')
                                                @php $totalAssets += preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $expenseRecord->amount) ;@endphp
                                                <tr>
                                                    <td>Supplies</td>
                                                    <td>{{$expenseRecord->amount}}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        @foreach($expenseRecordData as $expenseRecord) 
                                            @if($expenseRecord->type_of_expense == 'Office Expense' || $expenseRecord->type_of_expense == 'Telephone Expense')
                                                @php $officeEquipment += preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $expenseRecord->amount) @endphp
                                            @endif
                                        @endforeach
                                            <tr>
                                                <td>Office Equipment</td>
                                                <td>${{$officeEquipment}}</td>
                                                @php $totalAssets += $officeEquipment ;@endphp
                                            </tr>
                                        @foreach($expenseRecordData as $expenseRecord)
                                            @if($expenseRecord->type_of_expense == 'Office Expense' || $expenseRecord->type_of_expense == 'Repair Maintenance Expense')
                                                @php $officeFurniture += preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $expenseRecord->amount) @endphp
                                            @endif
                                        @endforeach
                                            <tr>
                                                <td>Office Furniture</td>
                                                <td>${{$officeFurniture}}</td>
                                                @php $totalAssets += $officeFurniture ;@endphp
                                            </tr>
                                        @foreach($expenseRecordData as $expenseRecord)
                                            @if($expenseRecord->type_of_expense == 'Auto Expense')
                                                @php $totalAssets += preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $expenseRecord->amount) @endphp
                                                <tr>
                                                    <td>Auto</td>
                                                    <td>{{$expenseRecord->amount}}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="border-bottom: 2px solid #000;"><h3>Total Assets</h3></td>
                                <td><h3>{{$totalAssets}}</h3></td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px solid #000;"><h3> Libilities</h6></td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px solid #000;">Accounts Payable</td>
                                <td>$0.00</td>
                            </tr>
                            <tr>
                                <td>Notes Payable</td>
                                <td>$0.00</td>
                            </tr>
                            <tr>
                                <td>Salary Payable</td>
                                <td>$0.00</td>
                            </tr>
                            <tr>
                                <td>Interest Payable</td>
                                <td>$0.00</td>                                
                            </tr>
                            <tr>
                                <td>Loan Payable</td>
                                <td>$0.00</td>
                            </tr>
                            <tr>
                                <td>Unearned Revenue</td>
                                <td>${{$totalOutstanding}}</td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px solid #000;"><h3>Total Liabilities</h3></td>
                                <td>$0.00</td>
                            </tr>
                            <tr style="border-top: 2px solid #000;">
                                <td style="border-top: 2px solid #000;"><h3>Owner's Equity</h3></td>
                            </tr>
                            <tr>
                                <td >Owner's Initial Capital</td>
                                <td>${{$totalAssets}}</td>
                            </tr>
                            <tr>
                                <td >Owner's Withdrawal</td>
                                <td>
                                {{$ownerdata->emp_salary}}
                                </td>
                            </tr>
                            <tr>
                                <td >Net Income</td>
                                <td>${{$totalIncome - $totalExpense}}</td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px solid #000;">Total Owner's Equity</td>
                                <td>${{$totalAssets - preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $ownerdata->emp_salary) + ($totalIncome - $totalExpense)}}</td>
                            </tr>
                            <tr style="border-top: 3px solid #000">
                                <td style="border-top: 2px solid #000">Total Assets</td>
                                <td>
                                    total libilities - ${{(($totalExpense + $totalAssets) - preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $ownerdata->emp_salary)) + ($totalIncome - $totalExpense)}}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </table>

    </div>
    