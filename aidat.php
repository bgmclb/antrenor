<?php 
    include 'head.php';
    include 'nav.php';

    if(!$kullanici_giris_yapti_mi){
        header('Location: login.php'); 
   }

    $sporcu_listesi = array();
    $antrenor_id=  $_SESSION["kullanici_id"];
    $sporcu_listesi= SporculariGetir($antrenor_id);

   $gosterilen_yil =  $_GET["sene"]; //var_dump( $simdiki_yil);
   $gecen_yil = (int)$gosterilen_yil-1;  //var_dump( $gecen_yil);
 
                    
   $aidat_listesi = array();

    


?>


<div class="container">
    <br>

    <div class="row">
        <div class="col s12">

            <section class="jumbotron text-center">
                <div class="container">
                    <center>

                        <h4 class="jumbotron-heading">
                            <a class="btn-floating btn-medium  waves-light orange <?php if ($gosterilen_yil <= date("Y")-1){?> disabled <?php }?> "
                                href="aidat.php?sene=<?php echo $gecen_yil ?>"><i
                                    class="material-icons">navigate_before</i></a>
                            <?php echo $_GET["sene"] ?> MALZEME ÜCRET TABLOSU
                            <a class="btn-floating btn-medium   waves-light orange <?php if ($gosterilen_yil >= date("Y")){?> disabled <?php }?>"
                                href="aidat.php?sene=<?php echo $yil ?>"><i class="material-icons">navigate_next</i></a>
                        </h4>
                    </center>
                </div>
            </section>

            <br>
            <table class="table table-bordered highlight">
                <thead>
                    <tr>
                        <th>Ad Soyad</th>
                        <th>Oca</th>
                        <th>Şub</th>
                        <th>Mar</th>
                        <th>Nis</th>
                        <th>May</th>
                        <th>Haz</th>
                        <th>Tem</th>
                        <th>Ağu</th>
                        <th>Eyl</th>
                        <th>Eki</th>
                        <th>Kas</th>
                        <th>Ara</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 

              
                $aidat_listesi = AidatBilgisiGetir($antrenor_id , $gosterilen_yil); //var_dump( $aidat_listesi);
             
                $sporcu_sayisi=count($sporcu_listesi); //var_dump($sporcu_sayisi);
            for($i=0 ; $i<$sporcu_sayisi;$i++){
              
                $sporcu= $sporcu_listesi[$i];
                $aidat = $aidat_listesi[$i]; //var_dump($aidat);
               
                $ad_soyad=  $sporcu['ad']." ".$sporcu['soyad'];
         
               
                $ocak= $aidat['ocak']; 
                $subat= $aidat['subat'];
                $mart= $aidat['mart']; 
                $nisan= $aidat['nisan'];
                $mayis= $aidat['mayis'];
                $haziran= $aidat['haziran']; 
                $temmuz= $aidat['temmuz'];
                $agustos= $aidat['agustos'];
                $eylul= $aidat['eylul']; 
                $ekim= $aidat['ekim'];
                $kasim= $aidat['kasim'];
                $aralik= $aidat['aralik']; 
            ?>
                    <tr onclick="document.location = 'aidat_duzenle.php?sporcu=<?php echo $sporcu['sporcu_no']?>&sene=<?php echo $gosterilen_yil ?>'">
                        <td><?php echo  $ad_soyad ?></td>
                        <td> <?php if  ($ocak=="1"){ ?><i class="material-icons">check</i> <?php }else{?><i
                                class="material-icons">remove</i> <?php }?> </td>
                        <td> <?php if  ($subat=="1"){ ?><i class="material-icons">check</i> <?php }else{?><i
                                class="material-icons">remove</i> <?php }?> </td>
                        <td> <?php if  ($mart=="1"){ ?><i class="material-icons">check</i> <?php }else{?><i
                                class="material-icons">remove</i> <?php }?> </td>
                        <td> <?php if  ($nisan=="1"){ ?><i class="material-icons">check</i> <?php }else{?><i
                                class="material-icons">remove</i> <?php }?> </td>
                        <td> <?php if  ($mayis=="1"){ ?><i class="material-icons">check</i> <?php }else{?><i
                                class="material-icons">remove</i> <?php }?> </td>
                        <td> <?php if  ($haziran=="1"){ ?><i class="material-icons">check</i> <?php }else{?><i
                                class="material-icons">remove</i> <?php }?> </td>
                        <td> <?php if  ($temmuz=="1"){ ?><i class="material-icons">check</i> <?php }else{?><i
                                class="material-icons">remove</i> <?php }?> </td>
                        <td> <?php if  ($agustos=="1"){ ?><i class="material-icons">check</i> <?php }else{?><i
                                class="material-icons">remove</i> <?php }?> </td>
                        <td> <?php if  ($eylul=="1"){ ?><i class="material-icons">check</i> <?php }else{?><i
                                class="material-icons">remove</i> <?php }?> </td>
                        <td> <?php if  ($ekim=="1"){ ?><i class="material-icons">check</i> <?php }else{?><i
                                class="material-icons">remove</i> <?php }?> </td>
                        <td> <?php if  ($kasim=="1"){ ?><i class="material-icons">check</i> <?php }else{?><i
                                class="material-icons">remove</i> <?php }?> </td>
                        <td> <?php if  ($aralik=="1"){ ?><i class="material-icons">check</i> <?php }else{?><i
                                class="material-icons">remove</i> <?php }?> </td>

                    </tr>
                    <?php  } ?>

                </tbody>
            </table>
            <br>
        </div>
    </div>
</div>
<br>


<?php   //  include 'footer.php';?>