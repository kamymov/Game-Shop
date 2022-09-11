<?php 

    $serverName="localhost";
    $userName="root";
    $password="";
    $db_safhe_asli = "safhe_asli";
    $db_safhe_pc = "safhe_pc";
    $db_user = "user";
    $errors = array();

    $conn_safhe_asli = mysqli_connect($serverName,$userName,$password,$db_safhe_asli);

    $conn_safhe_pc = mysqli_connect($serverName,$userName,$password,$db_safhe_pc);

    $conn_user = mysqli_connect($serverName,$userName,$password,$db_user);

    if(!$conn_safhe_asli){
        die("Cannot connect to <span style='color:red'><b><i>safhe_asli</i></b></span> Database" . mysqli_connect_error());
    }

    if(!$conn_safhe_pc){
        die("Cannot connect to <span style='color:red'><b><i>safhe_pc</i></b></span> DataBase" . mysqli_connect_error());
    }

    if(!$conn_user){
        die("Cannot connect to <span style='color:red'><b><i>user</i></b></span> DataBase" . mysqli_connect_error());
    }


    $Create_db = "CREATE DATABASE safhe_asli";

    $create_db_pc = "CREATE DATABASE safhe_pc";

    $Create_db_user = "CREATE DATABASE user";

    $CREATE_db_aks_asli = "CREATE TABLE aks_asli (img_name VARCHAR (255) , img_src VARCHAR (255))";

    $create_table_takhfifan = "CREATE TABLE takhfifan (takhfifan_name VARCHAR (255), takhfifan_img VARCHAR (255),takhfifan_ba_off VARCHAR (255),takhfifan_bdon_off VARCHAR (255))";
    
    $create_table_porforosh = "CREATE TABLE porforosh (porforosh_name VARCHAR (255),porforosh_img VARCHAR (255),porforosh_price VARCHAR (255))";
    
    $create_table_darbare = "CREATE TABLE darbare (darbare_name VARCHAR (255),darbare_img VARCHAR (255),darbare_text VARCHAR (255))";
    
    $create_table_pc = "CREATE TABLE mahsol__pc (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,img_1 VARCHAR (255),img_2 VARCHAR (255),img_3 VARCHAR (255),img_4 VARCHAR (255),img_5 VARCHAR (255),img_6 VARCHAR (255),name_mahsol VARCHAR (255),price_mahsol VARCHAR (255),rade_mahsol VARCHAR (255),zhanr_mahsol VARCHAR (255),pelatform_mahsol VARCHAR (255),zaban_mahsol VARCHAR (255),online_mahsol VARCHAR (255),tedad_bazikon_mahsol VARCHAR (255),sazande_bazi_mahsol VARCHAR (255),nasher_mahsol VARCHAR (255),tarikh_mahsol VARCHAR (255),text_area TEXT (2500000),aqal_processor VARCHAR (255),aqal_ram VARCHAR (255),aqal_graphic VARCHAR (255),aqal_win VARCHAR (255),aqal_space VARCHAR (255),aksar_processor VARCHAR (255),aksar_ram VARCHAR (255),aksar_graphic VARCHAR (255),aksar_win VARCHAR (255),alsar_space VARCHAR (255))";
    
    $create_table_user = "CREATE TABLE user_info (id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,username VARCHAR (255),email VARCHAR (255),phone VARCHAR (255),pass VARCHAR(255))";
    
    // mysqli_query($conn_safhe_pc , $create_table_pc);
    

?>