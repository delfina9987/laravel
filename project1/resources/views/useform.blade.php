<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Użytkownik</title>
</head>
<body>
    <h4>Formularz logowania</h4>
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="UserController" method="post">
        @csrf
        <input type="text" name="email" placeholder="Podaj email" autofocus><br></br>
        <input type="password" name="pass" placeholder="Podaj hasło"><br></br>
        <input type="submit">
    </form>
</body>
</html>