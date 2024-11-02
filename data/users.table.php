<?php

$sql = "CREATE TABLE IF NOT EXISTS `users`(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `password` VARCHAR(250) NOT NULL,
    `phone` VARCHAR(20) NOT NULL,
    `role` ENUM('admin','user') NOT NULL default 'user',
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$result = mysqli_query($conn,$sql);

if($result){
    echo "Table Users Created Successfully <br>";
}

$password = password_hash("password", PASSWORD_DEFAULT);
$sql = "INSERT INTO `users` (`name`,`email`,`password`,`phone`)
VALUES ('mohamed','mohamed@gmail.com','$password','01210587101'),
('yassien','yassien@gmail.com','$password','01210587101'),
('yousef','yousef@gmail.com','$password','01210587101')
";

mysqli_query($conn,$sql);

