<?php
    session_start();

    if(isset($_POST['login'])) {
        require('./config/db.php');

        $userEmail = $_POST['userEmail'];
        $password = $_POST['password'];

        // echo "$userName - $userEmail - $password";

        $stmt = $pdo -> prepare('SELECT * from users WHERE email = ?');
        $stmt->execute([$userEmail]);
        $user = $stmt->fetch();

        // echo $user->password . '<br>';
        // echo $password;

        if(password_verify($password, $user->password)) {
            // If the password inputs matched the hashed password in the database
            // Do something, you know... log them in.
            echo "The password is correct";
            $_SESSION['userId'] = $user->id;
            header('Location: http://localhost:8888/pdo/index.php');
        }

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
   
    <title>Document</title>
</head>
<body>
    <div class="container">
        <nav>
            <h1>PHP MYSQL</h1>
            <ul>
                <li><a href="index.php">Register</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
        <h1>Login User</h1>
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="userEmail">User Email</label>
                <input name="userEmail" type="text" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="form-group">
                <label for="password" class="form-check-label">Password</label>
                <input name="password" type="password" class="form-control" id="exampleCheck1">
            </div>
            <button name="login" type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>
</html>