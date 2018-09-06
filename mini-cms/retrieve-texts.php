<?php

try {
    $conn = new PDO("mysql:host=" . $servername . ";dbname=" . $dbname . ";charset=utf8", $dbadmin_name, $dbadmin_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    for ($i = 1; $i < 21; $i++) {
        $stmt = $conn->prepare("SELECT content FROM website_content WHERE cid = '" . $i . "'");
        $stmt->execute();
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
            $text[$i] = $row["content"];
        }
    }
} catch (PDOException $e) {
    $error = "Database conection error!";
    echo "Connection failed: " . $e->getMessage();
}

$conn = null;
