<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Registration</title>
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
      }
      .card {
        width: 100%;
        max-width: 400px;
      }
      .goggle-btn {
        border:1px solid black;
        background: white;
        transition: all 0.3s ease;
    }

    .goggle-btn:hover {
        background: #f8f9fa;
        transform: translateY(-1px);
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .text-muted{
      padding-top:10px;
    }
    </style>
  </head>
  <body>
    <div class="container form-container">
      <div class="card">
        <div class="card-header">
          <h3>Make Your <strong>Shoppix</strong> Account</h3>
        </div>
        <div class="card-body">
          <form class="registration-form" action="RegisterUser" method="post">
            @csrf
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Name"  />
              <span style=" color:red ">@error('name'){{$message}}@enderror</span>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Email"  />
              <span style=" color:red ">@error('email'){{$message}}@enderror</span>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Password"  />
              <span style=" color:red ">@error('password'){{$message}}@enderror</span>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </form>
          <div class="text-center mb-3">
                    <p class="text-muted">or</p>
                    <a href="{{ url('auth/google') }}" class="btn goggle-btn btn-block d-flex align-items-center justify-content-center gap-2">
                        <img src="https://www.google.com/favicon.ico" alt="Google" style="width: 18px; height: 18px;">
                        Continue with Google
                    </a>
                </div>
        </div>
        <div class="card-footer text-center">
          <span>Already have an Account? <a href="{{ Route('login') }}">Login</a></span>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
  </body>
</html>