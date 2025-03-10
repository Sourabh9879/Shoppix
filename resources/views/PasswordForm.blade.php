<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Change Password</title>
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
    </style>
  </head>
  <body>
    <div class="container form-container">
      <div class="card">
        <div class="card-header">
          <h3>Change Password</h3>
        </div>
        <div class="card-body">
          <form class="forget-password-form" action="{{ route('handlePassword') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="new_password">New Password</label>
              <input type="password" class="form-control" id="new_password" name="new_password" />
              <span style="color:red">@error('new_password'){{ $message }}@enderror</span>
            </div>
            <div class="form-group">
              <label for="new_password_confirmation">Confirm Password</label>
              <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation" />
              <span style="color:red">@error('new_password_confirmation'){{ $message }}@enderror</span>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
          </form>
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