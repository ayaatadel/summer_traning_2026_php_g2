a
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <x-bootstrap-css></x-bootstrap-css>

</head>

<body>
    <x-navbar></x-navbar>
    <h1 class="text-success text-center"> Login</h1>
    {{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif --}}
    <form class="w-75 m-auto border border-1 p-5" action="{{ route('auth.login') }}" method="post">
        @csrf
        <div class="mb-3">
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="user_email" class="form-label">User Email</label>
            <input type="email" class="form-control" name="email" id="user_email">
        </div>
        <div class="mb-3">
            @error('descripyion')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <label for="user_password" class="form-label">User Password</label>
            <input type="password" class="form-control" name="password" id="user_password">
        </div>

        <button type="submit" class="btn btn-primary">Login</button>
    </form>


    <x-bootstrap-js></x-bootstrap-js>

</body>

</html>
