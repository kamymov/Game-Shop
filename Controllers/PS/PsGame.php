<?php

    include "DataBase.php";
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
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
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
    <title>محصولات پلی استیشن</title>
</head>
<body>

                
    <div class="body">

                <!-- menu responsive options click -->

        <div class="div_menu_responsive">

            <i class="fa fa-arrow-right" id="arrow_right" style="font-size:36px;color: white;margin: 10px 20px 0px 0px;cursor: pointer;"></i>

            <a href="index.php" class="a_menu_responsive">صفحه اصلی<i class="fa fa-angle-left" style="font-size:20px;margin-right:9px;color: white;"></i></a>
            <a href="PcGame.php" class="a_menu_responsive">بازی های Pc<i class="fa fa-angle-left" style="font-size:20px;margin-right:9px;color: white;"></i></a>
            <a href="XbGame.php" class="a_menu_responsive">ایکس باکس<i class="fa fa-angle-left" style="font-size:20px;margin-right:9px;color: white;"></i></a>
            <a href="PsGame.php" style="color: blue;" class="a_menu_responsive">پلی استیشن<i class="fa fa-angle-left" style="font-size:20px;margin-right:9px;color: white;"></i></a>
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
                        
                            <div style="cursor:pointer;background-color:#747474;width:175px;;margin: 10px auto;border-radius:20px;padding: 2.5px 10px;">

                                <h2 style="color:white;border-radius:10px;font-size:15px;text-align:center;">ثبت خرید و پرداخت</h2>

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



                        <h1 style="text-align: center;padding-top: 30px;color:black">ثبت نام</h1>

                        <form action="LoginRegister.php" method="POST">

                            <input type="text" name="Register_UserName" id="" class="input_login_register" placeholder="نام کاربری..." autocomplete="off">

                            <input type="text" name="Register_Email" id="" class="input_login_register" placeholder="ایمیل..." autocomplete="off">

                            <input type="text" name="Register_Phone" id="" class="input_login_register" placeholder="تلفن همراه..." autocomplete="off">

                            <input type="password" name="Register_Password" id="" class="input_login_register" placeholder="رمز عبور..." autocomplete="off">

                            <input type="password" name="Register_Password_2" id="" class="input_login_register" placeholder="تکرار رمز عبور..." autocomplete="off">

                            <input type="submit" name="Register_submit" value="ارسال" class="submit_login">

                        <br>

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

<a href="index.php" class="a_menu">صفحه اصلی</a>

<div class="div_bazi_list" id="div_bazi_pc">

    <div class="div_menu_hover"  id="div_menu_hover_pc" style=";border-radius: 0px 0px 10px 10px;">

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

    <div class="div_menu_hover"  id="div_menu_hover_xb" style="border-radius: 0px 0px 10px 10px;">

        <a href="XbGame.php?Zhanr=استراتژیک" class="h4_menu_hover">استراتژیک</a>

        <a href="XbGame.php?Zhanr=ماجراجویی" class="h4_menu_hover">ماجراجویی</a>

        <a href="XbGame.php?Zhanr=جهان باز" class="h4_menu_hover">جهان باز</a>

        <a href="XbGame.php?Zhanr=اکشن" class="h4_menu_hover">اکشن</a>

        <a href="XbGame.php?Zhanr=ورزشی" class="h4_menu_hover">ورزشی</a>

        <a href="XbGame.php?Zhanr=ترسناک" class="h4_menu_hover">ترسناک</a>

    </div>

    <a href="XbGame.php" class="a_menu" id="a_bazi_xb">ایکس باکس<i class="fa fa-angle-down" style="font-size:20px;margin-right:9px;"></i></a>

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


    <a href="PsGame.php" class="a_menu" style="color:0048ae;" id="a_bazi_ps">پلی استیشن<i class="fa fa-angle-down" style="font-size:20px;margin-right:9px;"></i></a>

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


                                                            <!-- body -->
                                                            <!-- body -->
                                                            <!-- body -->
            
        <div class="div_body_pxs">

        <div class="div_filter_koli" style="border-radius: 0px 0px 25px 25px">

<div class="div_filter_mojod">

    <h1 id="h2_filter_on" style="color:white;text-align:center;">فیلتر</h1>

</div>

