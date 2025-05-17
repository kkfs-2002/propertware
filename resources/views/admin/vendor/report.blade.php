<!DOCTYPE html>
<html>
<head>
    <title>Vendor Management Report</title>
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
        .status-active {
            color: #27ae60;
            font-weight: 600;
        }
        .status-inactive {
            color: #e74c3c;
            font-weight: 600;
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
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="header-text">
                <h1 class="title">Vendor Management Report</h1>
                <p class="subtitle">Comprehensive vendor directory and status</p>
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
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Vendor Name</th>
                    <th>Contact Info</th>
                    <th>Type</th>
                    <th>Company</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($vendors as $vendor)
                <tr>
                    <td>#{{ $vendor->id }}</td>
                    <td>
                        <strong>{{ $vendor->name }} {{ $vendor->last_name }}</strong>
                    </td>
                    <td>
                        <div>{{ $vendor->email }}</div>
                        <div style="color: #7f8c8d; font-size: 13px;">{{ $vendor->mobile }}</div>
                    </td>
                    <td>{{ $vendor->vendor_type_name ?? '-' }}</td>
                    <td>{{ $vendor->company_name }}</td>
                    <td>
                        @if($vendor->status == 0)
                            <span class="status-active">● Active</span>
                        @else
                            <span class="status-inactive">● Inactive</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="pagination">
            Showing {{ $vendors->count() }} of {{ $vendors->total() }} vendors
        </div>

        <div class="footer">
            <div>
                <strong>{{ config('app.name') }}</strong><br>
                Vendor Management System
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