<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
<div class="login">
    <h1>E - Ticketing</h1>
    <h4>Login Akun</h4>
    <form action="process.php" method="POST">

        <label for="username">Username</label></br>
        <input type="text" name="username" id="username" placeholder="username"  class="form-control"></br></br>

        <label for="password">Password</label></br>
        <input type="password" name="password" id="password" placeholder="password" class="form-control"></br></br>

        <button type="submit" name="login">Login</button>
    </form>
</div>
</body>
</html>