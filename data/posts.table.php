<?php
$sql = "CREATE TABLE IF NOT EXISTS `posts`(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `content` TEXT NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$result = mysqli_query($conn,$sql);

if($result){
    echo "Table Posts Created Successfully <br>";
}


$sql = "INSERT INTO `posts` (`title` , `content`)
VALUES ('$title' , '$content')";

mysqli_query($conn,$sql);