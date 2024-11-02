<?php

$sql = "CREATE TABLE IF NOT EXISTS `messages`(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `phone` VARCHAR(250) NOT NULL,
    `message` TEXT NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$result = mysqli_query($conn,$sql);

if($result){
    echo "Table Messages Created Successfully <br>";
}

