<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Your Account - Shoppix</title>
    <style>
        /* Base styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f9fafb;
            margin: 0;
            padding: 0;
        }
        
        .outer-container {
            background-color: #f3f4f6;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        
        .header {
            text-align: center;
            padding: 15px 0;
            border-bottom: 1px solid #e5e7eb;
        }
        
        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #0B1B35;
            margin-bottom: 5px;
        }
        
        .content {
            padding: 20px 15px;
        }
        
        h1 {
            color: #0B1B35;
            font-size: 20px;
            margin-bottom: 15px;
            text-align: center;
        }
        
        p {
            margin-bottom: 12px;
            color: #4b5563;
        }
        
        .otp-container {
            text-align: center;
            margin: 20px 0;
        }
        
        .otp-code {
            font-size: 28px;
            font-weight: bold;
            letter-spacing: 5px;
            color: #0B1B35;
            padding: 10px 20px;
            background-color: #e5e7eb;
            border-radius: 8px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        
        .otp-code i {
            margin-left: 10px;
            cursor: pointer;
            font-size: 24px; /* Adjust the size of the icon */
            color: #0B1B35; /* Match the color of the OTP code */
        }
        
        .note {
            font-size: 14px;
            color: #6b7280;
            text-align: center;
            margin-top: 20px;
        }
        
        .footer {
            text-align: center;
            padding-top: 15px;
            border-top: 1px solid #e5e7eb;
            font-size: 12px;
            color: #6b7280;
        }
        
        .button {
            display: inline-block;
            background-color: #0B1B35;
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 500;
            margin-top: 15px;
        }
        
        .button:hover {
            background-color: #162C4E;
        }
        
        .button-container {
            text-align: center;
            margin: 20px 0;
        }
    </style>
</head>

<body>
    <div class="outer-container">
        <div class="container">
            <div class="header">
                <div class="logo">Shoppix</div>
            </div>
            
            <div class="content">
                <h1>Verification Code</h1>
                
                <p>Hello, {{ session('user_data.name') }}</p>
                <p>Thank you for registering with Shoppix. To complete your registration, please use the verification code below:</p>
                
                <div class="otp-container">
                    <div class="otp-code">{{$otp}}</div>
                </div>
                
                <p>If you didn't request this code, please ignore this email.</p>
                
                <div class="note">
                    <p>If you have any questions, please contact our support team at <a href="mailto:support@shoppix.com">support@shoppix.com</a></p>
                </div>
            </div>
            
            <div class="footer">
                <p>&copy; {{ date('Y') }} Shoppix. All rights reserved.</p>
            </div>
        </div>
    </div>
</body>
</html>