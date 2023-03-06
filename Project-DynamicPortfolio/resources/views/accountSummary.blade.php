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
    $totalAssets = 0;
    $netIncome = 0;
    $totalEquity = 0;
    $totalLiabilities = 0;
    $totalOwnersEquity = 0;
    $calcualtedEquity = 0;
    $OIC = 0; 
    $OW = 0;
    @endphp
    <div class="container-fluid">
        <h1>Accounts Summary</h1>
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
                                @php $netIncome = $totalIncome - $totalExpense; @endphp
                                <td> ${{$netIncome}}</td>
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
                                        @foreach($investmentRecordData as $assets)
                                        @php $totalAssets += preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $assets->amount) @endphp
                                        <tr>
                                            <td>{{$assets->type_of_investment}}</td>
                                            <td>{{$assets->amount}}</td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="border-bottom: 2px solid #000;"><h3>Total Asset</h3></td>
                                <td>${{$totalAssets}}</td>
                            </tr>
                            <tr>
                                <td style="border-top: 2px solid #000;"><h3> Libilities</h6></td>
                            </tr>
                            @foreach($liabilitiesRecordData as $liabilities)
                            @php $totalLiabilities += preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $liabilities->amount) ;@endphp
                            <tr>
                                <td>{{$liabilities->type_of_libilities}}</td>
                                <td>{{$liabilities->amount}}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td style="border-top: 2px solid #000;"><h3>Total Liabilities</h3></td>
                                <td>${{$totalLiabilities}}</td>
                            </tr>
                            <tr style="border-top: 2px solid #000;">
                                <td style="border-top: 2px solid #000;"><h3>Equity</h3></td>
                            </tr>
                            @foreach($equityRecordData as $equity)
                                @if($equity->type_of_equity == "Owner Initial Capital")
                                    @php $OIC += preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $equity->amount); @endphp
                                @elseif($equity->type_of_equity == "Owner Withdrawal")
                                    @php $OW += preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $equity->amount); @endphp
                                @else
                                    
                                @endif
                            <tr>
                                <td>{{$equity->type_of_equity}}</td>
                                <td>{{$equity->amount}}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td >Net Income</td>
                                <td>${{$netIncome}}</td>
                            </tr>
                            @php
                                $calcualtedEquity = $OIC - $OW;
                                $totalOwnersEquity = $calcualtedEquity + $netIncome;
                            @endphp
                            <tr>
                                <td style="border-top: 2px solid #000;">Total Owner's Equity</td>
                                <td>${{$totalOwnersEquity}}</td>
                            </tr>
                            <tr style="border-top: 3px solid #000;">
                                <small>T<b>otal Assets</b> ${{$totalLiabilities + $totalOwnersEquity}}</small>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </table>
        
    </div>
    