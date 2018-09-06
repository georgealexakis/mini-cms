<?php
include('mini-cms/db_information.php');
include('mini-cms/login.php');
if (isset($_SESSION['login_user'])) {
    header('Location: mini-cms/index.php');
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Mini CMS">
        <meta name="keywords" content="Mini CMS">
        <meta name="author" content="George Alexakis">
        <link rel="icon" type="image/ico" href="mini-cms/favicon/favicon.ico"/>
        <title>Mini CMS - Login</title>
        <link type="text/css" rel="stylesheet" href="mini-cms/css/bootstrap.min.css">
        <style>
            .warning-container{
                color: #fff;
                background-color: #C0C0C0;
                font-size: 16px;
                border-color: #C0C0C0;
                border-bottom: 0px;
                transition: box-shadow 0.5s;
            }
            .warning-container:hover{
                box-shadow: 5px 0px 40px rgba(0,0,0, 0.6);
            }
            .login-container{
                padding-top: 100px;
            }
            @media screen and (max-width: 768px) {
                .login-container{
                    padding-top: 0px;
                }
                .login-body{
                    margin-top: 30px;
                }
            }
            .login-panel{
                border: 1px solid #C0C0C0;
                transition: box-shadow 0.5s;
                font-size: 18px;
            }
            .login-panel:hover {
                box-shadow: 5px 0px 40px rgba(0,0,0, 0.6);
            }
            .login-panel-heading {
                color: #fff !important;
                background-color: #C0C0C0 !important;
                border-bottom: 0px;
            }
            .login-panel-body {
                color: #fff !important;
                background-color: #C0C0C0 !important;
            }
            .login-panel-footer .btn {
                background-color: #C0C0C0;
                color: #fff;
                border: 1px solid #fff;
            }
            .login-panel-footer .btn:hover {
                background-color: #fff;
                color: #C0C0C0;
            }
            .login-panel-footer {
                border-top: 0px;
                background-color: #C0C0C0 !important;
                border-bottom: 0px;
            }
        </style>
    </head>
    <body class="login-body">
        <div class="container login-container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <div class="panel panel-default login-panel">
                            <div class="panel-heading login-panel-heading">
                                <h1>Mini CMS</h1>
                            </div>
                            <div class="panel-body login-panel-body">
                                <div class="form-group">
                                    <label for="email">Email address:</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <input type="password" class="form-control" id="password" name="password">
                                </div>
                            </div>
                            <div class="panel-footer login-panel-footer">
                                <button type="submit" class="btn btn-lg btn-right" name="submit">Log in</button>
                            </div>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
        <div class="container">           
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <?php
                    if ($error !== "") {
                        echo "<div class='alert alert-warning warning-container'>
                        " . $error . "</div>";
                    }
                    ?>
                </div>
            </div>
        </div>
        <script src="mini-cms/js/jquery-3.1.1.min.js"></script>
        <script src="mini-cms/js/bootstrap.min.js"></script>
    </body>
</html>


