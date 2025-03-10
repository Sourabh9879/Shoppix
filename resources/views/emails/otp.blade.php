<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoppix - Password Reset OTP</title>
    <style>
        /* Reset Styles */
        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f7fa;
            margin: 0;
            padding: 0;
        }

        .outer-container {
            background-color: #f0f2f5;
            padding: 30px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 25px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 1px solid #e5e7eb;
        }

        .logo {
            font-size: 26px;
            font-weight: bold;
            color: #0B1B35;
        }

        .content {
            padding: 20px;
        }

        h1 {
            color: #0B1B35;
            font-size: 22px;
            text-align: center;
        }

        p {
            font-size: 14px;
            color: #4b5563;
            text-align: center;
        }

        .otp-container {
            text-align: center;
            margin: 20px 0;
        }

        .otp-code {
            font-size: 32px;
            font-weight: bold;
            letter-spacing: 6px;
            color: #0B1B35;
            background-color: #e5e7eb;
            padding: 15px 30px;
            border-radius: 10px;
            display: inline-block;
        }

        .note {
            font-size: 13px;
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
            background-color: #0B1B35;
            color: #ffffff;
            text-decoration: none;
            padding: 12px 30px;
            border-radius: 5px;
            font-size: 14px;
            font-weight: bold;
            display: inline-block;
            margin-top: 20px;
        }

        .button:hover {
            background-color: #162C4E;
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
                <h1>Forgot Your Password?</h1>
                
                <p>Hello, {{ session('name') }}</p>
                <p>We received a request to reset your password. Use the OTP below to reset your password.</p>
                
                <div class="otp-container">
                    <div class="otp-code">{{$otp}}</div>
                </div>

                <p>This OTP is valid for the next 10 minutes. Do not share it with anyone.</p>
                
                <p>If you didn't request a password reset, please ignore this email.</p>
                
                <div class="note">
                    <p>If you have any questions, contact our support team at <a href="mailto:support@shoppix.com">support@shoppix.com</a></p>
                </div>
            </div>
            
            <div class="footer">
                <p>&copy; {{ date('Y') }} Shoppix. All rights reserved.</p>
            </div>
        </div>
    </div>
</body>
</html>
