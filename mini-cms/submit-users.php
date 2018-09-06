<?php

include('db_information.php');
$status = 0;

if (isset($_POST['delete'])) {
    $user_id = $_POST['userid'];
    try {
        $conn = new PDO("mysql:host=" . $servername . ";dbname=" . $dbname . ";charset=utf8", $dbadmin_name, $dbadmin_password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = "DELETE FROM users WHERE uid ='" . $user_id . "'";
        $conn->exec($stmt);
        $status = 1;
    } catch (PDOException $e) {
        $status = 0;
        echo "Connection failed: " . $e->getMessage();
    }
    header("location: admin-users.php?status=" . $status);
}

if (isset($_POST['add'])) {
    $first_name = $_POST['first-name'];
    $last_name = $_POST['last-name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $password = md5($password);

    try {
        $conn = new PDO("mysql:host=" . $servername . ";dbname=" . $dbname . ";charset=utf8", $dbadmin_name, $dbadmin_password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = "INSERT INTO users (name, surname, email, password) VALUES ('" . $first_name . "', '" . $last_name . "', '" . $email . "', '" . $password . "')";
        $conn->exec($stmt);
        $status = 1;
    } catch (PDOException $e) {
        $status = 0;
        echo "Connection failed: " . $e->getMessage();
    }
    header("location: admin-users.php?status=" . $status);
}
$conn = null;
