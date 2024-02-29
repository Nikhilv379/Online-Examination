<!DOCTYPE html>
<html lang="en">

<head>
    <title>Forget Password</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #78ffd0e7;
            /* Light gray background */
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: #ffffff7e;
            /* White background */
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: left;
            max-width: 500px;
            width: 100%;
            margin-top: 20px;
        }

        h2 {
            font-size: 28px;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        input[type="email"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #9a9a9a77;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        input[type="email"]:hover {
            background-color: #ecf0f3;
            /* Light blue on hover */
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #0061c8;
            /* Orange button */
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #ffb55b;
            /* Darker orange on hover */
        }

        .btn-link {
            text-align: center;
            display: block;
            margin-top: 10px;
        }

        .dropdown {
            position: absolute;
            top: 20px;
            right: 20px;
        }

        .dropbtn {
            background-color: #0061c8;
            /* Blue dropdown button */
            color: #fff;
            border-radius: 5px;
            padding: 10px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            right: 0;
            /* Adjust right position */
            top: 100%;
            /* Adjust top position */
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .show {
            display: block;
        }

        .language-dropdown {
            position: absolute;
            top: 20px;
            right: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>{{ __('lang.Forgot_Password') }}</h2>
        @if (session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session()->get('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <form action="{{ route('forgetPassword') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="{{ __('lang.email_') }}"
                    required>
            </div>
            <div class="form-group">
                <input type="submit" value="{{ __('lang.Forgot_Password') }}" class="btn btn-primary">
            </div>
        </form>
        <a href="/login" class="btn btn-link">{{ __('lang.Login_') }}</a>
    </div>

    <!-- Language selection -->
    {{-- <div class="language-dropdown">
        <div class="dropdown">
            <button onclick="toggleDropdown()" class="dropbtn">Select Language <i
                    class="fas fa-caret-down"></i></button>
            <div id="languageDropdown" class="dropdown-content">
                <a href="{{ route('changeLanguage', ['lang' => 'en']) }}">English</a>
                <a href="{{ route('changeLanguage', ['lang' => 'hi']) }}">Hindi</a>
                <a href="{{ route('changeLanguage', ['lang' => 'spa']) }}">Spanish</a>
                <a href="{{ route('changeLanguage', ['lang' => 'arab']) }}">Arabic</a>
            </div>
        </div>
    </div> --}}

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function toggleDropdown() {
        var dropdown = document.getElementById("languageDropdown");
        dropdown.classList.toggle("show");
    }
</script>

</html>
