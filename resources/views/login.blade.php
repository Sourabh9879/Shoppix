<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
    body {
        background-image: url('{{ asset('background.jpeg')}}');
        background-size: cover;
        background-position: center;
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 0;
        padding: 15px;
    }

    .form-container {
        width: 100%;
        max-width: 450px;
        margin: 0 auto;
        padding: 15px;
    }

    @media (min-width: 992px) {
        .form-container {
            margin-left: auto;
            margin-right: 5%;
            padding-left: 0;
        }
    }

    .card {
        width: 100%;
        max-width: 400px;
        margin: 0 auto;
    }

    .alert {
        width: 100%;
        margin-bottom: 20px;
    }

    .goggle-btn {
        border: 1px solid black;
        background: white;
        transition: all 0.3s ease;
    }

    .goggle-btn:hover {
        background: #f8f9fa;
        transform: translateY(-1px);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .gap-2 {
        gap: 0.5rem;
    }

    .glg {
        margin-top: 12px;
    }

    .fg {
        text-decoration: none;
        color: black;
    }

    .fg:hover {
        text-decoration: none;
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
                            <h2>Have your products ready with <strong>Shoppix</strong></h2>
                        </div>
                        <div class="card-body">
                            <form class="login-form" action="{{ Route('LoginUser') }}" method="post">
                                @csrf
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-floating mb-3">
                                    <input type="email" class="form-control" id="email" name="email" autocomplete="email"
                                        placeholder="name@example.com">
                                    <label for="email">Email address</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="password" class="form-control" id="password" name="password"
                                        autocomplete="current-password" placeholder="Password">
                                    <label for="password">Password</label>
                                </div>

                                <button type="submit" class="btn btn-primary btn-block mb-3">Login</button>
                            </form>
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('forget') }}" class="fg">Forgot Password?</a>
                            </div>

                            <!-- <div class="text-center mb-3">
                                <div class="d-flex align-items-center">
                                    <hr class="flex-grow-1">
                                    <span class="mx-2 text-muted">OR</span>
                                    <hr class="flex-grow-1">
                                </div>
                                <a href="{{ url('auth/google') }}"
                                    class="btn glg goggle-btn btn-block d-flex align-items-center justify-content-center gap-2">
                                    <img src="https://www.google.com/favicon.ico" alt="Google" style="width: 18px; height: 18px;">
                                    Continue with Google
                                </a>
                            </div> -->

                            <div class="text-center">
                                <span>Don't have an Account? <a href="{{ Route('signup') }}">Register</a></span>
                            </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
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
</body>

</html>