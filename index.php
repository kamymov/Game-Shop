<?php 

    include  'DataBase.php';
    session_start();


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="styles/style12.css">
    <!-- <link rel="icon" href=""> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="script1.js"></script>
    <style>
    .div_pc_producs{
        border: 2px solid black;
    }
    </style>
    <style>


        #input_search::placeholder{
            color:black;
        }

        #img_logo{
            width:90px;
            height: 60px;
        }

    </style>
    <title>Game Bar</title>
</head>

    <body>

        <div class="body">

                                                            <!-- menu responsive options click -->
            
            <div class="div_menu_responsive">

                <i class="fa fa-arrow-right" id="arrow_right" style="font-size:36px;color: white;margin: 10px 20px 0px 0px;cursor: pointer;"></i>

                <a href="index.php" class="a_menu_responsive" style="color: red;">صفحه اصلی<i class="fa fa-angle-left" style="font-size:20px;margin-right:9px;color: white;"></i></a>
                <a href="PcGame.php" class="a_menu_responsive">کامپیوتر<i class="fa fa-angle-left" style="font-size:20px;margin-right:9px;color: white;"></i></a>
                <a href="XbGame.php" class="a_menu_responsive">ایکس باکس<i class="fa fa-angle-left" style="font-size:20px;margin-right:9px;color: white;"></i></a>
                <a href="PsGame.php" class="a_menu_responsive">پلی استیشن<i class="fa fa-angle-left" style="font-size:20px;margin-right:9px;color: white;"></i></a>
                <a class="a_menu_responsive">درباره ما<i class="fa fa-angle-left" style="font-size:20px;margin-right:9px;color: white;"></i></a>


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

                                

                    $count = count($_SESSION['cart']);

                    if($count > 0){

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
                echo "<div style='height:100%;'> <h1 style='color:white;text-align:center;'> هیچ محصولی برای ثبت وجود ندارد ...! </h1> </div>";
                }


                }

                if(isset($_SESSION['cart'])){

                $count = count($_SESSION['cart']);

                if($count > 0){
                    
                    echo '
                    
                        <div style="background-color:#747474;width:170px;cursor:pointer;margin: 10px auto;border-radius:20px;padding: 2.5px 10px;">

                            <h4 style="color:white;border-radius:10px;">ثبت خرید و پرداخت</h4>

                        </div>  
                    
                    ';

                }

                }


    ?>
    
    
    
    
    </div>
    
    
    
    
    
    </div>
    

                                                               <!-- Rregister field -->

                <div class="div_login" id="div_register">

                    <i class="fa fa-times" id="multipart_register"></i>
            
                    <div class="div_form_login" id="div_form_register">
            
            
            
                        <h1 style="text-align: center;padding-top: 30px;color:black;">ثبت نام</h1>

                        <?php
                        
                            if(isset($_GET['empty'])){
                                echo "<script>alert('Inputs cannot be empty!!!')</scr>";
                            }

                            if(isset($_GET['notequal'])){
                                echo "<script>alert('Passwords are not equal!!!')</script>";
                            }

                            if(isset($_GET['existuser'])){
                                echo "<script>alert('User name is exist in database!!!')</script>";
                            }

                            if(isset($_GET['sucessregister'])){
                                echo "<script>alert('Successfuly registered')</script>";
                            }
                        
                        
                        ?>
            
                        <form action="LoginRegister.php" method="POST">
            
                            <input type="text" name="Register_UserName" id="" class="input_login_register" placeholder="نام کاربری..." autocomplete="off">
            
                            <input type="email" name="Register_Email" id="" class="input_login_register" placeholder="ایمیل..." autocomplete="off">
            
                            <input type="number" name="Register_Phone" id="" class="input_login_register" placeholder="تلفن همراه..." autocomplete="off">

                            <input type="password" name="Register_Password" id="" class="input_login_register" placeholder="رمز عبور..." autocomplete="off" min="8" max="32">
            
                            <input type="password" name="Register_Password_2" id="" class="input_login_register" placeholder="تکرار رمز عبور..." autocomplete="off" min="8" max="32">
            
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

                    <?php

                    if(isset($_GET['successfulylogin'])){
                        echo "<script>alert('خوش آمدید  " . $_COOKIE['User'] . " ')</script>";
                    }

                    if(isset($_GET['cannotlogin'])){
                        echo "<script>alert('اطلاعات وارد شده صحیح نمی باشد')</script>";
                    }
                    
                    if(isset($_GET['Cannotfindgame'])){
                        echo "<script>alert('با عرض پوزش سایت ما با مشکل مواجه شده است')</script>";
                    }
                    
                    
                    ?>
            
            
            
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

                            <?php

                                if(isset($_GET['SuccessfulyAddCart'])){

                                    echo "<script>alert('محصول شما با موفقیت به سبد خرید اضافه شد!!!')</script>";

                                }
                            
                            
                            
                            ?>

                            

                            


                        </div>

                        

                                                                                <!-- Search -->

                        <div class="div_search">

                            <form action="" id="form_search">
            
                                <input type="text" name="" placeholder="جستجو..." id="input_search">
            
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

                            <a href="index.php" style="color: red;"  class="a_menu">صفحه اصلی</a>

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

                    <div class="div_menu_hover"  id="div_menu_hover_xb" style=";border-radius: 0px 0px 10px 10px">

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

                    <div class="div_menu_hover" id="div_menu_hover_ps" style="border-radius: 0px 0px 10px 10px">

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

                        <p class="p_about_us" style="font-family:DastNevis;">
                            
                            این سایت یک سایت جامع برای محصولات سه پلتفرم کامپیوتر و اکس باکس و پلی استیشن است نظر یا انتقاد و پیشنهادی با روی باز پذیرفته میشود

                            <br><br>

                            

                        <span style="font-size:16px;font-family:IranSans"> آدرس ایمیل:</span>

                            <span style="font-family:Hashed">Game.bar@gmail.com</span>
                            

                        </p>


                    </div>

                    <a class="a_menu">درباره ما<i class="fa fa-angle-down" style="font-size:20px;margin-right:9px;"></i></a>

                    </div>

            </div>


        </div>




                </div>

                                                                        <!-- menu end -->
                                                                        
                                                                        <!-- Body -->
                                                                        <!-- Body -->
                                                                        <!-- Body  -->

                <div class="div_body">

                    <div class="div_image_asli">

                    <?php 

                        $select_aks_asli = "SELECT * FROM aks_asli";

                        $select_aks_asli_query = mysqli_query($conn_safhe_asli,$select_aks_asli);

                        if(mysqli_num_rows($select_aks_asli_query) > 0){

                            while($row = mysqli_fetch_assoc($select_aks_asli_query)){
                                ?>  

                                <img src="<?php echo $row['img_src'] ?>" alt="" id="image_safhe_asli">

                                <?php
                            }

                        }


                    ?>

                    </div>

                                                    <!-- takhfif field -->

                    <div id="div_takhfif_koli">

                            <h3 id="h1_takhfif">تخفیفان ما</h3>

                        <div class="div_takhfif_Result">

                            <div class="div_producs_safhe_asli">

                                    <?php 
                                    
                                        $select_takhfifan = "SELECT * FROM takhfifan";

                                        $select_takhfifan_qeury = mysqli_query($conn_safhe_asli,$select_takhfifan);


                                        if(mysqli_num_rows($select_takhfifan_qeury) > 0 ){

                                            while($row = mysqli_fetch_assoc($select_takhfifan_qeury)){

                                                    $img   = $row['takhfifan_img'];
                                                    $name = $row['takhfifan_name'];
                                                    $bdon_off = $row['takhfifan_bdon_off'];
                                                    $ba_off = $row['takhfifan_ba_off'];
                                                    $pelatform = $row['takhfifan_pelatform'];

                                                echo "
                                                        
                                                            <div class='div_pc_producs' style='max-height:419px;'>

                                                                <div class='img_mahsol'>
                                                                
                                                                    <img src='$img' class='pc_producs_img'>

                                                                </div>            

                                                                    <a href='mahsol.php?takhfifan=$name&pelatform=$pelatform&price=$ba_off' class='span_sefaresh' style='text-decoration:none;'>ثبت سفارش</a>

                                                                    <h3 class='pc_producs_name'>$name</h3>

                                                                    <h4 class='pc_producs_price'><span style='text-decoration:line-through;color: red;'>$bdon_off</span><br><span style='color:black;' >$ba_off</span></h4>

                                                                    <h4 class='pc_producs_price' style='color:black;'>$pelatform</h4>


                                                            </div>

                                                        
                                                ";    
                                                    


                                                

                                            }

                                        }
                                    
                                    
                                    
                                    
                                    ?>


                            </div>            
                                                                    
                                                        
                            
                                                        
                        </div>

                    </div>

                                                        <!-- porforosh haye hafte -->

                    <div class="div_porforosh_koli">

                    

                        <h3 id="h1_porforosh">پرفروش های چند وقت اخیر</h3>

                    
                        <div class="div_producs_safhe_asli">    

                            <?php
                                
                                $select_porforosh = "SELECT * FROM porforosh";

                                $select_porforosh_query = mysqli_query($conn_safhe_asli,$select_porforosh);

                                if(mysqli_num_rows($select_porforosh_query) > 0){
                                    while($row = mysqli_fetch_assoc($select_porforosh_query)){

                                        $name = $row['porforosh_name'];
                                        $img = $row['porforosh_img'];
                                        $price = $row['porforosh_price'];
                                        $pelatform = $row['porforosh_pelatform'];

                                        echo "

                                                    <div class='div_pc_producs'>

                                                        <div class='img_mahsol'>
                                                                        
                                                            <img src='$img' class='pc_producs_img' alt='$name img'>

                                                        </div>
                                                    

                                                        <a href='mahsol.php?porforosh=$name&pelatform=$pelatform' style='text-decoration:none;' class='span_sefaresh'>ثبت سفارش</a>

                                                        <h3 class='pc_producs_name'>$name</h3>             

                                                        <h4 class='pc_producs_price'>$price</h4>

                                                        <h4 class='pc_producs_price' style='color:black;'>$pelatform</h4>



                                                </div>



                                        ";

                                    }
                                }
                                
                                
                                
                                
                            ?>
                            
                        </div>

                                                                                <!-- taze moarefi shode -->
                        

                    

                    <div class="div_moarefi_koli">

                    <h3 id="h1_porforosh" style="color: green;">تازه معرفی شده : </h3>

                    <br>


                    <?php
                    
                        $select_darbare = "SELECT * FROM darbare";

                        $select_darbare_query = mysqli_query($conn_safhe_asli,$select_darbare);

                        if(mysqli_num_rows($select_darbare_query) > 0 ){

                            while($row = mysqli_fetch_assoc($select_darbare_query)){

                                ?>

                                    <div class="div_moarefi_result">

                                        <div id="div_moarefi">

                                            <div id="div_img_moarefi">

                                                <img src="<?php echo $row['darbare_img'] ?>" alt="" id="img_moarefi">
                                                
                                            </div>

                                            <div id="div_information_moarefi">

                                                <h2>نام بازی : </h2>

                                                <h4 id="h4_name_moarefi"><?php echo $row['darbare_name'] ?></h4>

                                                <h2>درباره : </h2>

                                                <p id="p_darbare_moarefi">

                                                    <?php echo $row['darbare_text'] ?>

                                                </p>

                                            </div>

                                            


                                        </div>



                                    </div>

                                    


                                <?php

                            }

                        }
                    ?>



                        


                    </div>

                                                                        

                </div>   

            </div>
                
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