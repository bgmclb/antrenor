
<?php 


session_start();
include '../database/database.php';


$json_alinan_veri = file_get_contents('php://input');  
$json_decode_edilmis = json_decode($json_alinan_veri); 

$sporcu_no = $json_decode_edilmis->sporcu_no;

if(SporcuSil($sporcu_no)=== TRUE){
    
    AidatSporcuSil($sporcu_no);
    SporcuSilYay($sporcu_no);
    SporcuSilOk($sporcu_no);
}


?>