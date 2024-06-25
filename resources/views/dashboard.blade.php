<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 300px;
            text-align: center;
        }
        .container a,
        .container form {
            display: block;
            margin: 10px 0;
            text-decoration: none;
            color: #007bff;
            font-size: 16px;
        }
        .container a:hover {
            text-decoration: underline;
        }
        .container button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #dc3545;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }
        .container button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="{{ route('login') }}">Login</a>

        <form action="/logoutv" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
        <p>Halo</p>
    </div>
</body>
</html>
