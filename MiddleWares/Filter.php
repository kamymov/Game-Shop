<?php



include "DataBase.php";

$rq = $_GET['rq'];

$tr = $_GET['tr'];

$tb = $_GET['tb'];


class Test{

    var $select,$select_query;

    var $conn_safhe_pc;


    
    

    function test($rq,$tr,$pelatform_mahsol){

        $this->conn_safhe_pc = mysqli_connect("localhost","root","","safhe_pc");

        $select = "SELECT * FROM mahsol__pc WHERE $tr='" . $rq . "' AND pelatform_mahsol='" . $pelatform_mahsol . "'";

        $select_query = mysqli_query($this->conn_safhe_pc,$select);

        if(mysqli_num_rows($select_query) > 0){

            while($row = mysqli_fetch_assoc($select_query)){

                $img_mahsol = $row['img_1'];
                $name_mahsol = $row['name_mahsol'];
                $price_mahsol = $row['price_mahsol'];
                $pelatform_mahsol = $row['pelatform_ejra_mahsol'];


                echo "

                <div class='div_pc_producs' style='max-height:380px;'>

                    <div class='img_mahsol'>

                        <img src='$img_mahsol'  alt='$name_mahsol' class='pc_producs_img'>

                    </div>

                    <a href='mahsol.php?name_mahsol=$name_mahsol' style='text-decoration:none;' class='span_sefaresh'>جزئیات</a>

                    <h3 class='pc_producs_name' style=''> $name_mahsol</h3>

                    <h4 class='pc_producs_price'>$price_mahsol</h4>

                    <h4 style='text-align:center;'>$pelatform_mahsol</h4>

            

                    </div>
                
            
                
                ";

            }

        }

    }
}


$test = new Test;

$test->test($rq,$tr,$tb);

?>