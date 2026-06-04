<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            min-height: 100vh;
            background: #f5f7fb;
        }

        .login-wrapper {
            min-height: 100vh;
        }

        .brand-icon {
            font-size: 70px;
            color: #2563eb;
        }

        .login-card {
            max-width: 650px;
            width: 100%;
            border-radius: 20px;
        }

        .form-control {
            height: 55px;
        }

        .input-group-text {
            background: #fff;
        }

        .login-btn {
            height: 55px;
            font-size: 18px;
            font-weight: 600;
        }

        .forgot-link {
            text-decoration: none;
        }

        .forgot-link:hover {
            text-decoration: underline;
        }
    </style>

</head>

<body>

    <div class="container">

        <div class="row justify-content-center align-items-center login-wrapper">

            <div class="col-lg-8">

                <!-- Logo -->
                <div class="text-center mb-4">

                    <i class="bi bi-box-seam brand-icon"></i>

                    <h1 class="fw-bold display-4 mt-2">
                        Mini Inventory System
                    </h1>

                    <p class="text-secondary fs-4">
                        Manage products, suppliers, and stock easily
                    </p>

                </div>

                <!-- Card -->
                <div class="card shadow border-0 login-card mx-auto">

                    <div class="card-body p-5">

                        <form method="POST" action="{{ route('authenticate') }}">
                            @csrf

                            <!-- Email -->
                            <div class="mb-4">

                                <label class="form-label fw-semibold">
                                    Email
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text">
                                        <i class="bi bi-envelope"></i>
                                    </span>

                                    <input type="email"
                                        name="email"
                                        value="{{ old('email') }}"
                                        class="form-control @error('email') is-invalid @enderror"
                                        placeholder="Enter your email">

                                </div>

                                @error('email')
                                <div class="text-danger mt-2">
                                    <i class="bi bi-exclamation-circle"></i>
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>

                            <!-- Password -->
                            <div class="mb-4">

                                <label class="form-label fw-semibold">
                                    Password
                                </label>

                                <div class="input-group">

                                    <span class="input-group-text">
                                        <i class="bi bi-lock"></i>
                                    </span>

                                    <input type="password"
                                        id="password"
                                        name="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Enter your password">

                                    <button type="button"
                                        class="input-group-text"
                                        onclick="togglePassword()">

                                        <i class="bi bi-eye-slash"
                                            id="toggleIcon"></i>

                                    </button>

                                </div>

                                @error('password')
                                <div class="text-danger mt-2">
                                    <i class="bi bi-exclamation-circle"></i>
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>

                            <!-- Remember -->
                            <div class="form-check mb-4">

                                <input class="form-check-input"
                                    type="checkbox"
                                    name="remember"
                                    id="remember">

                                <label class="form-check-label"
                                    for="remember">

                                    Remember me

                                </label>

                            </div>

                            <!-- Login Button -->
                            <button type="submit"
                                class="btn btn-primary w-100 login-btn">

                                <i class="bi bi-lock-fill me-2"></i>

                                Login

                            </button>

                            <!-- Divider -->
                            <div class="d-flex align-items-center my-4">

                                <hr class="flex-grow-1">

                                <span class="mx-3 text-muted">
                                    or
                                </span>

                                <hr class="flex-grow-1">

                            </div>

                            <!-- Forgot Password -->
                            <div class="text-center">

                                <a href="#"
                                    class="forgot-link">

                                    <i class="bi bi-lock me-1"></i>

                                    Forgot password?

                                </a>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <script>
        function togglePassword() {

            const password = document.getElementById('password');
            const icon = document.getElementById('toggleIcon');

            if (password.type === 'password') {
                password.type = 'text';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            } else {
                password.type = 'password';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            }
        }
    </script>

</body>

</html>