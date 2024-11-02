<?php

$sql = "CREATE TABLE IF NOT EXISTS `categories`(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL
)";

$result = mysqli_query($conn,$sql);

if($result){
    echo "Table Categories Created Successfully <br>";
}

$sql = "INSERT INTO `categories` (`title`)
VALUES ('first category'),('second category'),('third category'),('forth category'),('fifth category')";

mysqli_query($conn,$sql);

