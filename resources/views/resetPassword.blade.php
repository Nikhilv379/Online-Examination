<!DOCTYPE html>
<html>

<head>
    <title>Password Reset</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/your-font-awesome-kit.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            padding: 50px;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-group {
            position: relative;
            width: 100%;
            margin-bottom: 15px;
        }

        .password-container {
            position: relative;
            width: 100%;
        }

        .form-control {
            width: calc(100% - 40px);
            padding-right: 40px;
            padding-left: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn-toggle-password {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            right: 3px;
            border: none;
            background: none;
            cursor: pointer;
            z-index: 1;
        }

        .btn-toggle-password i {
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1>{{__('lang.Reset_Password')}}</h1>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p style="color:red;">{{ $error }}</p>
            @endforeach
        @endif
        <form action="{{ route('resetPassword') }}" method="POST" class="mt-4">
            @csrf

            <input type="hidden" name="id" value="{{ $user->id }}">
                <div class="form-group">
                    <div class="password-container">
                        <input type="password" name="password" class="form-control" placeholder="{{__('lang.Enter_Password')}}"
                            required>
                        <button class="btn-toggle-password" type="button" onclick="togglePasswordVisibility('password')">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="form-group">
                    <div class="password-container">
                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder="{{__('lang.Enter_Confirm_Password')}}" required>
                        <button class="btn-toggle-password" type="button"
                            onclick="togglePasswordVisibility('password_confirmation')">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
            <button type="submit" class="btn btn-primary">{{__('lang.Reset_Password')}}</button>
        </form>
        <a href="/login" class="btn btn-link">{{__('lang.Login_')}}</a>
    </div>
</body>
</html>
<script>
  function togglePasswordVisibility(inputFieldId) {
        var passwordField = document.getElementsByName(inputFieldId)[0];
        var btnToggle = passwordField.parentNode.querySelector('.btn-toggle-password');

        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            btnToggle.innerHTML = '<i class="fas fa-eye-slash" aria-hidden="true"></i>';
        } else {
            passwordField.type = 'password';
            btnToggle.innerHTML = '<i class="fas fa-eye" aria-hidden="true"></i>';
        }
    }

</script>
