<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <title>Forget-Password</title>
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
        margin-top: 50px;
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
      .btl{
        text-decoration:none;
        color:black;
    }
    .btl:hover{
        text-decoration:none;
    }
    .dd{
      margin-top:10px;
    }
    .alert {
        width: 100%;
        margin-bottom: 20px;
    }

    </style>
  </head>
  <body>
    <div class="container form-container">
    @if (session('success'))
        <div class="alert alert-success d-flex align-items-center justify-content-center" id="alertMessage"
            style="max-width: 400px;">
            <span class="material-symbols-outlined me-1">
                check_circle
            </span>
            {{ session('success') }}
        </div>
        @endif
        @if (session('failed'))
        <div class="alert alert-danger d-flex align-items-center justify-content-center" id="alertMessage"
            style="max-width: 400px;">
            <span class="material-symbols-outlined me-1">
                warning
            </span>
            {{ session('failed') }}
        </div>
        @endif
   
      <div class="card">
        <div class="card-header">
          <h3>Forgot Password</h3>
        </div>
        <div class="card-body">
          @if(Session::has('user_email'))
          <form class="forget-password-form" action="{{ route('otp.verify') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="otp">OTP Has Been Sent to your email <strong>{{ session('user_email.email') }}</strong></label>
              <input type="text" class="form-control" id="otp" name="otp" />
              <span style="color:red">@error('otp'){{ $message }}@enderror</span>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
          </form>
          @else
          <form class="forget-password-form" action="{{ route('ForgetPassword') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="abc@gmail.com" />
              <span style="color:red">@error('email'){{ $message }}@enderror</span>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
          </form>
          <div class="text-center dd d-flex justify-content-end">
          <span><a href="{{ route('login') }}" class="btl">Back to Login</a></span>
        </div>
          @endif
     
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDzwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
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