<?php 

if(isset($_COOKIE['User'])){

    include "DataBase.php";

                                                            // Delete Class

class BackEnd{

    var $conn;
    var $errors = array();


    public function connect_safhe_asli(){

        $this->conn = mysqli_connect("localhost" ,"root", "","safhe_asli");


        $this->conn_pc = mysqli_connect("localhost","root","","safhe_pc");
        return $this;

        if(!$this->conn_pc){
            die("<span style='color:red'>Cannot connect to DataBase</span>");
        }

        if(!$this->conn){
            die("<span style='color:red'>Cannot connect to DataBase</span>");
        }



    }

    public function insert_darbare_field($FileName,$FileSize,$FileTmp,$FileType,$name,$darbare,$address,$db_name,$db_img,$db_text){

        $file_expload = explode("." , $FileName);

        $file_ext = strtolower(end($file_expload));

        $extention  = array("jpg","jpeg","png","jifi");

        if(empty($FileName) or empty($name) or empty($darbare) or empty($address)){
            array_push($this->errors , "inputs cannot be empty");
            echo "<script>alert('inputs cannot be empty!!!')</script>";
        }

        if(in_array($file_ext,$extention) == false){
            array_push($this->errors, "Cannot upload file with this type");
            echo "<script>alert('Cannot upload with this type')</script>";
        }

        

        if($FileSize<1000000){
            if(count($this->errors)==0){

                move_uploaded_file($FileTmp, $address . $FileName);

                $BuildNameSql = $address . $FileName;

                $Insert_data = "INSERT INTO darbare ($db_name,$db_img,$db_text) VALUES ('$name','$BuildNameSql','$darbare')";

                $Insert_data_query = mysqli_query($this->connect_safhe_asli()->conn,$Insert_data);

                if($Insert_data_query){
                    echo "<script>alert('successfuly')</script>";
                }else{
                    echo "<script>alert('Cannot insert data')</script>";
                }
                
            }
        }else{
            echo "<script>alert('oooffff file is too heavy')</script>";
        }


    }



    public function Delete($name_delete,$table,$name_tr){

        if(empty($name_delete)){
            array_push($this->errors, "<script>alert('inputs are empty!!!')</script>");
        }

        if(count($this->errors) == 0 ){

            $delete_from_db = "DELETE FROM $table WHERE $name_tr='$name_delete'";

            $delete_from_db_query = mysqli_query($this->connect_safhe_asli()->conn,$delete_from_db);

            if($delete_from_db_query){
                echo "<script>alert('Deleted successfuly')</script>";
            }else{
                echo "<script>alert('Cannot delete')</script>";
            }

        }

        

    }

    public function Delete_Pc($name_delete,$table,$name_tr){

        if(empty($name_delete)){
            array_push($this->errors, "<script>alert('inputs are empty!!!')</script>");
        }

        if(count($this->errors) == 0 ){

            $delete_from_db = "DELETE FROM $table WHERE $name_tr='$name_delete'";

            $delete_from_db_query = mysqli_query($this->connect_safhe_asli()->conn_pc,$delete_from_db);

            if($delete_from_db_query){
                echo "<script>alert('Deleted successfuly')</script>";
            }else{
                echo "<script>alert('Cannot delete')</script>";
            }

        }

        

    }



                                                                    // insert mahsol asli 


    public function insert_mahsol_asli($address_pc,$table_name,$FileName,$FileSize,$FileTmp,$FileType,$name,$dvd_number,$price,$rade_seni,$zhanr_bazi,$pelatform,$pelatform_ajra,$zaban,$bakhsh_online,$tedad_bazi,$sazande_bazi,$nasher,$tarikh_nashr,$text_area,$aqal_processor,$aqal_ram,$aqal_graphic,$aqal_win,$aqal_space,$aksar_processor,$aksar_ram,$aksar_graphic,$aksar_win,$aksar_sapce,$pc_img_2,$pc_img_3,$pc_img_4,$pc_img_5,$pc_img_6,$pc_name_asli){

        if(empty($FileName) or empty($price) or empty($name) or empty($rade_seni) or empty($zhanr_bazi) or empty($pelatform) or empty($zaban) or empty($bakhsh_online) or empty($tedad_bazi) or empty($sazande_bazi) or empty($nasher) or empty($tarikh_nashr)){

            array_push($this->errors , "<script>alert('inputs cannot be empty')</script>");

            echo "<script>alert('inputs cannot be empty')</script>";

        }

        $file_mahsolat_pc_explode = explode("." , $FileName);

        $file_mahsolat_pc_ext = strtolower(end($file_mahsolat_pc_explode));

        $file_mahsolat_pc_extention = array("jpg" , "png", "jpeg", "jfif");

        if(in_array($file_mahsolat_pc_ext,$file_mahsolat_pc_extention) == false){
            array_push($this->errors, "Cannot upload img with this type");
            echo "<script>alert('Cannot upload img with this type')</script>";
        }

        $check_exist_DataBase = "SELECT * FROM $table_name WHERE name_mahsol='$name'";

        $check_exist_DataBase_query = mysqli_query($this->connect_safhe_asli()->conn_pc,$check_exist_DataBase);

        if(mysqli_num_rows($check_exist_DataBase_query) > 0){
            array_push($this->errors, "This game alredy exist in DataBase");
            echo "<script>alert('This game alredy exist in DataBase')</script>";
        }

        if($FileSize<1000000){
            if(count($this->errors) == 0){

                move_uploaded_file($FileTmp, $address_pc . $FileName);
                move_uploaded_file($pc_img_2['tmp_name'], $address_pc . $pc_img_2['name']);
                move_uploaded_file($pc_img_3['tmp_name'], $address_pc . $pc_img_3['name']);
                move_uploaded_file($pc_img_4['tmp_name'], $address_pc . $pc_img_4['name']);
                move_uploaded_file($pc_img_5['tmp_name'], $address_pc . $pc_img_5['name']);
                move_uploaded_file($pc_img_6['tmp_name'], $address_pc . $pc_img_6['name']);

                $build_pc_img = $address_pc . $FileName;
                $built_pc_img_2 = $address_pc . $pc_img_2['name'];
                $built_pc_img_3 = $address_pc . $pc_img_3['name'];
                $built_pc_img_4 = $address_pc . $pc_img_4['name'];
                $built_pc_img_5 = $address_pc . $pc_img_5['name'];
                $built_pc_img_6 = $address_pc . $pc_img_6['name'];


                $build_pc_sql = "INSERT INTO $table_name (name_mahsol,dvd_mahsol,img_1,price_mahsol,rade_mahsol,zhanr_mahsol,pelatform_mahsol,pelatform_ejra_mahsol,zaban_mahsol,online_mahsol,tedad_bazikon_mahsol,sazande_bazi_mahsol,nasher_mahsol,tarikh_mahsol,text_area,aqal_processor,aqal_ram,aqal_graphic,aqal_win,aqal_space,aksar_processor,aksar_ram,aksar_graphic,aksar_win,alsar_space,img_2,img_3,img_4,img_5,img_6,name_asli) VALUES ('$name','$dvd_number','$build_pc_img','$price','$rade_seni','$zhanr_bazi','$pelatform','$pelatform_ajra','$zaban','$bakhsh_online','$tedad_bazi','$sazande_bazi','$nasher','$tarikh_nashr','$text_area','$aqal_processor','$aqal_ram','$aqal_graphic','$aqal_win','$aqal_space','$aksar_processor','$aksar_ram','$aksar_graphic','$aksar_win','$aksar_sapce','$built_pc_img_2','$built_pc_img_3','$built_pc_img_4','$built_pc_img_5','$built_pc_img_6','$pc_name_asli')";

                if(mysqli_query($this->connect_safhe_asli()->conn_pc,$build_pc_sql)){
                    echo "<script>alert('successfuly insert data')</script>";
                }else{
                    echo "<script>alert('Cannot insert data')</script>";
                }

            }


        }else{
            array_push($this->errors, "Oooffff file is too heavy");
            echo "<script>alert('Oooffff file is too heavy')</script>";
        }


    }

}


                                                        // add main photo
                                            
    if(isset($_FILES['aks_asli_add'])){

        $add_file_name = $_FILES['aks_asli_add']['name'];
        $add_file_size = $_FILES['aks_asli_add']['size'];
        $add_file_tmp = $_FILES['aks_asli_add']['tmp_name'];
        $add_file_type = $_FILES['aks_asli_add']['type'];
        $add_image_name = $_POST['akd_aski_add_name'];

        $aks_asli_upload = explode("." , $_FILES['aks_asli_add']['name']);

        $aks_asli_ext = strtolower(end($aks_asli_upload));

        $aks_asli_extention = array("jpg","png","jpeg");

        if(in_array($aks_asli_ext,$aks_asli_extention) == false){
            array_push($errors, "you cant upload your image whit this type");
        }

        if(empty($add_image_name)){
            array_push($errors, "photo name cannot be empty!!!");
        }

        if(empty($_FILES['aks_asli_add']['name'])){
            array_push($errors, "image file cannot be empty");
        }

        $sql_insert_for = "SELECT * FROM aks_asli WHERE img_name='$add_image_name'";

        $sql_insert_for_query = mysqli_query($conn_safhe_asli,$sql_insert_for);

        if(mysqli_num_rows($sql_insert_for_query) > 0){
            array_push($errors, "you have this pictur or name in DataBase please check it!!!");
        }



        if($add_file_size<1000000){
            if(count($errors) == 0){
                move_uploaded_file($add_file_tmp, "img/Safhe Asli/Aks Asli/" . $add_file_name);
                $build_name_sql = "img/Safhe Asli/Aks Asli/" . $add_file_name;
                $sql_insert_add_img = "INSERT INTO aks_asli (img_name,img_src) VALUES ('$add_image_name','$build_name_sql')";
                $sql_insert_add_img_query = mysqli_query($conn_safhe_asli,$sql_insert_add_img);
                if(!$sql_insert_add_img_query){
                    array_push($errors , "sorry we couldnt upload this image!!!");
                }
            }
        }else{
            array_push($errors, "this image is too heavy");
        }

    }


                                                    // delete main photo

        if(isset($_GET['submit_delete_aks_asli_delete'])){

            $aks_asli = $_GET['aks_asli'];

            $Delete_class = new BackEnd;

            $Delete_class->Delete($aks_asli,"aks_asli","img_name");


        }

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="styles/StyleAdmin1.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script>

            $(document).ready(function(){
                $("#admin_asli").click(function(){
                $(".div_safhe_asli").show();
                $(".div_safhe_pc").hide();
                });
                $("#admin_Pc").click(function(){
                    $(".div_safhe_asli").hide();
                    $(".div_safhe_pc").show();
                })
            });


        </script>
        <title>Admin Page</title>
    </head>
    <body>

        <div class="div_header_admin">

            <div class="div_menu_admin">

                <a class="a_menu_admin" id="admin_asli">صفحه اصلی</a>
                <a class="a_menu_admin" id="admin_Pc">بازی ها</a>
                <a class="a_menu_admin" id="admin_lavazem">لوازم گیمینگ</a>
                <a class="a_menu_admin" id="admin_info_karbar">اطلاعات کاربران</a>
                <a class="a_menu_admin" id="admin__info_admin">اطلاعات ادمین ها</a>
                <a class="a_menu_admin" id="admin_sefaresh">سفارش ها</a>
                <a class="a_menu_admin" id="plus_admin">اضافه کردن ادمین</a>

            </div>

        </div>

        <div class="body">

            <div class="div_safhe_asli">

            <div id="div_aks_asli">

                <h1 class="h1_aks_asli">اسم صفحه اصلی : </h1>
                
                <?php 



                    
                    $select_aks_asli_name = "SELECT * FROM aks_asli";

                    $select_aks_asli_name_query = mysqli_query($conn_safhe_asli, $select_aks_asli_name);

                    if(mysqli_num_rows($select_aks_asli_name_query) > 0){

                        while($row = mysqli_fetch_assoc($select_aks_asli_name_query)){

                            ?>
                                <h2><?php echo $row['img_name'] ?></h2>
                            <?php

                        }

                    }
                
                
                
                
                
                ?>

                    <h1 class="h1_aks_asli">عکس اصلی صفحه : </h1> 
                    
                    <?php 

                        $select_aks_asli = "SELECT * FROM aks_asli";

                        $select_aks_asli_query = mysqli_query($conn_safhe_asli,$select_aks_asli);

                        if(mysqli_num_rows($select_aks_asli_query) > 0){

                            while($row = mysqli_fetch_assoc($select_aks_asli_query)){
                                ?>  

                                <img src="<?php echo $row['img_src'] ?>" style="width:200px;" alt="">
    
                                <?php
                            }

                        }
                        
                    
                    ?>



                                                                            <!-- aks asli -->
                                                                            <!-- aks asli -->
                                                                            <!-- aks asli -->



                    <h1 class="h1_aks_asli">ادیت عکس صفحه اصلی : </h1>

                    <h3 class="h1_aks_asli" style="color:red;display:inline-block">حذف عکس اصلی : </h3>

                    <form action="AdminPage.php" style="display:inline-block;">

                        <input type="text" name="aks_asli" class="input_name_admin" placeholder="اسم عکس برای حذف...">

                        <input type="submit" name="submit_delete_aks_asli_delete" value="تایید" class="submit_admin">

                    </form>

                <br>
                <br>
                <br>

                    <h1 class="h1_aks_asli" style="display:inline-block;color:green;">اضافه کردن عکس : </h1>

                    <form action="AdminPage.php" style="display:inline-block" method="POST" enctype="multipart/form-data">

                        <input type="text" name="akd_aski_add_name"  placeholder="اسم عکس برای اضافه..." class="input_name_admin">

                        <input type="file" name="aks_asli_add" class="input_name_admin">

                        <input type="submit" class="submit_admin" name="submit_add_aks_asli" value="اضافه">

                    </form>

                    <hr>

            </div>


                                                                    <!-- takhfifan field  -->
                                                                    <!-- takhfifan field  -->
                                                                    <!-- takhfifan field  -->


                    <?php
                        
                        if(isset($_FILES['add_takhfif_img'])){

                            $add_takhfifan_name = $_FILES['add_takhfif_img']['name'];
                            $add_takhfifan_size = $_FILES['add_takhfif_img']['size'];
                            $add_takhfifan_tmp = $_FILES['add_takhfif_img']['tmp_name'];
                            $add_takhfifan_type = $_FILES['add_takhfif_img']['type'];
                            $add_takhfifan_game_name = $_POST['add_takhfifan_name'];
                            $add_takhfifan_game_bdon_off = $_POST['add_takhfifan_bdon_off'];
                            $add_takhfifan_game_ba_off = $_POST['add_takhfifan_ba_off'];
                            $add_takhfifan_pelatform = $_POST['add_takhfifan_pelatform'];

                            $add_takhfifan_expload = explode("." , $_FILES['add_takhfif_img']['name']);

                            $add_takhfifan_ext = strtolower(end($add_takhfifan_expload));

                            $add_takhfifan_extention = array("jpg", "jpeg", "png");

                            if(in_array($add_takhfifan_ext,$add_takhfifan_extention)){
                                array_push($errors, "you cannot upload file whit on type!!!");
                            }

                            if(empty($add_takhfifan_name) or empty($add_takhfifan_game_name) or empty($add_takhfifan_game_bdon_off) or empty($add_takhfifan_game_ba_off)){
                                array_push($errors , "inputs cannot be empty!!!");
                            }

                            $select_takhfiifan_alerdy = "SELECT * FROM takhfifan WHERE takhfifan_name='$add_takhfifan_game_name'";

                            $select_takhfiifan_alerdy_query = mysqli_query($conn_safhe_asli,$select_takhfiifan_alerdy);

                            if(mysqli_num_rows($select_takhfiifan_alerdy_query) > 0){
                                array_push($errors , "we alerdy have this game in takhfifan");
                            }

                            if($add_takhfifan_size<100000000){
                                if(count($errors) == 0){
                                    move_uploaded_file($add_takhfifan_tmp, "img/Safhe Asli/takhfif/" . $add_takhfifan_name);
                                    $build_takhfifan_sql = "img/Safhe Asli/takhfif/" . $add_takhfifan_name;
                                    $sql_takhfifan_pictur = "INSERT INTO takhfifan (takhfifan_name,takhfifan_img,takhfifan_ba_off,takhfifan_bdon_off,takhfifan_pelatform) VALUE ('$add_takhfifan_game_name','$build_takhfifan_sql','$add_takhfifan_game_ba_off','$add_takhfifan_game_bdon_off','$add_takhfifan_pelatform')";
                                    $sql_takhfifan_pictur_query = mysqli_query($conn_safhe_asli,$sql_takhfifan_pictur);
                                    if($sql_takhfifan_pictur_query){
                                        echo "<script>alert('you are successfuly insert data')</script>";
                                    }   
                                }
                            }else{
                                array_push($errors, "oooffff image size is too heavy!!!");
                            }


                        }    
                    
                    
                    
                    
                    ?>                                                
                    
                                                                    
                    <div id="div_takhfifan">

                    <h1 style="text-align:center;color:white;"> تخفیفان </h1>

                        

                        <h1 style="color:green;">اضافه کردن فیلد تخفیفان : </h1>

                        

                        <form action="AdminPage.php" method="POST" enctype="multipart/form-data">

                            <input type="file" name="add_takhfif_img" class="input_name_admin"><br><br>

                            <input type="text" name="add_takhfifan_name" class="input_name_admin" placeholder="اسم بازی..."><br><br>

                            <input type="text" name="add_takhfifan_bdon_off" class="input_name_admin" placeholder="قیمت بدون تخفیف..."><br><br>

                            <input type="text" name="add_takhfifan_ba_off" class="input_name_admin" placeholder="قیمت با تخفیف..."><br><br>

                            <input type="text" name="add_takhfifan_pelatform" class="input_name_admin" placeholder="پلتفرم بازی ... "><br><br>

                            <input type="submit" value="تایید"  class="submit_admin">
                    
                    
                        </form>

                        <?php


                            if(isset($_GET['delete_takhfifan'])){

                                $delete_name_game = $_GET['Delete_takhfifan_name'];

                                $Delete_class = new BackEnd;

                                $Delete_class->Delete($delete_name_game,"takhfifan","takhfifan_name");

                            }                  
                        
                        
                        
                        ?>


                        <h1 style="color:red;">پاک کردن فیلد تخفیفان : </h1>

                        <form action="AdminPage.php" method="GET">

                            <input type="text" name="Delete_takhfifan_name" class="input_name_admin" placeholder="وارد کردن اسم..."><br><br>

                            <input type="submit" value="تایید" name="delete_takhfifan" class="submit_admin">


                        </form>


                        <hr>


                    </div>

                    <div class="porforosh">

                            <h1  style="text-align:center;color:white;">پرفروش</h1>

                            <h1 style="color:green;">اضافه کردن فیلد پرفروش : </h1>

                            <form action="AdminPage.php" method="POST" enctype="multipart/form-data">

                                <input type="file" name="add_porforosh_file" class="input_name_admin"><br><br>

                                <input type="text" name="add_porforosh_name" class="input_name_admin" placeholder="اسم بازی..."><br><br>

                                <input type="text" name="add_porforosh_qeymat" class="input_name_admin" placeholder="قیمت بازی..."><br><br>

                                <input type="text" name="add_porforosh_pelatform" class="input_name_admin" placeholder="پلتفرم بازی..."><br><br>

                                <input type="submit" value="تایید" name="submit_add_porforsh" class="submit_admin">

                            </form>

                            <h1 style="color:red">حذف کردن فیلد پرفروش : </h1>

                            <form action="AdminPage.php" method="GET">

                                <input type="text" name="Delete_porforosh_name" class="input_name_admin" placeholder="اسم بازی برای حذف..."><br><br>

                                <input type="submit" value="تایید" name="Delete_porforosh_submit" class="submit_admin">

                            </form>
                            
                            <?php       


                                                                            // Insert porforosh
                            
                                if(isset($_FILES['add_porforosh_file'])){

                                    $add_porforosh_file_name = $_FILES['add_porforosh_file']['name'];
                                    $add_porforosh_file_size = $_FILES['add_porforosh_file']['size'];
                                    $add_porforosh_file_tmp = $_FILES['add_porforosh_file']['tmp_name'];
                                    $add_porforosh_file_type = $_FILES['add_porforosh_file']['type'];
                                    $add_porforosh_game_name = $_POST['add_porforosh_name'];
                                    $add_porforosh_game_price = $_POST['add_porforosh_qeymat'];
                                    $add_porforosh_game_pelarform = $_POST['add_porforosh_pelatform'];

                                    $add_porforosh_img_explode = explode(".", $_FILES['add_porforosh_file']['name']);

                                    $add_porforosh_ext = strtolower(end($add_porforosh_img_explode));

                                    $add_porforosh_extention = array("jpg" , "jpeg" , "png", "jfif");

                                    if(in_array($add_porforosh_ext,$add_porforosh_extention) == false){
                                        array_push($errors, "cannot upload file with this type");
                                    }

                                    $select_porforosh_alredy_exist = "SELECT * FROM porforosh WHERE porforosh_name='$add_porforosh_game_name'";
                                    $select_porforosh_alredy_exist_query = mysqli_query($conn_safhe_asli,$select_porforosh_alredy_exist);
                                    if(mysqli_num_rows($select_porforosh_alredy_exist_query)>0){
                                        array_push($errors,"This game is already exist on database");
                                    }
                                    
                                    if(empty($add_porforosh_file_name) or empty($add_porforosh_game_name) or empty($add_porforosh_game_price)){
                                        array_push($errors, "inputs cannot be empty!!!");
                                    }

                                    if($add_porforosh_file_size<10000000){
                                        if(count($errors) == 0){

                                        
                                        move_uploaded_file($add_porforosh_file_tmp, "img/Safhe Asli/porforosh/" . $add_porforosh_file_name);
                                        $build_name_porforsh_sql = "img/Safhe Asli/porforosh/" . $add_porforosh_file_name;
                                        $build_takhfifan_sql = "INSERT INTO porforosh (porforosh_name,porforosh_img,porforosh_price,porforosh_pelatform) VALUES ('$add_porforosh_game_name','$build_name_porforsh_sql','$add_porforosh_game_price','$add_takhfifan_pelatform')";
                                        $build_takhfifan_sql_query = mysqli_query($conn_safhe_asli,$build_takhfifan_sql); 
                                        if($build_takhfifan_sql_query){
                                            echo "<script>alert('successfuly insert data')</script>";
                                        }else{
                                            echo "<script>alert('cannot insert data')</script>";
                                        }
                                    }
                                    }else{
                                        array_push($errors, "ooofffff this file is too heavy");
                                    }


                                }


                                                                        // Delete porforosh


                                if(isset($_GET['Delete_porforosh_submit'])){

                                    $delete_game_porforosh = $_GET['Delete_porforosh_name'];

                                    $Delete_class = new BackEnd;

                                    $Delete_class->Delete($delete_game_porforosh,"porforosh","porforosh_name");

                                }
                                     
                            
                            
                            ?>




                    </div>

                    <hr>

                    <br>

                                                                            <!-- //darbare_field -->


                    <div class="div_darbare">

                    <br>

                            <h1 style="color:green">عوض کردن فیلد درباره</h1>

                            

                                <form action="AdminPage.php" method="POST" enctype="multipart/form-data">
                            
                                    <input type="file" name="darbare_file" class="input_name_admin"><br><br>

                                    <input type="text" name="darbare_name" class="input_name_admin" placeholder="اسم بازی..."><br><br>
                            
                                    <textarea name="darbare_textarea" class="input_name_admin" cols="30" rows="10"></textarea><br><br>
                            
                                    <input name="darbare_submit_insret" type="submit" value="تایید" class="submit_admin">             
                    

                                </form>

                                <h1 style="color:red">حذف فیلد درباره</h1>

                                <form action="AdminPage.php" method="GET">

                                    <input type="text" name="darbare_name" class="input_name_admin" id="" placeholder="اسم بازی برای حذف..."><br><br>

                                    <input type="submit" value="تایید" name="darbare_submit_delete" class="submit_admin">


                                </form>

                    </div>

                    <?php
                    
                                                    
                            if(isset($_FILES['darbare_file'])){

                                $img_name = $_FILES['darbare_file']['name'];

                                $img_size = $_FILES['darbare_file']['size'];

                                $img_tmp = $_FILES['darbare_file']['tmp_name'];

                                $img_type = $_FILES['darbare_file']['type'];

                                $input_name = $_POST['darbare_name'];

                                $input_darbare = $_POST['darbare_textarea'];

                                $darbare = new BackEnd;

                                $darbare->insert_darbare_field($img_name,$img_size,$img_tmp,$img_type,$input_name,$input_darbare,"img/Safhe Asli/moarefi/","darbare_name","darbare_img","darbare_text");

                            }

                            if(isset($_GET['darbare_submit_delete'])){

                                $delete_darbare_name = $_GET['darbare_name'];

                                $darbare_delete = new BackEnd;

                                $darbare_delete->Delete($delete_darbare_name, "darbare", "darbare_name");


                            }

                    
                    
                    
                    ?>



            
            </div>

            </div>

                                                                    <!-- Pc page -->
                                                                    <!-- Pc page -->
                                                                    <!-- Pc page -->
                                                                    <!-- Pc page -->
                                                                    <!-- Pc page -->
                                                                    <!-- Pc page -->
                                                                    <!-- Pc page -->
                                                                    <!-- Pc page -->
                                                                    <!-- Pc page -->
                                                                    <!-- Pc page -->
                                                                    <!-- Pc page -->
                                                                    <!-- Pc page -->
                                                                    <!-- Pc page -->
                                                                    <!-- Pc page -->
                                                                    <!-- Pc page -->
                                                                    <!-- Pc page -->

            <div class="div_safhe_pc" style="padding:20px;">

                <h1 style="color:white;text-align:center;">بازی ها</h1>


                <h1 style="color:green;">اضافه کردن بازی ها</h1>


                <form action="AdminPage.php" method="POST" enctype="multipart/form-data">

                    <input type="file" name="file_insert_pc" class="input_name_admin"><br><br>

                    <input type="text" name="name_insert_pc" class="input_name_admin" placeholder="اسم بازی..." max="2"><br><br>

                    <input type="number" name="disc_insert_pc" class="input_name_admin" placeholder="تعداد دیسک های بازی ... "><br><br>

                    <input type="text" name="insert_price_pc" class="input_name_admin" placeholder="قیمت بازی ... "><br><br>

                    <input type="text" name="insert_rade_seni" class="input_name_admin" placeholder="رده سنی بازی..."><br><br>

                    <input type="text" name="insert_zhanr" class="input_name_admin" placeholder="ژانر بازی ... "><br><br>

                    <input type="text" name="insert_pelatform" class="input_name_admin" placeholder="پلتفرم بازی ..."><br><br>
                    






                    <input type="text" name="insert_pelatform_ajra" class="input_name_admin" placeholder="پلتفرم اجرایی ... "><br><br>













                    <input type="text" name="insert_zaban" class="input_name_admin" placeholder="زبان ... "><br><br>

                    <input type="text" name="insert_bakhsh_online" class="input_name_admin" placeholder="بخش آنلاین ... "><br><br>

                    <input type="text" name="insert_tedad_bazikon" class="input_name_admin" placeholder="تعداد بازیکن ... "><br><br>

                    <input type="text" name="insert_sazande" class="input_name_admin" placeholder="سازنده بازی ... "><br><br>

                    <input type="text" name="insert_nasher" class="input_name_admin" placeholder="ناشر ... "><br><br>

                    <input type="text" name="insert_tarikh_nashr" class="input_name_admin" placeholder="تاریخ نشر ... "><br><br>

                    <textarea name="insert_text_area" class="input_name_admin" cols="30" rows="10"></textarea><br><br>

                    <input type="text" name="insert_aqal_processor" class="input_name_admin" placeholder="حداقل پروسسور ... "><br><br>

                    <input type="text" name="insert_aqal_ram" class="input_name_admin" placeholder="حداقل رم ... "><br><br> 
                    
                    <input type="text" name="insert_aqal_graphic" class="input_name_admin" placeholder="حداقل گرافیک ... "><br><br>

                    <input type="text" name="insert_aqal_win" class="input_name_admin" placeholder="حداقل ویندوز ... "><br><br>

                    <input type="text" name="insert_aqal_space" class="input_name_admin" placeholder="حداقل فضای مورد نیاز ... "><br><br>

                    <input type="text" name="insert_aksar_processor" class="input_name_admin" placeholder="حداکثر پروسسور ... "><br><br>

                    <input type="text" name="insert_aksar_ram" class="input_name_admin" placeholder="حداکثر رم ... "><br><br>

                    <input type="text" name="insert_aksar_graphic" class="input_name_admin" placeholder="حداکثر گرافیک ... "><br><br>

                    <input type="text" name="insert_aksar_win" class="input_name_admin" placeholder="حداکثر ویندوز ... "><br><br>

                    <input type="text" name="insert_aksar_space" class="input_name_admin" placeholder="حداکثر فضای مورد نیاز ... "><br><br>

                    <input type="file" name="insert_img_2" class="input_name_admin"><br><br>

                    <input type="file" name="insert_img_3" class="input_name_admin"><br><br>

                    <input type="file" name="insert_img_4" class="input_name_admin"><br><br>

                    <input type="file" name="insert_img_5" class="input_name_admin"><br><br>

                    <input type="file" name="insert_img_6" class="input_name_admin"><br><br>

                    <input type="submit" name="insert_submit_pc" value="تایید" class="submit_admin">

                </form>

                    <?php
                    
                        if(isset($_FILES['file_insert_pc'])){

                            $pc_file_name = $_FILES['file_insert_pc']['name'];
                            $pc_file_size = $_FILES['file_insert_pc']['size'];
                            $pc_file_tmp = $_FILES['file_insert_pc']['tmp_name'];
                            $pc_file_type = $_FILES['file_insert_pc']['type'];
                            $pc_name = $_POST['name_insert_pc'];
                            $pc_tedad_disc = $_POST['disc_insert_pc'];
                            $pc_price = $_POST['insert_price_pc'];
                            $pc_rade_seni = $_POST['insert_rade_seni'];
                            $pc_zhanr = $_POST['insert_zhanr'];
                            $pc_pelatform = $_POST['insert_pelatform'];
                            $pc_pelatform_ajra = $_POST['insert_pelatform_ajra'];
                            $pc_zaban = $_POST['insert_zaban'];
                            $pc_online = $_POST['insert_bakhsh_online'];
                            $pc_tedad_bazikon = $_POST['insert_tedad_bazikon'];
                            $pc_sazande = $_POST['insert_sazande'];
                            $pc_nasher = $_POST['insert_nasher'];
                            $pc_tarikh_nashr = $_POST['insert_tarikh_nashr'];
                            $pc_text_area = $_POST['insert_text_area'];
                            $pc_aqal_processor = $_POST['insert_aqal_processor'];
                            $pc_aqal_ram = $_POST['insert_aqal_ram'];
                            $pc_aqal_graphic = $_POST['insert_aqal_graphic'];
                            $pc_aqal_win = $_POST['insert_aqal_win'];
                            $pc_aqal_space = $_POST['insert_aqal_space'];
                            $pc_aksar_processor = $_POST['insert_aksar_processor'];
                            $pc_aksar_ram = $_POST['insert_aksar_ram'];
                            $pc_aksar_graphic = $_POST['insert_aksar_graphic'];
                            $pc_aksar_win = $_POST['insert_aksar_win'];
                            $pc_aksar_space = $_POST['insert_aksar_space'];
                            $pc_name_asli = $pc_name . "_" . $pc_pelatform;
                            $pc_img_2 = $_FILES['insert_img_2'];
                            $pc_img_3 = $_FILES['insert_img_3'];
                            $pc_img_4 = $_FILES['insert_img_4'];
                            $pc_img_5 = $_FILES['insert_img_5'];
                            $pc_img_6 = $_FILES['insert_img_6'];

                        
                            $pc_mahsol_oop = new BackEnd;
                        
                            $pc_mahsol_oop->insert_mahsol_asli("img/Pc/","mahsol__pc",$pc_file_name,$pc_file_size,$pc_file_tmp,$pc_file_type,$pc_name,$pc_tedad_disc,$pc_price,$pc_rade_seni,$pc_zhanr,$pc_pelatform,$pc_pelatform_ajra,$pc_zaban,$pc_online,$pc_tedad_bazikon,$pc_sazande,$pc_nasher,$pc_tarikh_nashr,$pc_text_area,$pc_aqal_processor,$pc_aqal_ram,$pc_aqal_graphic,$pc_aqal_win,$pc_aqal_space,$pc_aksar_processor,$pc_aksar_ram,$pc_aksar_graphic,$pc_aksar_win,$pc_aksar_space,$pc_img_2,$pc_img_3,$pc_img_4,$pc_img_5,$pc_img_6,$pc_name_asli);
                        
                        
                        }
                    
                    
                    
                
                ?>

                <h1 style="color:red">پاک کردن بازی ها</h1>

                <form action="AdminPage.php" method="GET">


                        <input type="text" name="Delete_Pc" class="input_name_admin" placeholder="اسم بازی ... ">
                        

                        <br>
                        
                        
                        <br>


                        <input type="submit" name="Submit_pc" value="تایید" class="submit_admin">

                </form>

                <?php


                
                        if(isset($_GET['Submit_pc'])){

                            $delete_pc_name = $_GET['Delete_Pc'];

                            $delete_pc_class = new BackEnd;

                            $delete_pc_class->Delete_Pc($delete_pc_name,"mahsol__pc","name_mahsol");


                        }
                
                
                
                
                
                ?>


            </div>


        </div>


        
    </body>
</html>

<?php 

    if(count($errors) > 0 ){
        foreach($errors as $error){

            echo "<script>alert('$error')</script>";

        }
    }

?>

<?php
}else{
    header("location:index.php");
    exit();
}

?>