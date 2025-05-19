<!DOCTYPE html>
<html>
<head>
    <title>AMC Management Report</title>
    <style>
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .container {
            max-width: 100%;
            margin: 0 auto;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #2c3e50;
            padding-bottom: 20px;
        }
        .logo {
            max-height: 60px;
        }
        .header-text {
            text-align: right;
        }
        .title {
            font-size: 24px;
            font-weight: 600;
            color: #2c3e50;
            margin: 0;
        }
        .subtitle {
            font-size: 16px;
            color: #7f8c8d;
            margin: 5px 0 0 0;
        }
        .report-info {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 25px;
            display: flex;
            justify-content: space-between;
            font-size: 14px;
        }
        .info-item {
            display: flex;
            align-items: center;
        }
        .info-item i {
            margin-right: 8px;
            color: #3498db;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 14px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }
        th {
            background-color: #2c3e50;
            color: white;
            padding: 12px 15px;
            text-align: left;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: 0.5px;
        }
        td {
            padding: 12px 15px;
            border-bottom: 1px solid #e0e0e0;
            vertical-align: top;
        }
        tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        tr:hover {
            background-color: #f1f7fd;
        }
        .category {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-weight: 600;
            font-size: 12px;
        }
        .category-common {
            background-color: #e3f2fd;
            color: #1976d2;
        }
        .category-residential {
            background-color: #e8f5e9;
            color: #388e3c;
        }
        .amount {
            font-weight: 600;
            color: #2e7d32;
        }
        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #eee;
            font-size: 12px;
            color: #7f8c8d;
            display: flex;
            justify-content: space-between;
        }
        .pagination {
            text-align: center;
            margin-top: 20px;
            font-size: 13px;
        }
        .signature {
            margin-top: 50px;
            text-align: right;
        }
        .signature-line {
            border-top: 1px solid #2c3e50;
            width: 200px;
            display: inline-block;
            margin-top: 40px;
        }
        .signature-text {
            margin-top: 5px;
            font-size: 13px;
        }
        .badge {
            display: inline-block;
            padding: 3px 7px;
            font-size: 12px;
            font-weight: 600;
            line-height: 1;
            color: #fff;
            text-align: center;
            white-space: nowrap;
            vertical-align: baseline;
            border-radius: 10px;
            background-color: #5c6bc0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="header-text">
                <h1 class="title">Annual Maintenance Contract Report</h1>
                <p class="subtitle">Comprehensive AMC directory and pricing information</p>
            </div>
        </div>

        <div class="report-info">
            <div class="info-item">
                <span>📅</span>
                <span>Generated on: {{ date('F j, Y, g:i a') }}</span>
            </div>
            <div class="info-item">
                <span>👤</span>
                <span>Prepared by: {{ Auth::user()->name }}</span>
            </div>
            <div class="info-item">
                <span>📋</span>
                <span>Total AMCs: {{ $getrecord->count() }}</span>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Contract Details</th>
                    <th>Amount</th>
                    <th>Category</th>
                    <th>Series</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($getrecord as $value)
                <tr>
                    <td>#{{ $value->id }}</td>
                    <td>
                        <strong>{{ $value->name }}</strong>
                        @if($value->description)
                        <div style="color: #7f8c8d; font-size: 13px; margin-top: 4px;">
                            {{ Str::limit($value->description, 50) }}
                        </div>
                        @endif
                    </td>
                    <td class="amount">
                        Rs. {{ number_format($value->amount, 2) }}
                    </td>
                    <td>
                        <span class="category category-{{ $value->business_category ? 'common' : 'residential' }}">
                            {{ $value->business_category ? 'Common-Area' : 'Residential' }}
                        </span>
                    </td>
                    <td>
                        <span class="badge">{{ $value->series }}</span>
                    </td>
                    <td>
                        <span style="color: #4caf50; font-weight: 600;">✓ Active</span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="footer">
            <div>
                <strong>{{ config('app.name') }}</strong><br>
                Contract Management System
            </div>
            <div>
                <div class="signature">
                    <div class="signature-line"></div>
                    <div class="signature-text">Authorized Signature</div>
                </div>
            </div>
            <div style="text-align: right;">
                Page 1 of 1<br>
                Confidential Report
            </div>
        </div>
    </div>
</body>
</html>