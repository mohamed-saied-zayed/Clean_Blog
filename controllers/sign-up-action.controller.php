<?php

require_once BASE_PATH."core/validations.php";
$errors = [];

if(check_method("POST")){

    $name = sanitize_input('name');
    $email = sanitize_input('email');
    $password = sanitize_input('password');

    if(required($name)){
        $errors['name'] = "Name Is Required";
   }elseif(min_length($name,3)){
        $errors['name'] = "Name Must Be At Least 3 Characters Long";
   }elseif(max_length($name,"200")){
        $errors['name'] = "Name Must Be Less Than 200 Chars";
    }elseif(!valid_name($name)){
        $errors['name'] = "Invalid Name Format";
    }

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
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        // insert data 
        $result = insert('users',[
            'name' => $name,
            'email' => $email,
            'password' => $hashed_password,
        ]);
        if($result){
            set_session("success","Account Created Successfully");
        }
    }else{
        set_session("errors",$errors);
    }

header("Location: ".BASE_URL."index.php?page=login");

}else{
    require_once "views/405.views.php";
}
