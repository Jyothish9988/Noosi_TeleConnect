<!DOCTYPE html>
@include('user.header')
<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <style>
        /* Basic styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            width: 400px;
        }

        .logo {
            /* Add your custom logo styles here */
            text-align: center;
        }

        .validation-errors {
            color: red;
            margin-bottom: 20px;
        }

        .status-message {
            color: green;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .input {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border-radius: 4px;
            border: 1px solid #ccc;
            outline: none;
        }

        .remember-me {
            display: flex;
            align-items: center;
            margin-top: 10px;
            margin-bottom: 20px;
        }

        .checkbox-label {
            display: flex;
            align-items: center;
        }

        .checkbox {
            margin-right: 5px;
        }

        .forgot-password {
            color: blue;
            text-decoration: underline;
            font-size: 14px;
            display: block;
            margin-top: 10px;
        }

        .login-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        .login-button:hover {
            background-color: #45a049;
        }
    </style>
      <style>
    body {
      background-image: url({{ asset('user2/images/bg_1.jpg') }});
      background-repeat: no-repeat;
      background-size: cover;
    }
  </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="logo">
                <!-- Add your custom logo here -->
                
            </div>

            <div class="validation-errors mb-4">
                <!-- Validation errors will be displayed here -->
                @if ($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>

            @if (session('status'))
                <div class="status-message mb-4">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email" class="label">{{ __('Email') }}</label>
                    <input id="email" class="input" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" />
                </div>

                <div class="form-group">
                    <label for="password" class="label">{{ __('Password') }}</label>
                    <input id="password" class="input" type="password" name="password" required autocomplete="current-password" />
                </div>

                <div class="form-group remember-me">
                    <label for="remember_me" class="checkbox-label">
                        <input id="remember_me" class="checkbox" type="checkbox" name="remember" />
                        <span class="checkbox-text">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="form-group">
                    @if (Route::has('password.request'))
                        <a class="forgot-password" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <button type="submit" class="login-button">
                        {{ __('Log in') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

@include('user.footer');