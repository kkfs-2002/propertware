<!DOCTYPE html>
<html>
<head>
    <title>User Management Report</title>
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
        .status {
            display: inline-flex;
            align-items: center;
            font-weight: 600;
        }
        .status:before {
            content: "●";
            margin-right: 6px;
            font-size: 16px;
        }
        .status-active {
            color: #27ae60;
        }
        .status-inactive {
            color: #e74c3c;
        }
        .role-admin {
            color: #3498db;
            font-weight: 600;
        }
        .role-user {
            color: #9b59b6;
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
                <h1 class="title">User Management Report</h1>
                <p class="subtitle">Comprehensive user directory and access status</p>
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
                <span>👥</span>
                <span>Total Users: {{ $users->total() }}</span>
            </div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User Details</th>
                    <th>Contact Info</th>
                    <th>Role</th>
                    <th>Last Login</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>#{{ $user->id }}</td>
                    <td>
                        <strong>{{ $user->name }} {{ $user->last_name }}</strong>
                        <div style="color: #7f8c8d; font-size: 13px;">@{{ $user->username }}</div>
                    </td>
                    <td>
                        <div>{{ $user->email }}</div>
                        <div style="color: #7f8c8d; font-size: 13px;">{{ $user->mobile ?: 'N/A' }}</div>
                    </td>
                    <td>
                        <span class="role-{{ strtolower($user->role) }}">
                            {{ $user->role }}
                        </span>
                    </td>
                    <td>
                        {{ $user->last_login_at ? $user->last_login_at->format('M j, Y g:i a') : 'Never logged in' }}
                    </td>
                    <td>
                        <span class="status status-{{ $user->is_active ? 'active' : 'inactive' }}">
                            {{ $user->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="pagination">
            Showing {{ $users->count() }} of {{ $users->total() }} users
        </div>

        <div class="footer">
            <div>
                <strong>{{ config('app.name') }}</strong><br>
                User Management System
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