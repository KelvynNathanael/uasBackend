<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="container">
        <form class="login-form">
            <h2>    <h1>Historitti</h1></h2>
            <input type="text" placeholder="Username" required>
            <input type="password" placeholder="Password" required>
            <button type="submit">Login</button>
            <p>Don't have an account? <a href="{{route('register')}}">Sign up</a></p>
        </form>
    </div>
</body>
</html>