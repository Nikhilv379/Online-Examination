<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $data['title'] }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
            line-height: 1.6;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        p {
            color: #555;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>{{ $data['title'] }}</h1>
        <p>{{ $data['body'] }}</p>
        <p><a href="{{ $data['url'] }}">{{__('lang.Click here to reset your password_')}}</a></p>
        <p>{{__('lang.Thank You!_')}}</p>
    </div>

</body>

</html>
