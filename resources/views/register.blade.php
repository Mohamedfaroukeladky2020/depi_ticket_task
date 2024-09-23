@extends('layouts')

@section('content')
<!DOCTYPE html>
<html>
<head>
    <title>User Registration</title>
</head>
<body>
    <h2>Register</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>



        <div>
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" class="form-control" required>
        </div>

        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>

        <div class="mt-3 p-2">
            <button type="submit" class="btn btn-primary">Register</button>
        </div>
    </form>
</body>
</html>
@endsection
