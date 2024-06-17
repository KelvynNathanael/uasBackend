<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Register</title>
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
        .container h2 {
            margin-bottom: 20px;
        }
        .container input[type="text"],
        .container input[type="password"],
        .container input[type="email"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .container button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #28a745;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }
        .container button:hover {
            background-color: #218838;
        }
        .container .switch {
            margin-top: 10px;
        }
        .container .switch a {
            color: #007bff;
            text-decoration: none;
        }
        .container .switch a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Register</h2>
    <form action="/registerrou" method="post">
        @csrf
        <input type="text" placeholder="Username" class="form-control @error('username')is-invalid @enderror" name="username" required value = "{{old('username')}}">
        @error('username')
        <div class="invalid-feedback">
        {{$message}}
       </div>
       @enderror
        <input type="email" placeholder="Email" class="form-control @error('email')is-invalid @enderror"  name="email" required value = "{{old('email')}}">
        @error('email')
        <div class="invalid-feedback">
        {{$message}}
       </div>
       @enderror
        <input type="password" placeholder="Password" class="form-control @error('password')is-invalid @enderror" name="password" required >
        @error('password')
        <div class="invalid-feedback">
        {{$message}}
       </div>
       @enderror
        <button type="submit">Register</button>
    </form>
    <div class="switch">
        <p>Already have an account? <a href="{{route ('login')}}">register here</a></p>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>
