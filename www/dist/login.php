<?php
    session_start();
    if (isset($_SESSION['user'])) {
        header('Location: home.php');
        exit();
    }
    $homePage = "home.php";
    $changepassword = "changepassword.php";

    $error = '';
    if (isset($_COOKIE['user']) && isset($_COOKIE['pass'])) {
        $user = $_COOKIE['user'];
        $pass = $_COOKIE['pass'];
    } else { 
        $user = "";
        $pass = "";
    }

    require_once ('config.php');
    if (isset($_POST['user']) && isset($_POST['pass'])) {
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        if (empty($user)) {
            $error = 'Please enter your username';
        }
        else if (empty($pass)) {
            $error = 'Please enter your password';
        }
        else if (strlen($pass) < 5) {
            $error = 'Password must have at least 5 characters';
        }
        else {
            $result = login($user, $pass);
            if ($result['code']==0) {
                $data = $result['data'];
                $name = $data['lastname'] . ' ' . $data['firstname'];
                $permission = $data['permission'];
                $_SESSION['permission'] = $permission;
                $_SESSION['user'] = $user;
                $_SESSION['name'] = $name;
                
                if (isset($_POST['remember'])) {
                    setcookie('user', $user, time() + 3600 * 24); //1 ngay
                    setcookie('pass', $pass, time() + 3600 * 24); //1 ngay
                }
                if ($user == $pass)
                {                    
                    header("Location: $changepassword");
                }else if ($user != $pass) {
                    header("Location: $homePage");
                }
                exit();
            } else {
                $error = $result['error'];
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../style.css">
    <title>Login | Triple T Company</title>
    <link rel="shortcut icon" href="../images/logo.svg" />

</head>
<body class = "login">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xxl-4 col-xl-5 col-lg-6 col-md-8 col-sm-10 col-xs-10">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="form-floating mb-3">
                                <input name="user" class="form-control" id="user" type="text" placeholder="your national ID" />
                                <label for="user">Personal ID</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input name="pass" class="form-control" id="pass" type="password" placeholder="Password" />
                                <label for="pass">Password</label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" name="remember" id="inputRememberPassword" type="checkbox" value=""/>
                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                            </div>
                            <div>
                                <?php
                                    if (!empty($error)) {
                                        echo "<div class='alert alert-danger'>$error</div>";
                                    }
                                ?>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                <a class="small" href="forgotpassword.php">Forgot Password?</a>
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center py-3">
                    <div class="small">Created By Triple T Team | Copyright © 2022 all rights reserved</div>
                    <a href="contact.php">Contact to us...</a>
                </div>
            </div>
        </div>
    </div>
</div>
 
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="/main.js"></script>
    </body>
</html>