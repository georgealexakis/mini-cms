<?php

include('db_information.php');
$status = 0;

if (isset($_POST['submit'])) {
    $website_title = $_POST['website-title'];
    $logo_title = $_POST['logo-title'];
    $main_title = $_POST['main-title'];
    $main_description = $_POST['main-description'];
    $about_title = $_POST['about-title'];
    $about_description = $_POST['about-description'];
    $services_title = $_POST['services-title'];
    $service1_title = $_POST['service1-title'];
    $service2_title = $_POST['service2-title'];
    $service3_title = $_POST['service3-title'];
    $service4_title = $_POST['service4-title'];
    $service1_description = $_POST['service1-description'];
    $service2_description = $_POST['service2-description'];
    $service3_description = $_POST['service3-description'];
    $service4_description = $_POST['service4-description'];
    $booking_title = $_POST['booking-title'];
    $contact_title = $_POST['contact-title'];
    $contact_description = $_POST['contact-description'];
    $telephone = $_POST['telephone'];
    $email = $_POST['e-mail'];

    try {
        $conn = new PDO("mysql:host=" . $servername . ";dbname=" . $dbname . ";charset=utf8", $dbadmin_name, $dbadmin_password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = "UPDATE website_content SET content = '" . $website_title . "' WHERE cid=1";
        $conn->exec($stmt);

        $stmt = "UPDATE website_content SET content = '" . $logo_title . "' WHERE cid=2";
        $conn->exec($stmt);

        $stmt = "UPDATE website_content SET content = '" . $main_title . "' WHERE cid=3";
        $conn->exec($stmt);

        $stmt = "UPDATE website_content SET content = '" . $main_description . "' WHERE cid=4";
        $conn->exec($stmt);

        $stmt = "UPDATE website_content SET content = '" . $about_title . "' WHERE cid=5";
        $conn->exec($stmt);

        $stmt = "UPDATE website_content SET content = '" . $about_description . "' WHERE cid=6";
        $conn->exec($stmt);

        $stmt = "UPDATE website_content SET content = '" . $services_title . "' WHERE cid=7";
        $conn->exec($stmt);

        $stmt = "UPDATE website_content SET content = '" . $service1_title . "' WHERE cid=8";
        $conn->exec($stmt);

        $stmt = "UPDATE website_content SET content = '" . $service1_description . "' WHERE cid=9";
        $conn->exec($stmt);

        $stmt = "UPDATE website_content SET content = '" . $service2_title . "' WHERE cid=10";
        $conn->exec($stmt);

        $stmt = "UPDATE website_content SET content = '" . $service2_description . "' WHERE cid=11";
        $conn->exec($stmt);

        $stmt = "UPDATE website_content SET content = '" . $service3_title . "' WHERE cid=12";
        $conn->exec($stmt);

        $stmt = "UPDATE website_content SET content = '" . $service3_description . "' WHERE cid=13";
        $conn->exec($stmt);

        $stmt = "UPDATE website_content SET content = '" . $service4_title . "' WHERE cid=14";
        $conn->exec($stmt);

        $stmt = "UPDATE website_content SET content = '" . $service4_description . "' WHERE cid=15";
        $conn->exec($stmt);

        $stmt = "UPDATE website_content SET content = '" . $booking_title . "' WHERE cid=16";
        $conn->exec($stmt);

        $stmt = "UPDATE website_content SET content = '" . $contact_title . "' WHERE cid=17";
        $conn->exec($stmt);

        $stmt = "UPDATE website_content SET content = '" . $contact_description . "' WHERE cid=18";
        $conn->exec($stmt);

        $stmt = "UPDATE website_content SET content = '" . $telephone . "' WHERE cid=19";
        $conn->exec($stmt);

        $stmt = "UPDATE website_content SET content = '" . $email . "' WHERE cid=20";
        $conn->exec($stmt);

        $status = 1;
    } catch (PDOException $e) {
        $status = 0;
        echo "Connection failed: " . $e->getMessage();
    }
    header("location: admin-texts.php?status=" . $status);
    $conn = null;
}