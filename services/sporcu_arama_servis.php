<?php 

        $sonucObjesi = new stdClass();
        $sonucObjesi->sonuc = true;
        $sonucObjesi->mesaj = "";
        $sonucObjesi->code = 200;
        $sonucObjesi->data = new stdClass();
        $statusCode = 0;

    try {

        include '../database/database.php';
        header('Content-type: application/json');
    
        $json_alinan_veri = file_get_contents('php://input');  
        $json_decode_edilmis = json_decode($json_alinan_veri); 
        
        $yay = $json_decode_edilmis->yay;
        $yas_grubu = $json_decode_edilmis->yas_grubu;
        $text = $json_decode_edilmis->text;
    
        $sporcu_listesi= array();
    
       if($yay=="yay_default") $yay=NULL;
       
       if($yas_grubu=="yas_default") $yas_grubu=NULL;
    
       if($text=="") $text=NULL;
    
        $sporcu_listesi= SporcuAra($yay,$yas_grubu,$text);
    
        $sonucObjesi->data =  $sporcu_listesi;

            $statusCode=200;
        
    } catch (Throwable $exp) {
        if($statusCode == 0){
            $statusCode = 500;
        }

        http_response_code($statusCode);

        $sonucObjesi->sonuc = false;
        $sonucObjesi->code = $statusCode;
        $sonucObjesi->hata = $exp->getMessage();
        $sonucObjesi->mesaj = $exp->getMessage();

        if($statusCode == 401 || $statusCode >= 500){
            $sonucObjesi->headers = getallheaders();
            $sonucObjesi->detay = $exp->getTraceAsString();
        }
    }

    echo json_encode($sonucObjesi);


?>






