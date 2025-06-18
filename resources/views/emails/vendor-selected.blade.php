<!DOCTYPE html>
<html>
<head>
    <title>Vendor Selected</title>
    <style>
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        .email-header {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
            border-bottom: 1px solid #dee2e6;
        }
        .email-body {
            padding: 20px;
        }
        .email-footer {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
            border-top: 1px solid #dee2e6;
            font-size: 0.9em;
            color: #6c757d;
        }
        .btn-primary {
            display: inline-block;
            padding: 10px 20px;
            background-color: #0d6efd;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin: 15px 0;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="email-header">
            <h2>Congratulations!</h2>
        </div>
        
        <div class="email-body">
            <p>Dear {{ $vendor->name }},</p>
            <p>We're pleased to inform you that you have been selected for a service request by the admin team.</p>
            <p>You can now view and manage your appointments through the vendor dashboard.</p>
            
            <div style="text-align: center; margin: 25px 0;">
                <a href="{{ url('vendor/appointments/list') }}" class="btn-primary">
                    Go to My Appointments
                </a>
            </div>
            
            <p>If you have any questions, please don't hesitate to contact us.</p>
        </div>
        
        <div class="email-footer">
            <p>Thank you,<br>The PropertyWare Team</p>
        </div>
    </div>
</body>
</html>