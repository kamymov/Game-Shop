<?php

    include 'DataBase.php';
    session_start();

?>

<!DOCTYPE html>
<html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <link rel="stylesheet" href="styles/style12.css">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <!-- <link rel="icon" href=""> -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="script1.js"></script>
            <style>

                    #input_search::placeholder{
                        color:black;
                    }

                    #img_logo{
                        width:90px;
                        height: 60px;
                    }

            </style>
            <title>خرید محصول</title>
        </head>
                <body style="background-color: white;">

                    <div class="body" style="background-color: white;">

                        <!-- menu responsive options click -->

            <div class="div_menu_responsive">

            <i class="fa fa-arrow-right" id="arrow_right" style="font-size:36px;color: white;margin: 10px 20px 0px 0px;cursor: pointer;"></i>

            <a href="index.php" class="a_menu_responsive">صفحه اصلی<i class="fa fa-angle-left" style="font-size:20px;margin-right:9px;color: white;"></i></a>
            <a href="PcGame.php" class="a_menu_responsive">بازی های Pc<i class="fa fa-angle-left" style="font-size:20px;margin-right:9px;color: white;"></i></a>
            <a href="XbGame.php" class="a_menu_responsive">ایکس باکس<i class="fa fa-angle-left" style="font-size:20px;margin-right:9px;color: white;"></i></a>
            <a href="PsGame.php" class="a_menu_responsive">پلی استیشن<i class="fa fa-angle-left" style="font-size:20px;margin-right:9px;color: white;"></i></a>
            <a href="lavazem.html" class="a_menu_responsive">درباره ما<i class="fa fa-angle-left" style="font-size:20px;margin-right:9px;color: white;"></i></a>


            </div>

                                    <!-- search Responsive -->



                <div class="div_search_responsive">


                <i class="fa fa-times" id="Multipart_Search"></i>

                <div class="div_search_form">

                <form action="">

                <input type="text" name="" id="input_search_responsive" placeholder="جستجو...">

                <input type="submit" value="ارسال" id="submit_search_responsive">


                </form>

                <div class="div_search_result">




                </div>


                </div>


                </div>

                                <!-- sabad kharid -->

                
    <div class="div_sabad_kharid_koli">
        
    
    <i class="fa fa-times" id="multipart_sabad"></i>

    <h1 style="color: white;text-align: center;">سبد خرید</h1>

<div class="div_sabad_kharid">
<?php

if(isset($_SESSION['cart'])){

    $get_name = array_column($_SESSION['cart'], "mahsol");

    $select_pc = "SELECT * FROM mahsol__pc";

    $select_pc_query = mysqli_query($conn_safhe_pc,$select_pc);

        while($row = mysqli_fetch_assoc($select_pc_query)){
        foreach($get_name as $name){
            if($row['name_asli'] == $name){
                
                echo "
                
                    <div class='div_sabad_mahsol'>

                        <form action='mahsol.php?name=" . $row['name_asli'] . "&action=remove' method='POST' style='width: 100%;display: flex;'>
                             
                
                            <div class='div_img_sabad'>
                
                                <img src='" . $row['img_1'] . "' class='img_sabad_mahsol' alt='" . $row['name_mahsol'] . "'>
                
                            </div>
                
                            <div class='div_sabad_name'>
                
                                <h1 class='h1_name_sabad'>" . $row['name_mahsol'] . "</h1>
                
                
                            </div>
                
                            <div class='div_sabad_tedad'>
                
                                <input class='input_sabad_tedad' min='0' max='10' type='number' name='sabad_tedad' value='1'>
                
                            </div>
                
                            <div class='div_remove_sabad'>
                
                                <input class='submit_Remove_sabad' type='submit' value='Remove' name='Remove_cart'>
                
                            </div>
                
                            <div class='div_sabad_price'>
                
                                <h1 class='h1_sabad_price'>" . $row['price_mahsol'] . "<span style='font-weight: bolder;'>تومان</span></h1>
                
                
                            </div>
            
                        </form>
        
        
                
                    </div>
                
                
                ";
            }
        }
    }


}else{
    echo "
    
            <div style='height:100%;'>
            
                <h1 style='text-align:center;color:white'>سبد خرید خالی است</h1>
            
            </div>

    ";
    
}

//                                                                         sabad kharid
//                                                                         sabad kharid
//                                                                         sabad kharid

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

if(isset($_POST['Remove_cart'])){

    if($_GET['action'] == "remove"){

        foreach($_SESSION['cart'] as $key => $value){

            if($value['mahsol'] == $_GET['name']){

                unset($_SESSION['cart'][$key]);

                echo "<script>alert('محصول مورد نظر با موفقیت پاک شد...!')</script>";

                echo "<script>window.location: 'index.php'</script>";

            }

        }

    }

}




?>



?>






</div>





</div>


               



                                <!-- Rregister field -->

                <div class="div_login" id="div_register">

                <i class="fa fa-times" id="multipart_register"></i>

                <div class="div_form_login" id="div_form_register">



                <h1 style="text-align: center;padding-top: 30px;color:black">ثبت نام</h1>

                <form action="LoginRegister.php" method="POST">
            
            <input type="text" name="Register_UserName" id="" class="input_login_register" placeholder="نام کاربری..." autocomplete="off">

            <input type="text" name="Register_Email" id="" class="input_login_register" placeholder="ایمیل..." autocomplete="off">

            <input type="text" name="Register_Phone" id="" class="input_login_register" placeholder="تلفن همراه..." autocomplete="off">

            <input type="password" name="Register_Password" id="" class="input_login_register" placeholder="رمز عبور..." autocomplete="off">

            <input type="password" name="Register_Password_2" id="" class="input_login_register" placeholder="تکرار رمز عبور..." autocomplete="off">

            <input type="submit" name="Register_submit" value="ارسال" class="submit_login">

            <br><br>
        </form>

    </div>



