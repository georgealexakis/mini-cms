<?php

session_start();
$error = '';

function checkEmail($email) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL) === FALSE) {
        throw new Exception("Invalid e-mail address!");
    }
    return true;
}

if (isset($_POST['submit'])) {
    if (empty($_POST['email']) || empty($_POST['password'])) {
        $error = "Invalid email or password!";
    } else {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $password = md5($password);

        try {
            checkEmail($email);
            try {
                $conn = new PDO("mysql:host=" . $servername . ";dbname=" . $dbname, $dbadmin_name, $dbadmin_password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $stmt = $conn->prepare("SELECT email FROM users where email=:email_value and password=:password_value");
                $stmt->bindParam(':email_value', $email);
                $stmt->bindParam(':password_value', $password);
                $stmt->execute();
                $num_of_rows = $stmt->rowCount();

                if ($num_of_rows == 1) {
                    $_SESSION['login_user'] = $email;
                    header('location: index.php');
                } else {
                    $error = "Email or password is incorrect!";
                }
            } catch (PDOException $e) {
                $error = "Db connection error!";
                echo "Connection failed: " . $e->getMessage();
            }
        } catch (Exception $e) {
            echo 'Message: ' . $e->getMessage();
            $error = $e->getMessage();
        }
        $conn = null;
    }
}