<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <div class="container">
        <form action="/registerrou" method="post">
            <h2>Sign Up | Historitti</h2>
            @csrf

            <input type="text" placeholder="Username" class="form-control @error('username')is-invalid @enderror"
                name="username" required value="{{old('username')}}">
            @error('username')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror

            <input type="email" placeholder="Email" class="form-control @error('email')is-invalid @enderror"
                name="email" value="{{old('email')}}">
            @error('email')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror

            <input type="password" placeholder="Password" class="form-control @error('password')is-invalid @enderror"
                name="password" required>
            @error('password')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror

            <button type="submit">Register</button>
            <div class="switch">
                <p>Already have an account? <a href="{{route ('login')}}">login here</a></p>
            </div>
        </form>
    </div>
</body>

</html>
