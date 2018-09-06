<?php

include('db_information.php');

$status = 0;
if (isset($_POST['submit1']) || isset($_POST['submit2']) || isset($_POST['submit3']) || isset($_POST['submit4']) || isset($_POST['submit5']) || isset($_POST['submit6'])) {
    $category = $_POST['category'];
    $name = $_POST['name'];
    $url = $_POST['photo'];

    if (isset($_POST['submit1'])) {
        $pid = 1;
    } elseif (isset($_POST['submit2'])) {
        $pid = 2;
    } elseif (isset($_POST['submit3'])) {
        $pid = 3;
    } elseif (isset($_POST['submit4'])) {
        $pid = 4;
    } elseif (isset($_POST['submit5'])) {
        $pid = 5;
    } elseif (isset($_POST['submit6'])) {
        $pid = 6;
    }

    try {
        $conn = new PDO("mysql:host=" . $servername . ";dbname=" . $dbname . ";charset=utf8", $dbadmin_name, $dbadmin_password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = "UPDATE photos_content SET photo_url = '" . $url . "' , category = '" . $category . "' , name = '" . $name . "' WHERE pid='" . $pid . "'";
        $conn->exec($stmt);
        $status = 1;
    } catch (PDOException $e) {
        $status = 0;
        echo "Connection failed: " . $e->getMessage();
    }
    header("location: admin-photos.php?status=" . $status);
}
$conn = null;
