<?php

try {
    $conn = new PDO("mysql:host=" . $servername . ";dbname=" . $dbname . ";charset=utf8", $dbadmin_name, $dbadmin_password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    for ($i = 1; $i < 8; $i++) {
        $stmt = $conn->prepare("SELECT * FROM photos_content WHERE pid = '" . $i . "'");
        $stmt->execute();
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
            if ($i != 7) {
                $url[$i] = $row["photo_url"];
                $category[$i] = $row["category"];
                $name[$i] = $row["name"];
            } elseif ($i == 7) {
                $url_main = $row["photo_url"];
                $category_main = $row["category"];
                $name_main = $row["name"];
            }
        }
    }
} catch (PDOException $e) {
    $error = "Database conection error!";
    echo "Connection failed: " . $e->getMessage();
}

$conn = null;
