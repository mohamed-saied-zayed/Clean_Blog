<?php

function sentize_data($input){

    trim(htmlspecialchars(htmlentities($input)));
}

function required($input){
    if(empty($input)){
        return true;
    }else{
        return false;
    }
}

function min_length($input,$len){
    if(strlen($input)< $len){
        return true;
    }else{
        return false;
    }
}
function max_length( $input,$len){
    if(strlen($input)> $len){
        return true;
    }else{
        return false;
    }
}

function valid_name($input){
    $pattern = "/^[a-zA-Z\s]+$/";
    if (preg_match($pattern, $input)) {
        return true; 
    } else {
        return false; 
    }

}
function valid_email($input){
    if(filter_var($input, FILTER_VALIDATE_EMAIL)){
        return true;
    }else{
        return false;
    }
}

function valid_phone($input){
    $pattern = "/^\+?[0-9]{1,3}?[-.\s]?(\(?\d{3}\)?)[-.\s]?\d{3}[-.\s]?\d{4}$/";
    if (preg_match($pattern, $input)) {
        return true;
    }else{
        return false;
    }
}
function valid_message($input){
    $pattern = "/^[a-zA-Z0-9\s.,?!'\"-]+$/";
    if (preg_match($pattern, $input)) {
        return true;
    }else{
        return false;
    }
}

function vaild_password($input){
  if(preg_match('/[A-Z]/', $input) && preg_match('/[a-z]/', $input) && preg_match('/\d/', $input) && preg_match('/[\W_]/', $input)                                                                                                      ){
        return true;
    }else{
        return false;
    }
}

function Image_upload($file){
    $file_name = $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png', 'gif'];
    
    if (in_array($file_ext, $allowed) && $file_size < 500000) { 
        $new_name = uniqid('img_', true) . '.' . $file_ext;
        $upload_dir = 'uploads/' . $new_name;
        
        if (move_uploaded_file($file_tmp, $upload_dir)) {
            $image_path = $upload_dir;
        } else {
            $errors['image'] = "Failed to upload image.";
        }
    } else {
        $errors['image'] = "Invalid file type or size. Allowed types: jpg, jpeg, png, gif under 500KB.";
    }

}