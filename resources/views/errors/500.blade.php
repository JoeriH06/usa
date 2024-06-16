<!-- resources/views/errors/500.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error: 500</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Error: 500</h1>
        <p>Oops! Internal or server problem.</p>
        <a href="{{ url('/') }}" class="btn-home">Go Back Home</a>
        <p class="funny-text">Our server is feeling a bit under the weather...</p>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>


<style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
            margin: 0;
        }
        .container {
            text-align: center;
        }
        .btn-home {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
        .funny-text {
            margin-top: 20px;
            font-style: italic;
            color: #6c757d;
        }
    </style>