<div class="div_filter" style="border-top:none;">

    
        <br>
        <label class="label_filter" for="Game_Genre"> ژانر : </label>
        
        <div id="div_select_range">

            <script>
                  
                  function FilterZhanr(Zhanr){

                    if(Zhanr == ""){
                        document.getElementById("div_pc").innerHTML = "";
                        return;
                    }else if(Zhanr == "none"){

                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.onreadystatechange = function(){
                            if(this.readyState == 4 && this.status == 200){
                                document.getElementById("div_pc").innerHTML = this.responseText;
                            }
                        }
                        xmlhttp.open("GET","DeleteFilter.php?plt=" + Zhanr + "&pt=PS",true);
                        xmlhttp.send();


                    }else{
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.onreadystatechange = function(){
                            if(this.readyState == 4 && this.status == 200){
                                document.getElementById("div_pc").innerHTML = this.responseText;
                            }

                        }
                        xmlhttp.open("GET" , "Filter.php?rq=" + Zhanr + "&tr=zhanr_mahsol&tb=PS", true);
                        xmlhttp.send();
                    }


                  }

                    

            </script>

            <form action="" style="display:inline-block">
        
            <select name="select_filter" id="select_filter" onchange="FilterZhanr(this.value)">
                                  <?php
                                  
                                  
                                  if(isset($_GET['Zhanr'])){
                                      
                                    
                                    $Zhanr = $_GET['Zhanr'];
                                    
                                    echo "<option value='none'>بدون فیلتر</option>";
                                    echo "<option selected value='$Zhanr'>$Zhanr</option>";
                                
                                
                                }else{
                                    
                                    
                                    echo "<option value='none' selected>بدون فیلتر</option>";
                                
                                
                                
                                }
                                  
                                  
                                  
                                  ?>
                                
                                    <option value="اکشن">اکشن</option>
                                    <option value="ورزشی">ورزشی</option>
                                    <option value="ترسناک">ترسناک</option>
                                    <option value="استراتژیک">استراتژیک</option>
                                    <option value="ماجراجویی">ماجراجویی</option>
                                    <option value="جهان باز">جهان باز</option>
                                    
                                </select>

            </form>

        

            

        </div>

        <br>
        
        <label class="label_filter" for="Game_price">قیمت : </label>
        
        <div id="div_input_range">

        <form action="#" style="display:inline">
            
            <input type="range" name="Game_price" id="input_range_price" min="0" max="10000000" step="100000" value="<?php if(isset($_GET['Price_submit'])){ echo $_GET['Game_price']; }else{ echo "10000000"; } ?>"><br><br>
        
            <div id="div_span_range">
            
                <span id="span_range_value"><?php if(isset($_GET['Price_submit'])){ echo $_GET['Game_price']; }else{ echo "10000000"; } ?></span>
    
            </div>

            <input name="Price_submit" type="submit" value="تایید قیمت" id="submit_filter" style="font-size:15px;margin-top:0px;margin-bottom:20px;letter-spacing: 0.5px;">     

        </form>

       

        </div>

       

            <script>
                  
                  function FilterStudio(Zhanr){
          
                    if(Zhanr == ""){
                        document.getElementById("div_pc").innerHTML = "";
                        return;
                    }else if(Zhanr == "none"){

                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.onreadystatechange = function(){
                            if(this.readyState == 4 && this.status == 200){
                                document.getElementById("div_pc").innerHTML = this.responseText;
                            }
                        }
                        xmlhttp.open("GET","DeleteFilter.php?plt=" + Zhanr + "&pt=PS",true);
                        xmlhttp.send();


                    }else{
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.onreadystatechange = function(){
                            if(this.readyState == 4 && this.status == 200){
                                document.getElementById("div_pc").innerHTML = this.responseText;
                            }
          
                        }
                        xmlhttp.open("GET" , "Filter.php?rq=" + Zhanr + "&tr=sazande_bazi_mahsol&tb=PS", true);
                        xmlhttp.send();
                    }
          
          
                  }
          
                    
          
            </script>

        <div id="div_noskhe">

                <span class="label_filter">استدیو سازنده  : </span>

                <div class="div_select_noe_bazi">

                    <form action="" name="Filter_studio" style="display:inline-block">
                    
                        <select class="select_noe_bazi" onchange="FilterStudio(this.value)">

                                            <option value="none" class="option_noe_bazi" selected>بدون فیلتر</option>
                                            <option value="Rockstar" class="option_noe_bazi">Rockstar</option>
                                            <option value="Remedy" class="option_noe_bazi">Remedy</option>
                                            <option value="Ubisoft" class="option_noe_bazi">Ubisoft</option>
                                            <option value="Avalanche" class="option_noe_bazi">Avalanche</option>
                                            <option value="CAPCOM" class="option_noe_bazi">CAPCOM</option>
                                            <option value="Electronic Arts" class="option_noe_bazi">Electronic Arts</option>
                                            <option value="Bethesda" class="option_noe_bazi">Bethesda</option>
                                            <option value="IO Interactive" class="option_noe_bazi">IO Interactive</option>
                                            <option value="Activision" class="option_noe_bazi">Activision</option>
                                            <option value="Playground Games" class="option_noe_bazi">Playground Games</option>
                                            <option value="One More Level" class="option_noe_bazi">One More Level</option>
                                            <option value="Mojang" class="option_noe_bazi">Mojang</option>
                                            <option value="BANDAI NAMCO" class="option_noe_bazi">BANDAI NAMCO</option>
                                            <option value="Naughty Dog" class="option_noe_bazi">Naughty Dog</option>
                                            <option value="Supermassive Games" class="option_noe_bazi">Supermassive Games</option>
                                            <option value="Insomniac Games">Insomniac Games</option>
                                            <option value="Bloober Team">Bloober Team</option>
                                            <option value="Team 17">Team 17</option>
                                            <option value="Crytek">Crytek</option>

                            
                            

                        </select>

                    </form>    

                </div>

        </div>


        <br><br>


        <script>
            
            function FilterPelatform(plt){

                if(plt == ""){
                    document.getElementById("div_pc").innerHTML = "";
                    return;
                }else if(plt == "none"){

                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function(){
                        if(this.readyState == 4 && this.status == 200){
                            document.getElementById("div_pc").innerHTML = this.responseText;
                        }
                    }
                    xmlhttp.open("GET","DeleteFilter.php?plt=" + plt + "&pt=PS",true);
                    xmlhttp.send();


                }else{
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function(){
                        if(this.readyState == 4 && this.status == 200){
                            document.getElementById("div_pc").innerHTML = this.responseText;
                        }
        
                    }
                    xmlhttp.open("GET" , "Filter.php?rq=" + plt + "&tr=online_mahsol&tb=PS", true);
                    xmlhttp.send();
                }
        

        }
            



        </script>

        <div class="div_pelatform">

            <span class="label_filter">پلتفرم بازی : </span>

            <div class="div_select_noe_bazi">

                <form action="" style="display:inline-block">

                    <select onchange="FilterPelatform(this.value)" class="select_noe_bazi">

                        <option value="none" class="option_noe_bazi">بدون فیلتر</option>
                        <option value="دارد" class="option_noe_bazi">آنلاین</option>
                        <option value="ندارد" class="option_noe_bazi">آفلاین</option>

                    </select>

                </form>

            </div>


        </div>

       

        <br><br>


    

    <script>
        
        const SlideValue = document.querySelector("#span_range_value");

        const inputSlider = document.querySelector("#input_range_price");
        
        inputSlider.oninput = (()=>{
            let val = inputSlider.value;
            SlideValue.textContent = val; 
        })


    </script>

    

