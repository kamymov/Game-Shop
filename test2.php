<?php

session_start();




// echo count($_SESSION['cart']);



// if(isset($_SESSION['cart'])){


//     $get_name = array_column($_SESSION['cart'], "mahsol");

//     $Select_db = "SELECT * FROM test";

//     $Select_db_query = mysqli_query($conn,$Select_db);

//     while($row = mysqli_fetch_assoc($Select_db_query)){
//         foreach($get_name as $name){
//             if($row['mahsol_name'] == $name){
//                 echo $row['mahsol_name'] . " : " . $row['mahsol_price'] . "<br>";
//             }
//         }
//     }


// }

// if(isset($_POST['cart'])){

//     if(isset($_SESSION['cart'])){

//         array_column()


//     }else{

//         $name = array("mahsol"=>$_POST['name']);

//         $_SESSION['cart'][0] = $name;

//     }



// }


if(isset($_POST['submit_mahsol'])){


    if(isset($_SESSION['cart'])){

        $item_array = array_column($_SESSION['cart'], "mahsol");

        if(in_array($_POST['hidden_mahsol'], $item_array)){
            echo "<script>alert('محصول در سبد خرید وجود دارد')</script>";
            echo "<script>window.location = 'index.php'</script>";
        }else{

            $count = count($_SESSION['cart']);

            $item_array = array("mahsol" => $_POST['hidden_mahsol']);

            $_SESSION['cart'][$count] = $item_array;

            header("location:index.php?SuccessfulyAddCart=516846313684613654984651");

            exit();

        }


    }else{

        $name = array("mahsol"=>$_POST['hidden_mahsol']);

        $_SESSION['cart'][0] = $name;

        header("location:index.php?SuccessfulyAddCart=516846313684613654984651");

        exit();
    }

}




?>