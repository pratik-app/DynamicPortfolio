<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Tax Information</title>
</head>
<body>
    <h1>Tax Information</h1>

    <table>
        <tr>
            <th>Province</th>
            <td>{{ $employeeProvince }}</td>
        </tr>
        <tr>
            <th>Salary</th>
            <td>{{ $employeeSalary }}</td>
        </tr>
        <tr>
            <th>EI Deduction Rate</th>
            <td>{{ $employeeEIDR }}</td>
        </tr>
        <tr>
            <th>CPP Deduction Rate</th>
            <td>{{ $employeeCPPR }}</td>
        </tr>
        <tr>
            <th>Taxable Income</th>
            <td>${{ $generatedTaxableIncome }}</td>
        </tr>
        <tr>