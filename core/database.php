<?php

function select_data($table,$limit=''){
    global $conn;   
    $sql = "SELECT * FROM `$table` ORDER BY `created_at` DESC  $limit " ;
    $posts = mysqli_query($conn, $sql);

    if($posts){
        return map_data($posts);
    }else{
        return [];
    }
}

function get_row_by_id($table,$id){
    global $conn;
    $sql = "SELECT * FROM `$table`  WHERE `id` = $id ";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result) ?? [];

}

function map_data($data){
    
    $all_data = [];
    while($row = mysqli_fetch_assoc($data)){
    $all_data[] = $row;
    }
    return $all_data;
}


function insert($table,$data){
    global $conn;
    $keys = "`".implode('`,`', array_keys($data))."`";
    $values = "'".implode("','", array_values($data))."'";

    $sql = "INSERT INTO `$table` ($keys) VALUES($values) ";
    return mysqli_query($conn, $sql);
}

function delete($table,$id){
    global $conn;
    $sql = "DELETE FROM `$table` WHERE `id` = $id";
    return mysqli_query($conn, $sql);
}

function insert_users($table,$data){
    global $conn;
    $sql = "INSERT INTO $table (`name`,`email`,`password`) VALUES ($data)";
    $result = mysqli_query($conn, $sql);
    return mysqli_fetch_assoc($result) ?? [];
}

    function update($table, $title, $content, $id) {
        global $conn;
    
        $sql = "UPDATE `$table` SET `title` = ?, `content` = ? WHERE `id` = ?";
        
        $stmt = $conn->prepare($sql);
    
        if ($stmt === false) {
            die('MySQL prepare error: ' . htmlspecialchars($conn->error));
        }
    
        $stmt->bind_param("ssi", $title, $content, $id);
    
        return $stmt->execute();
    }

function count_numbers($table , $column){
    global $conn;
    $sql = "SELECT COUNT(`$column`) FROM `$table`";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        foreach($row as $key => $value){
            return $value;
        }
    } else {
        echo "Query failed: " . mysqli_error($conn);
        return 0;
    }
}
