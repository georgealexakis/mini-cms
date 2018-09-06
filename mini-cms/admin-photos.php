<?php
include('db_information.php');
include('session.php');
include('retrieve-photos.php');
if (isset($_GET['p'])) {
    $photo = $_GET['p'];
} else {
    $photo = '';
}
if (isset($_GET['m'])) {
    $m = $_GET['m'];
} else {
    $m = 0;
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
                        <li class="active"><a href="admin-photos.php">Edit photos</a></li>
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
                    <h1>Edit portofolio photos (Recommended size 650x350)</h1>
                </div>
            </div>  
            <div class="row">
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Select image to upload:</label>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-xs-4">
                                    <input class="form-control" type="file" name="fileToUpload" id="fileToUpload">
                                </div>
                                <div class="col-xs-4">
                                    <button type="submit" name="upload_submit" class="btn btn-default">Upload Image</button>
                                </div>
                                <div class="col-xs-4">
                                    <label>Status:<?php echo $m; ?></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form> 
            </div>
            <div class="row">
                <form role="form" name="request_form" id="request_form" method="post" action="submit-photos.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Category / Name (1):</label>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" placeholder="Photo Category" name="category" value="<?php echo $category[1]; ?>">
                                </div>
                                <div class="col-xs-8">
                                    <input type="text" class="form-control" placeholder="Photo Name" name="name" value="<?php echo $name[1]; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Photo:</label>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-xs-12">
                                    <?php
                                    echo '<input type="text" class="form-control" name="photo" value="';
                                    if ($photo == '') {
                                        echo $url[1];
                                    } else {
                                        echo $photo;
                                    }
                                    echo '">';
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-6 col-sm-6">
                            <button type="submit" name="submit1" class="btn btn-default">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row">
                <form role="form" name="request_form" id="request_form" method="post" action="submit-photos.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Category / Name (2):</label>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" placeholder="Photo Category" name="category" value="<?php echo $category[2]; ?>">
                                </div>
                                <div class="col-xs-8">
                                    <input type="text" class="form-control" placeholder="Photo Name" name="name" value="<?php echo $name[2]; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Photo:</label>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-xs-12">
                                    <?php
                                    echo '<input type="text" class="form-control" name="photo" value="';
                                    if ($photo == '') {
                                        echo $url[2];
                                    } else {
                                        echo $photo;
                                    }
                                    echo '">';
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-6 col-sm-6">
                            <button type="submit" name="submit2" class="btn btn-default">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row">
                <form role="form" name="request_form" id="request_form" method="post" action="submit-photos.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Category / Name (3):</label>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" placeholder="Photo Category" name="category" value="<?php echo $category[3]; ?>">
                                </div>
                                <div class="col-xs-8">
                                    <input type="text" class="form-control" placeholder="Photo Name" name="name" value="<?php echo $name[3]; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Photo:</label>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-xs-12">
                                    <?php
                                    echo '<input type="text" class="form-control" name="photo" value="';
                                    if ($photo == '') {
                                        echo $url[3];
                                    } else {
                                        echo $photo;
                                    }
                                    echo '">';
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-6 col-sm-6">
                            <button type="submit" name="submit3" class="btn btn-default">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row">
                <form role="form" name="request_form" id="request_form" method="post" action="submit-photos.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Category / Name (4):</label>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" placeholder="Photo Category" name="category" value="<?php echo $category[4]; ?>">
                                </div>
                                <div class="col-xs-8">
                                    <input type="text" class="form-control" placeholder="Photo Name" name="name" value="<?php echo $name[4]; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Photo:</label>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-xs-12">
                                    <?php
                                    echo '<input type="text" class="form-control" name="photo" value="';
                                    if ($photo == '') {
                                        echo $url[4];
                                    } else {
                                        echo $photo;
                                    }
                                    echo '">';
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-6 col-sm-6">
                            <button type="submit" name="submit4" class="btn btn-default">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row">   
                <form role="form" name="request_form" id="request_form" method="post" action="submit-photos.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Category / Name (5):</label>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" placeholder="Photo Category" name="category" value="<?php echo $category[5]; ?>">
                                </div>
                                <div class="col-xs-8">
                                    <input type="text" class="form-control" placeholder="Photo Name" name="name" value="<?php echo $name[5]; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Photo:</label>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-xs-12">
                                    <?php
                                    echo '<input type="text" class="form-control" name="photo" value="';
                                    if ($photo == '') {
                                        echo $url[5];
                                    } else {
                                        echo $photo;
                                    }
                                    echo '">';
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-6 col-sm-6">
                            <button type="submit" name="submit5" class="btn btn-default">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row">
                <form role="form" name="request_form" id="request_form" method="post" action="submit-photos.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-md-2 control-label">Category / Name (6):</label>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" placeholder="Photo Category" name="category" value="<?php echo $category[6]; ?>">
                                </div>
                                <div class="col-xs-8">
                                    <input type="text" class="form-control" placeholder="Photo Name" name="name" value="<?php echo $name[6]; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Photo:</label>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-xs-12">
                                    <?php
                                    echo '<input type="text" class="form-control" name="photo" value="';
                                    if ($photo == '') {
                                        echo $url[6];
                                    } else {
                                        echo $photo;
                                    }
                                    echo '">';
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-6 col-sm-6">
                            <button type="submit" name="submit6" class="btn btn-default">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>    
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
