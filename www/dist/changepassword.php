<?php
  session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
        exit();
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
    <title>Create Password | Triple T Company</title>
    <link rel="shortcut icon" href="../images/logo.svg" />

</head>
<body>

                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Change password</h3>                                         
                                    </div>
                                    <div class="card-body">
                                        <form action="logoutnewpass.php" method="POST" class="font-weight-bold" >
                                             <div class="form-floating mb-3">
                                             <input type="text" name="user" class="form-control" id="chaomung" placeholder="Xin chào, @hovaten" disabled>
                                             <label for="inputEmail">Xin chào, <?=$_SESSION['name'] ?></label>
                                            </div>
                                            
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="oldpass" id="oldpass" type="password" placeholder="Password" />
                                                <label for="">Current password</label>
                                                <div class="invalid-feedback">Please fill out this field.</div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="pass" id="pass" type="password" placeholder="Password" />
                                                <label for="inputEmail">New password</label>
                                                <div class="invalid-feedback">Please fill out this field.</div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="cfpass" id="cfpass" type="password" placeholder="Password" />
                                                <label for="inputPassword">Confirm password</label>
                                                <div class="invalid-feedback">Please fill out this field.</div>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="checkbox" id="myCheck" name="remember" required>
                                                <label class="form-check-label" for="myCheck">Tôi đồng ý với điều khoản, chính sách của công ty khi sử dụng hệ thống.</label>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Check this checkbox to continue.</div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-warning px-5" >Change Password</button>
                                                <a href="home.php" class="">HOME</a>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small">Created By Triple T Team | Copyright © 2022 all rights reserved</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../main.js"></script>
    </body>
</html>
