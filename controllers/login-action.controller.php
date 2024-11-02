<?php

require_once BASE_PATH."core/validations.php";
$errors = [];

if(check_method("POST")){

    $email = sanitize_input('email');
    $password = sanitize_input('password');

    
    // email validation

    if(required($email)){
        $errors['email'] = "Email Is Required";
    }elseif(!valid_email($email)){
        $_SESSION["email"] = "Invalid Email Format";
    }

    // password validation

    if(required($password)){
        $errors["password"] = "Password Is Required";
    }elseif(min_length($password,8)){
        $errors["password"] = "Password Must Be At Least 8 Characters Long";
    }elseif(max_length($password,20)){
        $errors["password"] = "Password Must Be Less Than 20 Characters Long";
    }elseif(!vaild_password($password)){
        $errors["password"] = "Password must contain at least {one uppercase letter & one lowercase letter &  at least one digit & one special character}";
    }

    if(empty($errors)){
        if(check_admin($email,$password)){
            header("Location: ".admin_url("home"));
        }else{
            header("Location: ".admin_url("user"));
        }
    }else{
        set_session("errors",$errors);
        header("Location: ".BASE_URL."index.php?page=login");
    }
}else{
    require_once "views/405.views.php";
}
