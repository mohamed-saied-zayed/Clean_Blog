<?php

require_once BASE_PATH . "core/validations.php";
$errors = [];

if (check_method("POST")) {
    $title = sanitize_input('title');
    $content = sanitize_input('content');
    $file = $_FILES['image_path'];
    
    if (required($title)) {
        $errors['title'] = "Title is required";
    } elseif (min_length($title, 10)) {
        $errors['title'] = "Title must be at least 10 characters long";
    } elseif (max_length($title, 200)) {
        $errors['title'] = "Title must be less than 200 characters";
    }
    
    if (required($content)) {
        $errors['content'] = "Content is required";
    } elseif (min_length($content, 100)) {
        $errors['content'] = "Content must be at least 100 characters long";
    } elseif (max_length($content, 5000)) {
        $errors['content'] = "Content must be less than 5000 characters";
    } elseif (!valid_message($content)) {
        $errors['content'] = "Content contains invalid characters.";
    }

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
    
    if (empty($errors)) {
        $result = insert('posts', [
            'title' => $title,
            'content' => $content,
            'image_path' => $image_path, 
        ]);

        if ($result) {
            set_session("success", "Post added successfully");
        } else {
            set_session("errors", "Failed to add post");
        }
        
    } else {
      
        set_session("errors", $errors);
    }
header("Location: " . admin_url("add-post"));
exit;
} else {
    require_once "admin/views/405.views.php";
}
