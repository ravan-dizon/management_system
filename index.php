<?php 
    session_start();
    if (isset($_POST['btnLogin'])) {
        require_once('connection.php');
        $email = htmlspecialchars($_POST['emailAdd']);//anti xss
        $password = htmlspecialchars($_POST['txtPass']);
        

        $email = stripslashes($email);//removal of single quotes
        $password = stripslashes($password);

        $email = mysqli_real_escape_string($con, $email);//escaping any attempts for sql injection
        $password = mysqli_real_escape_string($con, $password);

        $password = md5($password);//hash the password
                
            $strSql = "SELECT * FROM user_tbl 
                    WHERE email_add = '$email'
                    AND password = '$password'
                    ";


            if ($rsLogin = mysqli_query($con, $strSql)){
                if(mysqli_num_rows($rsLogin) > 0){
                    $row = mysqli_fetch_array($rsLogin);
                    if ($row["access"] == "Administrator") {
                        $_SESSION['email'] = $email;
                        header('location:admin/index.php');
                        
                    }else if ($row["access"] == "User") {
                        $_SESSION['email'] = $email;
                        header('location:studentList.php');
                    }
                   mysqli_free_result($rsLogin);
                }
                else
                
                    echo'
                    <p class="alert alert-danger mt-3 text-center" role="alert" style="width: 100%;">
                        <strong>Invalid Username/Password!
                    </p>';
                
            }
            else
                echo 'ERROR: could not execute your request.';

            require('close_con.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <title>Login Form</title>
</head>
<body>
    <img class="wave" src="img/background2.png">
    <div class="container">
        <div class="img">
            <img src="img/sidepic.svg">
        </div>
        <div class="login-content">
            <form method="post">
                <img src="img/avatar.svg">
                <h2 class="title">Welcome</h2>
                <div class="input-div one">
                   <div class="i">
                        <i class="fas fa-user"></i>
                   </div>
                   <div class="div">
                        <h5>Username</h5>
                        <input type="email" name="emailAdd" id="emailAdd" class="input" required autofocus>
                   </div>
                </div>
                <div class="input-div pass">
                   <div class="i"> 
                        <i class="fas fa-lock"></i>
                   </div>
                   <div class="div">
                        <h5>Password</h5>
                        <input type="password" name="txtPass" id="txtPass" class="input" required>
                   </div>
                </div>
                <input type="submit" name="btnLogin" class="btn" value="Login">
            </form>
        </div>
    </div>


    <script type="text/javascript" src="js/index.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</body>
</html>