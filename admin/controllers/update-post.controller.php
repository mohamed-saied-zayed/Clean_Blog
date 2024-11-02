<?php
if(check_method('POST')){
    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $success = update('posts', $title, $content, $id);
    if($success)
    {
        set_session("success", "Post Edited successfully");

    }
    redirect("posts");
}else{
    require_once "admin/views/405.views.php"; 
}
