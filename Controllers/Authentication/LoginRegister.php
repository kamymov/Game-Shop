<?php

    include "DataBase.php";



    if(isset($_POST['Register_submit'])){

       $Register_UserName =  mysqli_real_escape_string($conn_user,$_POST['Register_UserName']);
       $Register_Email = mysqli_real_escape_string($conn_user,$_POST['Register_Email']);
       $Register_Phone = mysqli_real_escape_string($conn_user,$_POST['Register_Phone']);        
       $Register_Password = mysqli_real_escape_string($conn_user,$_POST['Register_Password']);
       $Register_Password_2 = mysqli_real_escape_string($conn_user,$_POST['Register_Password_2']);
      
       if(empty($Register_UserName) or empty($Register_Email) or empty($Register_Phone) or empty($Register_Password) or empty($Register_Password_2)){
           array_push($errors , "Defult");
           header("location:index.php?empty=256");
           exit();
       }

       if($Register_Password != $Register_Password_2){
           array_push($errors , "Defult");
           header("location:index.php?notequal=58280");
           exit();
       }

       $Exist_check = "SELECT * FROM user_info WHERE username='$Register_UserName' OR phone='$Register_Phone' OR email='$Register_Email' LIMIT 1";
       $Exist_check_query = mysqli_query($conn_user,$Exist_check);

       if(mysqli_num_rows($Exist_check_query) > 0){
           array_push($errors, "Defult");
           header("location:index.php?existuser=216");
           exit();
       }

       if(count($errors) == 0){
            $Password = md5($Register_Password);
            $insert_into_db = "INSERT INTO user_info (username,email,phone,pass) VALUES ('$Register_UserName','$Register_Email','$Register_Phone','$Password')";
            $insert_into_db_query = mysqli_query($conn_user,$insert_into_db);
            if($insert_into_db_query){
                setcookie("User",$Register_UserName,time() +(86400 * 7));
                header("location:index.php?sucessregister=2020");
                exit();
            }
       }


    }

    if(isset($_GET['logout'])){
       setcookie('User', '' ,1);
       header("location:index.php");
       exit();
    }


    if(isset($_POST['Login_submit'])){

        $login_username = mysqli_real_escape_string($conn_user,$_POST['Login_UserName']);
        $login_email = mysqli_real_escape_string($conn_user,$_POST['Login_Email']);
        $login_phone = mysqli_real_escape_string($conn_user,$_POST['Login_Phone']);
        $login_password = mysqli_real_escape_string($conn_user,$_POST['Login_Password']);

        if(empty($login_username) or empty($login_email) or empty($login_phone) or empty($login_password)){
            array_push($errors , "Defults");
            header("location:index.php?empty=256");
            exit();
        }

        if(count($errors) == 0){

            $Password = md5($login_password);
            $Select_from_db = "SELECT * FROM user_info WHERE username='$login_username' AND email='$login_email' AND phone='$login_phone' AND pass='$Password'";

            $Select_from_db_query = mysqli_query($conn_user,$Select_from_db);

            if(mysqli_num_rows($Select_from_db_query) == 1){
                setcookie("User",$login_username,time() + (86400 * 4));
                header("location:index.php?successfulylogin=456654");
                exit();
            }else{
                header("location:index.php?cannotlogin=8585588648");
                exit();
            }

        }



    }

    mysqli_close($conn_user);
    mysqli_close($conn_safhe_pc);
    mysqli_close($conn_safhe_asli);



?>