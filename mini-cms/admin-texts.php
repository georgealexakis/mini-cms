<?php
include('db_information.php');
include('session.php');
include('retrieve-texts.php');
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
                        <li class="active"><a href="admin-texts.php">Edit texts</a></li>
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
                    <h1>Edit website texts</h1>
                </div>
            </div>  
            <div class="row">
                <!-- USE CASE B: Step 1 - Prepare the form -->
                <form role="form" name="edit_form" id="edit_form" method="post" action="submit-texts.php" enctype="multipart/form-data">

                    <div class="form-group">
                        <label class="col-md-2 control-label">Website Title:</label>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="text" class="form-control" placeholder="Website Title" name="website-title" value="<?php echo $text[1]; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Logo Title:</label>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="text" class="form-control" placeholder="Logo Title" name="logo-title" value="<?php echo $text[2]; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Main Title:</label>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="text" class="form-control" placeholder="Main Title" name="main-title" value="<?php echo $text[3]; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Main Description:</label>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea class="form-control" rows="5" id="tour-description" name="main-description"><?php echo $text[4]; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">About Title:</label>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-xs-12">
                                    <input type="text" class="form-control" placeholder="About Title" name="about-title" value="<?php echo $text[5]; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">About Decription:</label>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea class="form-control" rows="5" id="about-description" name="about-description"><?php echo $text[6]; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Services Title:</label>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" placeholder="Service 1 Title" name="services-title" value="<?php echo $text[7]; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Service 1 Title:</label>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" placeholder="Service 1 Title" name="service1-title" value="<?php echo $text[8]; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Service 1 Decription:</label>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea class="form-control" rows="5" id="service1-description" name="service1-description"><?php echo $text[9]; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Service 2 Title:</label>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" placeholder="Service 2 Title" name="service2-title" value="<?php echo $text[10]; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Service 2 Decription:</label>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea class="form-control" rows="5" id="service2-description" name="service2-description"><?php echo $text[11]; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Service 3 Title:</label>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" placeholder="Service 3 Title" name="service3-title" value="<?php echo $text[12]; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Service 3 Decription:</label>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea class="form-control" rows="5" id="service3-description" name="service3-description"><?php echo $text[13]; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Service 4 Title:</label>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" placeholder="Service 4 Title" name="service4-title" value="<?php echo $text[14]; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Service 4 Decription:</label>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea class="form-control" rows="5" id="service4-description" name="service4-description"><?php echo $text[15]; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Booking Title:</label>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" placeholder="Booking Title" name="booking-title" value="<?php echo $text[16]; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Contact Title:</label>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" placeholder="Contact Title" name="contact-title" value="<?php echo $text[17]; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Contact Decription:</label>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-12">
                                    <textarea class="form-control" rows="5" id="contact-description" name="contact-description"><?php echo $text[18]; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">Telephone:</label>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-xs-4">
                                    <input type="text" class="form-control" placeholder="Telephone" name="telephone" value="<?php echo $text[19]; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-2 control-label">E-mail:</label>
                        <div class="col-md-10">
                            <div class="row">
                                <div class="col-md-12">
                                    <input class="form-control" id="email" name="e-mail" type="email" placeholder="E-mail" required="" data-validation-required-message="Please enter your email" value="<?php echo $text[20]; ?>"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-6 col-sm-6">
                            <button type="submit" name="submit" class="btn btn-default">Save changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>    
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
