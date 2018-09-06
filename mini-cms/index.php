<?php
include('db_information.php');
include('session.php');

try {
    $conn = new PDO("mysql:host=" . $servername . ";dbname=" . $dbname . ";charset=utf8", $dbadmin_name, $dbadmin_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT COUNT(*) AS counttexts FROM website_content;");
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $totalTexts = $row["counttexts"];
    }

    $stmt = $conn->prepare("SELECT COUNT(*) AS countphotos FROM photos_content;");
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $totalPhotos = $row["countphotos"];
    }

    $stmt = $conn->prepare("SELECT COUNT(*) AS countusers FROM users;");
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $totalUsers = $row["countusers"];
    }
} catch (PDOException $e) {
    $error = "Database conection error!";
    echo "Connection failed: " . $e->getMessage();
}

$conn = null;
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
                        <li class="active"><a href="index.php">Admin panel</a></li>
                        <li><a href="admin-texts.php">Edit texts</a></li>
                        <li><a href="admin-photos.php">Edit photos</a></li>
                        <li><a href="admin-users.php">Administrators</a></li>
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
                <div class="col-md-12 col-centered text-center">
                    <h1>Mini CMS - Website Statistics</h1>
                </div>
            </div> 
            <div class="row">
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">Total Texts</div>
                        <div class="panel-body"><?php echo $totalTexts; ?></div>
                        <div class="panel-footer"><a class="btn btn-default btn-xl" href="admin-texts.php">See more</a></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">Total Photos</div>
                        <div class="panel-body"><?php echo $totalPhotos; ?></div>
                        <div class="panel-footer"><a class="btn btn-default btn-xl" href="admin-photos.php">See more</a></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">Total Users</div>
                        <div class="panel-body"><?php echo $totalUsers; ?></div>
                        <div class="panel-footer"><a class="btn btn-default btn-xl" href="admin-users.php">See more</a></div>
                    </div>
                </div>
            </div> 
        </div>   
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
