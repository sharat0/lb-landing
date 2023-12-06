<?php
    $conn=mysqli_connect("localhost", "root", "root@123");
    $db=mysqli_select_db($conn, 'epiz_33285391_learnersbooth');

    // Create internship_basic table if not exists
    $createTableQuery = "CREATE TABLE IF NOT EXISTS internship_basic (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        phone VARCHAR(20) NOT NULL,
        dob DATE NOT NULL,
        gender VARCHAR(10) NOT NULL,
        line1 VARCHAR(255),
        line2 VARCHAR(255),
        city VARCHAR(100),
        state VARCHAR(100),
        pin VARCHAR(20),
        country VARCHAR(100),
        ip_address VARCHAR(50) NOT NULL,
        date_time DATETIME NOT NULL
    )";

    $createTableResult = mysqli_query($conn, $createTableQuery);

    if (!$createTableResult) {
        echo "Error creating table: " . mysqli_error($conn);
        return;
    }
?>