<?php 
 
    include 'database/database.php';
    header('Content-type: application/json');

    $json_alinan_veri = file_get_contents('php://input');  
	$json_decode_edilmis = json_decode($json_alinan_veri); 
	
    $sporcu_no = $json_decode_edilmis->sporcu_no;


    $sporcu_bilgiler= array();

    $sporcu_bilgiler= SporcuBilgileriGetir($sporcu_no);

    echo json_encode($sporcu_bilgiler);



?>