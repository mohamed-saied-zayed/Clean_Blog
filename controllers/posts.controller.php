<?php
global $conn;


$allposts = "SELECT COUNT(*) as countedPosts FROM posts"; 
$query2 = mysqli_query($conn, $allposts);
$res = mysqli_fetch_assoc($query2);
$countedPosts = $res['countedPosts'];

$page_limit = 10;
$page_numbers = ceil($countedPosts / $page_limit); 
$page_number = isset($_GET['pagee']) && is_numeric($_GET['pagee']) ? (int)$_GET['pagee'] : 1;
$page_number = max(1, min($page_number, $page_numbers)); 


$offset = $page_limit * ($page_number - 1);

$sql = "SELECT * FROM posts ORDER BY `created_at` DESC LIMIT $page_limit OFFSET $offset";
$query = mysqli_query($conn, $sql);
$posts = [];
while ($row = mysqli_fetch_assoc($query)) {
    $posts[] = $row;
}

require_once BASE_PATH . 'views/posts.views.php'; 
