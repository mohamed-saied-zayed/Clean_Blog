<?php

require_once BASE_PATH."core/validations.php";
$errors = [];

if(check_method("POST")){

    $name = sanitize_input('name');
    $email = sanitize_input('email');
    $phone = sanitize_input('phone');
    $message = sanitize_input('message');


    if(required($name)){
        $errors['name'] = "name is required";
   }elseif(min_length($name,3)){
        $errors['name'] = "name must be at least 3 characters long";
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
    // phone validation
    if(required($phone)){
        $errors['phone'] = "Phone Is Required";
    }elseif(!valid_phone($phone)){
        $errors['phone'] = "Invalid Phone Format";
    }elseif(max_length($phone,"15")){
        $errors['phone'] = "Phone Must Be Less Than 15 number";
    }
    // message Validtion
    if(required($message)){
        $errors['message'] = "Message Is Required";
    }elseif(min_length($message,"10")){
        $errors['message'] = "Message Must Be At Least 10 Chars";
    }elseif(max_length($message,"100")){
        $errors['message'] = "Message Must Be Less Than 1000 Chars";
    }elseif(!valid_message($message)){
        $errors['mesage'] = "Message contains invalid characters.";
    }

    if(empty($errors)){
        // insert data 
        $result = insert('messages',[
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'message' => $message
        ]);
        if($result){
            set_session("success","Message Sent Successfully");
        }
    }else{
        set_session("errors",$errors);
    }

header("Location: ".BASE_URL."index.php?page=contact");
exit;

}else{
    require_once "views/405.views.php";
}
