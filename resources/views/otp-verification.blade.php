<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>OTP Verification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <style>
        body {
            background-image: url('{{ asset('background.jpeg') }}');
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .form-container {
            display: flex;
            justify-content: flex-end;
            align-items: center;
            width: 100%;
            flex-direction: column;
            padding-left: 45em;
        }

        .card {
            width: 100%;
            max-width: 400px;
        }

        .alert {
            width: 100%;
            margin-bottom: 20px;
        }
        .otp{
            margin-bottom: 10px;
        }
        .cncl{
            text-decoration: none;
            color: white;
        }
        .cncl:hover{
            text-decoration: none;
            color: white;
        }
    </style>
</head>

<body>
    <div class="container form-container">
        @if (session('success'))
            <div class="alert alert-success d-flex align-items-center justify-content-center" id="alertMessage" style="max-width: 400px;">
                <span class="material-symbols-outlined me-1">
                    check_circle
                </span>
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger d-flex align-items-center justify-content-center" id="alertMessage" style="max-width: 400px;">
                <span class="material-symbols-outlined me-1">
                    warning
                </span>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <div class="card-header"><strong>OTP Verification</strong></div>
            <div class="card-body">
                <form method="POST" action="{{ route('otp.verify') }}">
                    @csrf
                    <div class="form-group">
                        <label for="otp" class="otp">OTP Has Been Sent to your email <strong>{{ session('user_data.email') }}</strong></label>
                        <input type="text" name="otp" class="form-control" required autofocus>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Verify</button>
                    <button type="submit" class="btn btn-secondary mt-3"><a href="{{ route('signup') }}" class="cncl">Cancel</a></button>
                </form>
            </div>
            
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            setTimeout(function() {
                let alertBox = document.getElementById("alertMessage");
                if (alertBox) {
                    alertBox.style.transition = "opacity 0.5s";
                    alertBox.style.opacity = "0";
                    setTimeout(() => alertBox.remove(), 500);
                }
            }, 3000);
        });
    </script>
</body>

</html>
