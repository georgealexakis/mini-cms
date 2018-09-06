<?php
include('db_information.php');
include('session.php');
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
        <link rel="icon" type="image/ico" href="favicon/favicon.ico"/>
        <title>Mini CMS</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/index.css"> 
    </head>
    <body> 
        <nav class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Menu</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="../index.php">Visit website</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Admin panel</a></li>
                        <li><a href="admin-texts.php">Edit texts</a></li>
                        <li><a href="admin-photos.php">Edit photos</a></li>
                        <li class="active"><a href="admin-users.php">Administrators</a></li>
                    </ul>
                    <div class="navbar-right">
                        <ul class="nav navbar-nav" style="color: white;">
                            <li><a href="admin-users.php">Hi <?php echo $_SESSION['login_user']; ?></a></li>
                        </ul>
                        <form class="navbar-form navbar-right"  action="logout.php" method="post">
                            <li><button name="submit" type="submit" class="btn btn-default btn-xl">Log out</button></li>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-centered text-center" style="color:black"> 
                    <?php
                    if (isset($_GET['status'])) {
                        $id = (int) $_GET['status'];
                        if ($id == 1) {
                            echo 'Data changed successfully';
                        } else {
                            echo 'There was a problem submitting your request';
                        }
                    }
                    ?>
                </div>
                <div class="col-md-12 col-centered text-center">
                    <h1>Administrators</h1>
                </div>
            </div>
            <div class="row">
                <form role="form" name="delete_user" id="delete_user" method="post" action="submit-users.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="sel1" class="col-md-2 control-label">Registered Administrators:</label>
                        <div class="col-md-10">
                            <select class="form-control" id="sel1" name="userid">
                                <?php
                                try {
                                    $conn = new PDO("mysql:host=" . $servername . ";dbname=" . $dbname . ";charset=utf8", $dbadmin_name, $dbadmin_password);
                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    $stmt = $conn->prepare("SELECT uid, email FROM users");
                                    $stmt->execute();
                                    foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
                                        echo "<option value='" . $row["uid"] . "'>" . $row["email"] . "</option>";
                                    }
                                } catch (PDOException $e) {
                                    $error = 'Database conection error!';
                                    echo 'Connection failed: ' . $e->getMessage();
                                }
                                ?>
                            </select>
                        </div>
                    </div>  
                    <div class="form-group">
                        <div class="col-sm-offset-6 col-sm-6">
                            <button type="submit" name="delete" class="btn btn-default">Delete user</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row">
                <form role="form" name="add_user" id="add_user" method="post" action="submit-users.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Name / Surname:</label>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" placeholder="Your name" name="first-name">
                                </div>
                                <div class="col-xs-8">
                                    <input type="text" class="form-control" placeholder="Your surname" name="last-name">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Email:</label>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-12">
                                    <input class="form-control" id="email" name="email" type="email" placeholder="E-mail" data-validation-required-message="Please enter your email" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Password</label>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="text" class="form-control" placeholder="Password" name="password">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-6 col-sm-6">
                            <button type="submit" name="add" class="btn btn-default">Add user</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
