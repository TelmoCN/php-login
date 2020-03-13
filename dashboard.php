<?php
    session_start();

    if(isset($_SESSION['userId'])) {
        require('./config/db.php');
        $userId = $_SESSION['userId'];
        $stmt = $pdo -> prepare('SELECT * from users WHERE id = ?');
        $stmt->execute([$userId]);
        $user = $stmt->fetch();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <nav>
            <h1>Navigation Bar</h1>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
        
        <h1>Edit User</h1>
        <form action="dashboard.php" method="POST">
            <div class="form-group">
                <label for="userName">User Name</label>
                <input value="<?php echo $user->name ?>" required name="userName" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="userEmail">User Email</label>
                <input value="<?php echo $user->email ?>" name="userEmail" type="text" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="form-group">
                <label for="password" class="form-check-label">Password</label>
                <input name="password" type="password" class="form-control" id="exampleCheck1">
            </div>
            <button name="register" type="submit" class="btn btn-primary">Update Details</button>
        </form>
    </div>
</body>
</html>