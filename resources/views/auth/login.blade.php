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
        <form class="login-form" action="/loginrou" method="post">
            @csrf
            <h2><h1>Historitti</h1></h2>
            <input type="text" placeholder="Username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}">

            @error('username')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror

            <input type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password">
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
            <button type="submit">Login</button>
            <p>Don't have an account? <a href="{{route('register')}}">Sign up</a></p>
        </form>
    </div>
</body>
</html>