</div>


</div>

                                                                            <!-- products -->
                                                                            <!-- products -->
                                                                            <!-- products -->

        <div class="div_producs_koli">

            <div class="div_logo_producs">

                 <h3 class="h1_producs_title" style="color:rgb(30 252 244);">بازی های پلی استیشن</h3>
                 
                
                <i class='fab fa-playstation' style="color:rgb(30 252 244);font-size:25px"></i>

            </div>

                                                                    <!-- محصولات -->
            
                                                                    <div  id='div_pc' class="div_producs">                                                    

<?php

        if(isset($_GET['Zhanr'])){

            $select_pc_mahsolat = "SELECT * FROM mahsol__pc WHERE zhanr_mahsol='" . $_GET['Zhanr'] . "' AND pelatform_mahsol='PS' LIMIT 20";

            $select_pc_mahsolat_query = mysqli_query($conn_safhe_pc,$select_pc_mahsolat);
                
            if(mysqli_num_rows($select_pc_mahsolat_query)){

                while($row = mysqli_fetch_assoc($select_pc_mahsolat_query)){

                    $img_mahsol = $row['img_1'];
                    $name_mahsol = $row['name_mahsol'];
                    $price_mahsol = $row['price_mahsol'];
                    $pelatform = $row['pelatform_mahsol'];
                    $pelatform_mahsol = $row['pelatform_ejra_mahsol'];

                echo "

                        <div class='div_pc_producs' style='max-height:380px;'>

                        <div class='img_mahsol'>

                            <img src='$img_mahsol'  alt='$name_mahsol' class='pc_producs_img'>

                        </div>

                                <a href='mahsol.php?name_mahsol=$name_mahsol&pelatform_mahsol=$pelatform' style='text-decoration:none;' class='span_sefaresh'>جزئیات</a>

                                <h3 class='pc_producs_name' style=''> $name_mahsol</h3>

                                <h4 class='pc_producs_price'>$price_mahsol</h4>

                                <h4 style='text-align:center;'>$pelatform_mahsol</h4>

                        

                    </div>";
            }
            
        }
            

        }else if(isset($_GET['Price_submit'])){

            $Price_value = $_GET['Game_price'];

            $select_pc_mahsolat = "SELECT * FROM mahsol__pc WHERE price_mahsol<='$Price_value' AND pelatform_mahsol='PS'";

            $select_pc_mahsolat_query = mysqli_query($conn_safhe_pc,$select_pc_mahsolat);
                
            if(mysqli_num_rows($select_pc_mahsolat_query)){

                while($row = mysqli_fetch_assoc($select_pc_mahsolat_query)){

                    $img_mahsol = $row['img_1'];
                    $name_mahsol = $row['name_mahsol'];
                    $price_mahsol = $row['price_mahsol'];
                    $pelatform = $row['pelatform_mahsol'];
                    $pelatform_mahsol = $row['pelatform_ejra_mahsol'];

                echo "

                        <div class='div_pc_producs' style='max-height:380px;'>

                            <div class='img_mahsol'>

                                <img src='$img_mahsol'  alt='$name_mahsol' class='pc_producs_img'>

                            </div>
                                

                                <a href='mahsol.php?name_mahsol=$name_mahsol&pelatform_mahsol=$pelatform' style='text-decoration:none;' class='span_sefaresh'>جزئیات</a>

                                <h3 class='pc_producs_name'> $name_mahsol</h3>

                                <h4 class='pc_producs_price'>$price_mahsol</h4>

                                <h4 style='text-align:center;'>$pelatform_mahsol</h4>

                        

                    </div>";
            }
            
        }


            
            
            


        }else{
            $select_pc_mahsolat = "SELECT * FROM mahsol__pc WHERE pelatform_mahsol='PS'  LIMIT 20";

            $select_pc_mahsolat_query = mysqli_query($conn_safhe_pc,$select_pc_mahsolat);
                
            if(mysqli_num_rows($select_pc_mahsolat_query)){

                while($row = mysqli_fetch_assoc($select_pc_mahsolat_query)){

                    $img_mahsol = $row['img_1'];
                    $name_mahsol = $row['name_mahsol'];
                    $price_mahsol = $row['price_mahsol'];
                    $pelatform = $row['pelatform_mahsol'];
                    $pelatform_mahsol = $row['pelatform_ejra_mahsol'];

                echo "

                        <div class='div_pc_producs' style='max-height:380px;'>

                            <div class='img_mahsol'>

                                <img src='$img_mahsol'  alt='$name_mahsol' class='pc_producs_img'>

                            </div>    

                                <a href='mahsol.php?name_mahsol=$name_mahsol&pelatform_mahsol=$pelatform' style='text-decoration:none;' class='span_sefaresh'>جزئیات</a>

                                <h3 class='pc_producs_name' style='font-family:Hashed';> $name_mahsol</h3>

                                <h4 class='pc_producs_price' margin-top:0px;>$price_mahsol</h4>

                                <h4 style='text-align:center;'>$pelatform_mahsol</h4>

                        

                    </div>";





            }

        }
   
        }


        




?>

<?php

    if(isset($_GET['submit_sefaresh'])){

        $_SESSION["name_sefaresh"] = $_GET['name_sefaresh'];

        header("location:mahsol.php?SefarshClick=2135465132168413");

        exit();


    }



?>







</div>


</div>

</div>


  




        
                                                                    <!-- footer -->
                                                                    <!-- footer -->
                                                                    <!-- footer -->

            
              <footer class="div_footer">

                <div class="div_footer_slide">

                    <h2 class="h2_footer_slide">پلی استیشن</h2>

                </div>

                <div class="div_footer_slide">

                    <h2 class="h2_footer_slide">ایکس باکس</h2>

                </div>

                <div class="div_footer_slide">

                    <h2 class="h2_footer_slide">پی سی</h2>

                </div>


                </footer>  



        </div>

    </div>

        <h3 id="support">Unfortunately, your device does not support this site</h3>
      



        



    
</body>
</html>