</div>

                                                    <!-- login field -->

<div class="div_login" id="div_login">

    <i class="fa fa-times" id="multipart_login"></i>

    <div class="div_form_login">



        <h1 style="text-align: center;padding-top: 30px;color:red;">ورود</h1>

        <form action="LoginRegister.php" method="POST">

            <input type="text" name="Login_UserName" class="input_login_register" placeholder="نام کاربری..." autocomplete="off">

            <input type="text" name="Login_Email" class="input_login_register" placeholder="ایمیل..." autocomplete="off">

            <input type="text" name="Login_Phone" class="input_login_register" placeholder="تلفن همراه..." autocomplete="off">

            <input type="password" name="Login_Password" class="input_login_register" placeholder="رمز عبور..." autocomplete="off">

            <input type="submit" name="Login_submit" value="ارسال" class="submit_login">

            <br><br>
        </form>

    </div>



                </div>

                                                <!-- menu -->
                                                <!-- menu -->
                                                <!-- menu -->

            <div class="div_body_1">  

                <div class="menu">

                <div class="div_logo" id="div_logo">

                <div class="div_menu_click">

                <i class="fa fa-bars" id="i_menu_click" style="font-size:40px"></i> 


                </div>

                <div class="div_login_register">

                <i class="fa fa-search" style="font-size:24px" id="search_icon"></i>

                                            <!-- sabad kharid -->

                    <a id="a_sabad_kharid"><?php
                    
                    if(isset($_SESSION['cart'])){
                        if(count($_SESSION['cart']) > 0){
                            $count = count($_SESSION['cart']);
                            echo '<span style="color:black;font-size:12px;background-color:yellow;border-radius: 15px;position: absolute;margin-top: 22px;margin-left:5px;padding: 0px 3px;display:inline-block;">' . $count . '</span>';
                        }
                    }
                    
                    
                    ?><i class="fa fa-shopping-basket" style="font-size:23.5px;color: red;margin-left: 9px;" ></i><span id="span_sabad_kharid">سبد خرید</span></a>

                    <!-- login button -->

                    
                    <?php
                        
                        if(isset($_COOKIE['User'])){
                            echo '<a href="LoginRegister.php?logout=56841" style="background-color:#8080807a;" class="a_login_register">خروج</a>';
                        }
                        else{
                            echo '<a class="a_login_register" id="a_login">ورود</a>';
                        }

                    
                    
                    ?>                                                

                     

                    <span style="font-size: 30px;font-weight: bold;color:white">|</span>

                                                                    <!-- Register button -->

                    <?php
                    
                        if(isset($_COOKIE['User'])){
                            echo '<a class="a_login_register" id="a_Register" style="background-color:rgba(15, 10, 200,0.25)">پروفایل</a>';
                        }else{
                            echo '<a class="a_login_register" id="a_Register">عضویت</a>';
                        }
                    
                    
                    ?>




                </div>

                                                <!-- Search -->

                <div class="div_search">

                <form action="" id="form_search">

                <input type="text" name="" placeholder="جستجو..."  id="input_search">

                <input type="submit" value="ارسال" id="submit_search">


                </form>


                </div>

                <div class="div_logo_img">

                <img src="img/Logo.png" alt="" id="img_logo">



                </div>


                </div>


                                        <!-- menu options -->


                <div class="div_menu">

                <div class="div_menu_a">

                <a href="index.php"class="a_menu">صفحه اصلی</a>

                <div class="div_bazi_list" id="div_bazi_pc">

                <div class="div_menu_hover"  id="div_menu_hover_pc" style="border-radius: 0px 0px 10px 10px">

                    <a href="PcGame.php?Zhanr=استراتژیک" class="h4_menu_hover">استراتژیک</a>

                    <a href="PcGame.php?Zhanr=ماجراجویی" class="h4_menu_hover">ماجراجویی</a>

                    <a href="PcGame.php?Zhanr=جهان باز" class="h4_menu_hover">جهان باز</a>

                    <a href="PcGame.php?Zhanr=اکشن" class="h4_menu_hover">اکشن</a>

                    <a href="PcGame.php?Zhanr=ورزشی" class="h4_menu_hover">ورزشی</a>

                    <a href="PcGame.php?Zhanr=ترسناک" class="h4_menu_hover">ترسناک</a>

                </div>

                <a href="PcGame.php" id="a_bazi_pc" class="a_menu">کامپیوتر<i class="fa fa-angle-down" style="font-size:20px;margin-right:9px;"></i></a>


                </div>

                <div class="div_bazi_list" id="div_bazi_xb">

                <div class="div_menu_hover"  id="div_menu_hover_xb" style="background-color:green;border-radius: 0px 0px 10px 10px">

                    <a href="XbGame.php?Zhanr=استراتژیک" class="h4_menu_hover">استراتژیک</a>

                    <a href="XbGame.php?Zhanr=ماجراجویی" class="h4_menu_hover">ماجراجویی</a>

                    <a href="XbGame.php?Zhanr=جهان باز" class="h4_menu_hover">جهان باز</a>

                    <a href="XbGame.php?Zhanr=اکشن" class="h4_menu_hover">اکشن</a>

                    <a href="XbGame.php?Zhanr=ورزشی" class="h4_menu_hover">ورزشی</a>

                    <a href="XbGame.php?Zhanr=ترسناک" class="h4_menu_hover">ترسناک</a>

                </div>

                <a href="XbGame.php" class="a_menu"  id="a_bazi_xb">ایکس باکس<i class="fa fa-angle-down" style="font-size:20px;margin-right:9px;"></i></a>

                </div>



                <div class="div_bazi_list" id="div_bazi_ps">

                <div class="div_menu_hover"  id="div_menu_hover_ps" style="border-radius: 0px 0px 10px 10px">

                    <a href="PsGame.php?Zhanr=استراتژیک" class="h4_menu_hover">استراتژیک</a>

                    <a href="PsGame.php?Zhanr=ماجراجویی" class="h4_menu_hover">ماجراجویی</a>

                    <a href="PsGame.php?Zhanr=جهان باز" class="h4_menu_hover">جهان باز</a>

                    <a href="PsGame.php?Zhanr=اکشن" class="h4_menu_hover">اکشن</a>

                    <a href="PsGame.php?Zhanr=ورزشی" class="h4_menu_hover">ورزشی</a>

                    <a href="PsGame.php?Zhanr=ترسناک" class="h4_menu_hover">ترسناک</a>

                </div>


                <a href="PsGame.php" class="a_menu" id="a_bazi_ps">پلی استیشن<i class="fa fa-angle-down" style="font-size:20px;margin-right:9px;"></i></a>

                </div>


                <div class="div_bazi_list" id="div_about_us_koli"> 

                                    
                    <div id="div_about_us">

                        <p class="p_about_us">
                            
                            این سایت یک سایت جامع برای محصولات سه پلتفرم کامپیوتر و اکس باکس و پلی استیشن است نظر یا انتقاد و پیشنهادی با روی باز پذیرفته میشود

                            <br><br>

                            

                           <span style="font-size:16px;"> آدرس ایمیل:</span>

                            Game.bar@gmail.com
                            

                        </p>


                    </div>

                <a class="a_menu">درباره ما<i class="fa fa-angle-down" style="font-size:20px;margin-right:9px;"></i></a>

                </div>

                </div>


                </div>




                </div>


                                                                        <!-- body -->
                                                                        <!-- body -->
                                                                        <!-- body -->
                                                                        <!-- body -->
                                                                        <!-- body -->
                                                                        <!-- body -->
                                                                        <!-- body -->
                                                                        <!-- body -->
                                                                        <!-- body -->
                                                                        <!-- body -->
                                                                        <!-- body -->
                                                                        <!-- body -->
                                                                        <!-- body -->    
                                                                        <!-- body -->
                                                                        <!-- body -->
                                                                        <!-- body -->
                                                                        <!-- body -->

                                                          

                     

            <?php
            
                if(isset($_GET['name_mahsol'])){

                    $name_mahsol = $_GET['name_mahsol'];

                    $pelatform_mahsol = $_GET['pelatform_mahsol'];

                    $select_product = "SELECT * FROM mahsol__pc WHERE name_mahsol='$name_mahsol'";
                    $select_product_query = mysqli_query($conn_safhe_pc,$select_product);

                    if($pelatform_mahsol == "PC"){

                        if(mysqli_num_rows($select_product_query)){

                        $row = mysqli_fetch_assoc($select_product_query);
                        $row['name_mahsol'] = $name_mahsol;

                        echo '

                        <div class="div_mahsol_koli">

                        <div class="div_img_mahsol">

                            <img src="' . $row['img_1'] . '" alt="" style="min-width:50%;height:80%;" id="img_mahsol">

                        </div>

                        <div class="div_name_mahsol">

                            

                                <h2" id="name_mahsol" class="input_name_mahsol" style="width:auto">'. $row['name_mahsol'] .'</h2>

                                <span class="input_name_mahsol">' . $row['price_mahsol'] . '</span>

                                <span style="direction:ltr" class="input_name_mahsol">' . $row['dvd_mahsol'] . '  DVD`s </span>

                                <div id="div_submit_number_mahsol">
                                    
                                    <form action="test2.php" method="POST">

                                        <input type="submit" name="submit_mahsol" value="افزودن به سبد خرید" id="submit_mahsol" style="letter_spacing:0.05em;" class="submit_number_mahsol">

                                        <input type="hidden" name="hidden_mahsol" value="' . $row['name_asli'] .'">

                                    </form>

                                </div>


                           


                        </div>



                        </div>

                        <div class="div_info_koli">

                        <div class="div_info_botton">

                            <div id="div_span_center_info">
                                
                                <a class="span_info_mahsolat" id="span_info_mahsolat_inf"><i class="fa fa-newspaper-o" style="font-size:24px;display: block;text-align: center;"></i>توضیحات</a>

                                <a class="span_info_mahsolat" id="span_info_mahsolat_mosh"><i class="fa fa-info-circle" style="font-size:24px;display: block;text-align: center;"></i>مشخصات</a>

                            </div>

                        </div>

                        <div class="div_info">

                            <div class="div_img_info">

                                <img src="' . $row['img_2'] . '" alt="" class="img_info_mahsol">


                            </div>

                            <div class="div_info_about">

                                <h1 id="h2_info_about">درباره بازی : </h1>

                                <p id="p_info_about"> ' . $row['text_area'] .  ' </p>


                            </div>

                            <div class="div_system_info">

                                <h3 class="h4_hadaqal" style="color: red;">حداقل سیستم مورد نیاز برای اجرای بازی '. $row['name_mahsol'] . ' : </h3>

                                <div class="div_hadaqal">

                                    <span class="span_system_info">Processor: </span> <span class="span_system_info_answer">'. $row['aqal_processor'] .'</span><br><br>

                                    <span class="span_system_info">RAM : </span> <span class="span_system_info_answer">'. $row['aqal_ram'] .'</span><br><br>

                                    <span class="span_system_info">Graphics Card / GPU :</span> <span class="span_system_info_answer">' . $row['aqal_graphic'] . '</span><br><br>

                                    <span class="span_system_info">Operating System (OS) :</span> <span class="span_system_info_answer">' . $row['aqal_win'] . '</span><br><br>

                                    <span class="span_system_info">Hard Disk Space :</span> <span class="span_system_info_answer">'. $row['aqal_space'] . '</span><br><br>


                                </div>

                                <br><br><br><hr>

                                <h3 class="h4_hadaqal" style="color: green;">سیستم پیشنهادی برای اجرای بازی ' . $row['name_mahsol'] . ' : </h3>

                                <div class="div_hadaqal">

                                    <span class="span_system_info">Processor: </span> <span class="span_system_info_answer">' . $row['aksar_processor'] .'</span><br><br>

                                    <span class="span_system_info">RAM : </span> <span class="span_system_info_answer">' . $row['aksar_ram'] . '</span><br><br>

                                    <span class="span_system_info">Graphics Card / GPU :</span> <span class="span_system_info_answer">'. $row['aksar_graphic'] . '</span><br><br>

                                    <span class="span_system_info">Operating System (OS) :</span> <span class="span_system_info_answer">' . $row['aksar_win'] .'</span><br><br>

                                    <span class="span_system_info">Hard Disk Space :</span> <span class="span_system_info_answer">' . $row['alsar_space'] . '</span><br>


                                </div>



                            </div>

                            <div class="div_img_game">


                                <img style="max-width:400px;" class="img_info_mahsol" src="' . $row['img_3'] . '" alt="">

                                <img style="max-width:400px;"  class="img_info_mahsol" src="' . $row['img_4'] . '" alt="">

                                <img style="max-width:400px;"  class="img_info_mahsol" src="' . $row['img_5'] . '" alt="">

                                <img style="max-width:400px;"  class="img_info_mahsol" src="' . $row['img_6'] . '" alt="">


                            </div><br><br>



                        </div>

                        <div class="div_moshakhasat_koli" style="margin-bottom: 100px;">

                            <div class="div_moshakhasat">

                                <h3>سایر مشخصات بازی</h3>

                                <div>

                                    <a class="a_moshakhasat" style="margin-top: 0;">عنوان بازی : </a><a class="a_moshakhasat_answer"> '  . $row['name_mahsol'] .  ' </a>
                                    
                                </div>

                                <div>

                                    <a class="a_moshakhasat">رده سنی : </a><a class="a_moshakhasat_answer">' . $row['rade_mahsol'] . ' </a>
                                    
                                </div>

                                <div>

                                    <a class="a_moshakhasat">ژانر : </a><a class="a_moshakhasat_answer">' . $row['zhanr_mahsol'] . ' </a>
                                    
                                </div>
                                
                                <div>

                                    <a class="a_moshakhasat">پلتفرم ها : </a><a class="a_moshakhasat_answer">' . $row['pelatform_ejra_mahsol'] . ' </a>
                                    
                                </div>

                                <div>

                                    <a class="a_moshakhasat">زبان : </a><a class="a_moshakhasat_answer">' . $row['zaban_mahsol'] . ' </a>
                                    
                                </div>

                                <div>

                                    <a class="a_moshakhasat">بخش انلاین : </a><a class="a_moshakhasat_answer">' . $row['online_mahsol'] . ' </a>
                                    
                                </div>

                                <div>

                                    <a class="a_moshakhasat">تعداد بازیکن : </a><a class="a_moshakhasat_answer">' . $row['tedad_bazikon_mahsol'] . ' </a>
                                    
                                </div>

                                <div>

                                    <a class="a_moshakhasat">سازنده : </a><a class="a_moshakhasat_answer">' . $row['sazande_bazi_mahsol'] . ' </a>
                                    
                                </div>

                                <div>

                                    <a class="a_moshakhasat">ناشر : </a><a class="a_moshakhasat_answer">' . $row['nasher_mahsol'] . ' </a>
                                    
                                </div>

                                <div>

                                    <a class="a_moshakhasat">تاریخ نشر : </a><a class="a_moshakhasat_answer">' . $row['tarikh_mahsol'] . ' </a>
                                    
                                </div>


                                

                            </div>



                        </div>


                        ';


                    }
                   

                } else if($pelatform_mahsol == "Xbox" or $pelatform_mahsol == "PS"){




                    if(mysqli_num_rows($select_product_query)){

                        $row = mysqli_fetch_assoc($select_product_query);
                        $row['name_mahsol'] = $name_mahsol;

                        echo '

                        <div class="div_mahsol_koli">

                        <div class="div_img_mahsol">

                            <img src="' . $row['img_1'] . '" alt="" style="min-width:50%;height:80%;" id="img_mahsol">

                        </div>

                        <div class="div_name_mahsol">

                            

                                <h2" id="name_mahsol" class="input_name_mahsol" style="width:auto">'. $row['name_mahsol'] .'</h2>

                                <span class="input_name_mahsol">' . $row['price_mahsol'] . '</span>

                                <span style="direction:ltr" class="input_name_mahsol">' . $row['dvd_mahsol'] . '  DVD`s </span>

                                <div id="div_submit_number_mahsol">
                                    
                                    <form action="test2.php" method="POST">

                                        <input type="submit" name="submit_mahsol" value="افزودن به سبد خرید" id="submit_mahsol" style="letter_spacing:0.05em;" class="submit_number_mahsol">

                                        <input type="hidden" name="hidden_mahsol" value="' . $row['name_asli'] .'">

                                    </form>

                                </div>


                           


                        </div>



                        </div>

                        <div class="div_info_koli">

                        <div class="div_info_botton">

                            <div id="div_span_center_info">
                                
                                <a class="span_info_mahsolat" id="span_info_mahsolat_inf"><i class="fa fa-newspaper-o" style="font-size:24px;display: block;text-align: center;"></i>توضیحات</a>

                                <a class="span_info_mahsolat" id="span_info_mahsolat_mosh"><i class="fa fa-info-circle" style="font-size:24px;display: block;text-align: center;"></i>مشخصات</a>

                            </div>

                        </div>

                        <div class="div_info">

                            <div class="div_img_info">

                                <img src="' . $row['img_2'] . '" alt="" class="img_info_mahsol">


                            </div>

                            <div class="div_info_about">

                                <h1 id="h2_info_about">درباره بازی : </h1>

                                <p id="p_info_about"> ' . $row['text_area'] .  ' </p>


                            </div>


                            <div class="div_img_game">


                                <img style="max-width:400px;" class="img_info_mahsol" src="' . $row['img_3'] . '" alt="">

                                <img style="max-width:400px;"  class="img_info_mahsol" src="' . $row['img_4'] . '" alt="">

                                <img style="max-width:400px;"  class="img_info_mahsol" src="' . $row['img_5'] . '" alt="">

                                <img style="max-width:400px;"  class="img_info_mahsol" src="' . $row['img_6'] . '" alt="">


                            </div><br><br>



                        </div>

                        <div class="div_moshakhasat_koli" style="margin-bottom: 100px;">

                            <div class="div_moshakhasat">

                                <h3>سایر مشخصات بازی</h3>

                                <div>

                                    <a class="a_moshakhasat" style="margin-top: 0;">عنوان بازی : </a><a class="a_moshakhasat_answer"> '  . $row['name_mahsol'] .  ' </a>
                                    
                                </div>

                                <div>

                                    <a class="a_moshakhasat">رده سنی : </a><a class="a_moshakhasat_answer">' . $row['rade_mahsol'] . ' </a>
                                    
                                </div>

                                <div>

                                    <a class="a_moshakhasat">ژانر : </a><a class="a_moshakhasat_answer">' . $row['zhanr_mahsol'] . ' </a>
                                    
                                </div>
                                
                                <div>

                                    <a class="a_moshakhasat">پلتفرم ها : </a><a class="a_moshakhasat_answer">' . $row['pelatform_ejra_mahsol'] . ' </a>
                                    
                                </div>

                                <div>

                                    <a class="a_moshakhasat">زبان : </a><a class="a_moshakhasat_answer">' . $row['zaban_mahsol'] . ' </a>
                                    
                                </div>

                                <div>

                                    <a class="a_moshakhasat">بخش انلاین : </a><a class="a_moshakhasat_answer">' . $row['online_mahsol'] . ' </a>
                                    
                                </div>

                                <div>

                                    <a class="a_moshakhasat">تعداد بازیکن : </a><a class="a_moshakhasat_answer">' . $row['tedad_bazikon_mahsol'] . ' </a>
                                    
                                </div>

                                <div>

                                    <a class="a_moshakhasat">سازنده : </a><a class="a_moshakhasat_answer">' . $row['sazande_bazi_mahsol'] . ' </a>
                                    
                                </div>

                                <div>

                                    <a class="a_moshakhasat">ناشر : </a><a class="a_moshakhasat_answer">' . $row['nasher_mahsol'] . ' </a>
                                    
                                </div>

                                <div>

                                    <a class="a_moshakhasat">تاریخ نشر : </a><a class="a_moshakhasat_answer">' . $row['tarikh_mahsol'] . ' </a>
                                    
                                </div>


                                

                            </div>



                        </div>


                        ';


                    }
                }


                }else if(isset($_GET['takhfifan'])){

                    $name = $_GET['takhfifan'];

                    $pelatform = $_GET['pelatform'];

                    $price = $_GET['price'];

                    if($pelatform == "PC"){
                        $table = "mahsol__pc";
                        $db = $conn_safhe_pc;

                    }else if ($pelatform == "Xbox"){
                        $table = "mahsol_xb";
                    }else if($pelatform == "PS4" or $pelatform == "PS5"){
                        $table = "mahsol_ps";
                    }else{
                        header("location:index.php?Cannotfindgame=2513");
                        exit();
                    }

                    $select = "SELECT * FROM $table WHERE name_mahsol='$name'";
                    $select_query = mysqli_query($db,$select);
                    if(mysqli_num_rows($select_query)){

                        $row = mysqli_fetch_assoc($select_query);
                        // $row['name_mahsol'] = $name_mahsol;

                        echo '

                        <div class="div_mahsol_koli">

                        <div class="div_img_mahsol">

                            <img src="' . $row['img_1'] . '" alt="" style="min-width:50%;height:80%;" id="img_mahsol">

                        </div>

                        <div class="div_name_mahsol">

                            

                                <h2" id="name_mahsol" class="input_name_mahsol">'. $row['name_mahsol'] .'</h2>

                                <span class="input_name_mahsol">' . $price . '<span style="color:red;font-size:15px;">(Off)</span></span>

                                <span style="direction:ltr" class="input_name_mahsol">' . $row['dvd_mahsol'] . '  DVD`s </span>

                                <div id="div_submit_number_mahsol">

                                    <form style="display:inline-block;" action="" method="POST">

                                        <input type="submit" name="submit_mahsol" value="افزودن به سبد خرید" id="submit_mahsol" style="letter_spacing:0.05em;" class="submit_number_mahsol">

                                        <input type="hidden" name="hidden_mahsol" value="' . $row['name_asli'] .'">

                                    </form>

                                </div>


                           


                        </div>



                        </div>

                        <div class="div_info_koli">

                        <div class="div_info_botton">

                            <div id="div_span_center_info">
                                
                                <a class="span_info_mahsolat" id="span_info_mahsolat_inf"><i class="fa fa-newspaper-o" style="font-size:24px;display: block;text-align: center;"></i>توضیحات</a>

                                <a class="span_info_mahsolat" id="span_info_mahsolat_mosh"><i class="fa fa-info-circle" style="font-size:24px;display: block;text-align: center;"></i>مشخصات</a>

                            </div>

                        </div>

                        <div class="div_info">

                            <div class="div_img_info">

                                <img src="' . $row['img_2'] . '" alt="" class="img_info_mahsol">


                            </div>

                            <div class="div_info_about">

                                <h1 id="h2_info_about">درباره بازی : </h1>

                                <p id="p_info_about"> ' . $row['text_area'] .  ' </p>


                            </div>

                            <div class="div_system_info">

                                <h3 class="h4_hadaqal" style="color: red;">حداقل سیستم مورد نیاز برای اجرای بازی Red Dead 2 : </h3>

                                <div class="div_hadaqal">

                                    <span class="span_system_info">Processor: </span> <span class="span_system_info_answer">'. $row['aqal_processor'] .'</span><br><br>

                                    <span class="span_system_info">RAM : </span> <span class="span_system_info_answer">'. $row['aqal_ram'] .'</span><br><br>

                                    <span class="span_system_info">Graphics Card / GPU :</span> <span class="span_system_info_answer">' . $row['aqal_graphic'] . '</span><br><br>

                                    <span class="span_system_info">Operating System (OS) :</span> <span class="span_system_info_answer">' . $row['aqal_win'] . '</span><br><br>

                                    <span class="span_system_info">Hard Disk Space :</span> <span class="span_system_info_answer">'. $row['aqal_space'] . '</span><br><br>


                                </div>

                                <br><br><br><hr>

                                <h3 class="h4_hadaqal" style="color: green;">سیستم پیشنهادی برای اجرای بازی Red Dead 2 : </h3>

                                <div class="div_hadaqal">

                                    <span class="span_system_info">Processor: </span> <span class="span_system_info_answer">' . $row['aksar_processor'] .'</span><br><br>

                                    <span class="span_system_info">RAM : </span> <span class="span_system_info_answer">' . $row['aksar_ram'] . '</span><br><br>

                                    <span class="span_system_info">Graphics Card / GPU :</span> <span class="span_system_info_answer">'. $row['aksar_graphic'] . '</span><br><br>

                                    <span class="span_system_info">Operating System (OS) :</span> <span class="span_system_info_answer">' . $row['aksar_win'] .'</span><br><br>

                                    <span class="span_system_info">Hard Disk Space :</span> <span class="span_system_info_answer">' . $row['alsar_space'] . '</span><br>


                                </div>



                            </div>

                            <div class="div_img_game">


                                <img style="max-width:400px;" class="img_info_mahsol" src="' . $row['img_3'] . '" alt="">

                                <img style="max-width:400px;"  class="img_info_mahsol" src="' . $row['img_4'] . '" alt="">

                                <img style="max-width:400px;"  class="img_info_mahsol" src="' . $row['img_5'] . '" alt="">

                                <img style="max-width:400px;"  class="img_info_mahsol" src="' . $row['img_6'] . '" alt="">


                            </div><br><br>



                        </div>

                        <div class="div_moshakhasat_koli" style="margin-bottom: 100px;">

                            <div class="div_moshakhasat">

                                <h3>سایر مشخصات بازی</h3>

                                <div>

                                    <a class="a_moshakhasat" style="margin-top: 0;">عنوان بازی : </a><a class="a_moshakhasat_answer"> '  . $row['name_mahsol'] .  ' </a>
                                    
                                </div>

                                <div>

                                    <a class="a_moshakhasat">رده سنی : </a><a class="a_moshakhasat_answer">' . $row['rade_mahsol'] . ' </a>
                                    
                                </div>

                                <div>

                                    <a class="a_moshakhasat">ژانر : </a><a class="a_moshakhasat_answer">' . $row['zhanr_mahsol'] . ' </a>
                                    
                                </div>
                                
                                <div>

                                    <a class="a_moshakhasat">پلتفرم ها : </a><a class="a_moshakhasat_answer">' . $row['pelatform_mahsol'] . ' </a>
                                    
                                </div>

                                <div>

                                    <a class="a_moshakhasat">زبان : </a><a class="a_moshakhasat_answer">' . $row['zaban_mahsol'] . ' </a>
                                    
                                </div>

                                <div>

                                    <a class="a_moshakhasat">بخش انلاین : </a><a class="a_moshakhasat_answer">' . $row['online_mahsol'] . ' </a>
                                    
                                </div>

                                <div>

                                    <a class="a_moshakhasat">تعداد بازیکن : </a><a class="a_moshakhasat_answer">' . $row['tedad_bazikon_mahsol'] . ' </a>
                                    
                                </div>

                                <div>

                                    <a class="a_moshakhasat">سازنده : </a><a class="a_moshakhasat_answer">' . $row['sazande_bazi_mahsol'] . ' </a>
                                    
                                </div>

                                <div>

                                    <a class="a_moshakhasat">ناشر : </a><a class="a_moshakhasat_answer">' . $row['nasher_mahsol'] . ' </a>
                                    
                                </div>

                                <div>

                                    <a class="a_moshakhasat">تاریخ نشر : </a><a class="a_moshakhasat_answer">' . $row['tarikh_mahsol'] . ' </a>
                                    
                                </div>


                                

                            </div>



                        </div>


                        ';

                    }


                    }else if(isset($_GET['porforosh'])){

                        $name = $_GET['porforosh'];

                        $pelatform = $_GET['pelatform'];

                        if($pelatform == "PC"){
                            $table = "mahsol__pc";
                            $db = $conn_safhe_pc;
                        }else if($pelatform == "Xbox"){
                            $table = "mahsol_xbox";
                            
                        }else if($pelatform == "PS5" or $pelatform == "PS4"){
                            $table = "mahsol_ps";
                        }else{
                            header("location:index.php?Cannotfindgame=456");
                            exit();
                        }

                        $select = "SELECT * FROM $table WHERE name_mahsol='$name'";

                        $select_query = mysqli_query($db,$select);

                        if(mysqli_num_rows($select_query)){

                            $row = mysqli_fetch_assoc($select_query);
                            // $row['name_mahsol'] = $name_mahsol;
    
                            echo '
    
                            <div class="div_mahsol_koli">
    
                            <div class="div_img_mahsol">
    
                                <img src="' . $row['img_1'] . '" alt="" style="min-width:50%;height:80%;" id="img_mahsol">
    
                            </div>
    
                            <div class="div_name_mahsol">
    
                                
    
                                    <h2" id="name_mahsol" class="input_name_mahsol">'. $row['name_mahsol'] .'</h2>
    
                                    <span class="input_name_mahsol">' . $row['price_mahsol'] . '</span>
    
                                    <span style="direction:ltr" class="input_name_mahsol">' . $row['dvd_mahsol'] . '  DVD`s </span>
    
                                    <div id="div_submit_number_mahsol">
                       
                                    <form style="display:inline-block;" action="" method="POST">

                                        <input type="submit" name="submit_mahsol" value="افزودن به سبد خرید" id="submit_mahsol" style="letter_spacing:0.05em;" class="submit_number_mahsol">

                                        <input type="hidden" name="hidden_mahsol" value="' . $row['name_asli'] .'">

                                    </form>
    
                                    </div>
    
    
                               
    
    
                            </div>
    
    
    
                            </div>
    
                            <div class="div_info_koli">
    
                            <div class="div_info_botton">
    
                                <div id="div_span_center_info">
                                    
                                    <a class="span_info_mahsolat" id="span_info_mahsolat_inf"><i class="fa fa-newspaper-o" style="font-size:24px;display: block;text-align: center;"></i>توضیحات</a>
    
                                    <a class="span_info_mahsolat" id="span_info_mahsolat_mosh"><i class="fa fa-info-circle" style="font-size:24px;display: block;text-align: center;"></i>مشخصات</a>
    
                                </div>
    
                            </div>
    
                            <div class="div_info">
    
                                <div class="div_img_info">
    
                                    <img src="' . $row['img_2'] . '" alt="" class="img_info_mahsol">
    
    
                                </div>
    
                                <div class="div_info_about">
    
                                    <h1 id="h2_info_about">درباره بازی : </h1>
    
                                    <p id="p_info_about"> ' . $row['text_area'] .  ' </p>
    
    
                                </div>
    
                                <div class="div_system_info">
    
                                    <h3 class="h4_hadaqal" style="color: red;">حداقل سیستم مورد نیاز برای اجرای بازی Red Dead 2 : </h3>
    
                                    <div class="div_hadaqal">
    
                                        <span class="span_system_info">Processor: </span> <span class="span_system_info_answer">'. $row['aqal_processor'] .'</span><br><br>
    
                                        <span class="span_system_info">RAM : </span> <span class="span_system_info_answer">'. $row['aqal_ram'] .'</span><br><br>
    
                                        <span class="span_system_info">Graphics Card / GPU :</span> <span class="span_system_info_answer">' . $row['aqal_graphic'] . '</span><br><br>
    
                                        <span class="span_system_info">Operating System (OS) :</span> <span class="span_system_info_answer">' . $row['aqal_win'] . '</span><br><br>
    
                                        <span class="span_system_info">Hard Disk Space :</span> <span class="span_system_info_answer">'. $row['aqal_space'] . '</span><br><br>
    
    
                                    </div>
    
                                    <br><br><br><hr>
    
                                    <h3 class="h4_hadaqal" style="color: green;">سیستم پیشنهادی برای اجرای بازی Red Dead 2 : </h3>
    
                                    <div class="div_hadaqal">
    
                                        <span class="span_system_info">Processor: </span> <span class="span_system_info_answer">' . $row['aksar_processor'] .'</span><br><br>
    
                                        <span class="span_system_info">RAM : </span> <span class="span_system_info_answer">' . $row['aksar_ram'] . '</span><br><br>
    
                                        <span class="span_system_info">Graphics Card / GPU :</span> <span class="span_system_info_answer">'. $row['aksar_graphic'] . '</span><br><br>
    
                                        <span class="span_system_info">Operating System (OS) :</span> <span class="span_system_info_answer">' . $row['aksar_win'] .'</span><br><br>
    
                                        <span class="span_system_info">Hard Disk Space :</span> <span class="span_system_info_answer">' . $row['alsar_space'] . '</span><br>
    
    
                                    </div>
    
    
    
                                </div>
    
                                <div class="div_img_game">
    
    
                                    <img style="max-width:400px;" class="img_info_mahsol" src="' . $row['img_3'] . '" alt="">
    
                                    <img style="max-width:400px;"  class="img_info_mahsol" src="' . $row['img_4'] . '" alt="">
    
                                    <img style="max-width:400px;"  class="img_info_mahsol" src="' . $row['img_5'] . '" alt="">
    
                                    <img style="max-width:400px;"  class="img_info_mahsol" src="' . $row['img_6'] . '" alt="">
    
    
                                </div><br><br>
    
    
    
                            </div>
    
                            <div class="div_moshakhasat_koli" style="margin-bottom: 100px;">
    
                                <div class="div_moshakhasat">
    
                                    <h3>سایر مشخصات بازی</h3>
    
                                    <div>
    
                                        <a class="a_moshakhasat" style="margin-top: 0;">عنوان بازی : </a><a class="a_moshakhasat_answer"> '  . $row['name_mahsol'] .  ' </a>
                                        
                                    </div>
    
                                    <div>
    
                                        <a class="a_moshakhasat">رده سنی : </a><a class="a_moshakhasat_answer">' . $row['rade_mahsol'] . ' </a>
                                        
                                    </div>
    
                                    <div>
    
                                        <a class="a_moshakhasat">ژانر : </a><a class="a_moshakhasat_answer">' . $row['zhanr_mahsol'] . ' </a>
                                        
                                    </div>
                                    
                                    <div>
    
                                        <a class="a_moshakhasat">پلتفرم ها : </a><a class="a_moshakhasat_answer">' . $row['pelatform_mahsol'] . ' </a>
                                        
                                    </div>
    
                                    <div>
    
                                        <a class="a_moshakhasat">زبان : </a><a class="a_moshakhasat_answer">' . $row['zaban_mahsol'] . ' </a>
                                        
                                    </div>
    
                                    <div>
    
                                        <a class="a_moshakhasat">بخش انلاین : </a><a class="a_moshakhasat_answer">' . $row['online_mahsol'] . ' </a>
                                        
                                    </div>
    
                                    <div>
    
                                        <a class="a_moshakhasat">تعداد بازیکن : </a><a class="a_moshakhasat_answer">' . $row['tedad_bazikon_mahsol'] . ' </a>
                                        
                                    </div>
    
                                    <div>
    
                                        <a class="a_moshakhasat">سازنده : </a><a class="a_moshakhasat_answer">' . $row['sazande_bazi_mahsol'] . ' </a>
                                        
                                    </div>
    
                                    <div>
    
                                        <a class="a_moshakhasat">ناشر : </a><a class="a_moshakhasat_answer">' . $row['nasher_mahsol'] . ' </a>
                                        
                                    </div>
    
                                    <div>
    
                                        <a class="a_moshakhasat">تاریخ نشر : </a><a class="a_moshakhasat_answer">' . $row['tarikh_mahsol'] . ' </a>
                                        
                                    </div>
    
    
                                    
    
                                </div>
    
    
    
                            </div>
    
    
                            ';
                        }
                    }else{

                        echo "<script>window.location = 'index.php'</script>";


                    }


                




                
            
            
            
            
            
            ?>                                                            


          


            
            
                                                                    <!-- footer -->
                                                                    <!-- footer -->
                                                                    <!-- footer -->

            
              <div class="div_footer">

                <div class="div_footer_slide">

                    <h2 class="h2_footer_slide">پلی استیشن</h2>

                </div>

                <div class="div_footer_slide">

                    <h2 class="h2_footer_slide">ایکس باکس</h2>

                </div>

                <div class="div_footer_slide">

                    <h2 class="h2_footer_slide">پی سی</h2>

                </div>


              </div>  



        </div>

        <h3 id="support">Unfortunately, your device does not support this site</h3>

        


        </div> 
        
    </body>


</html>