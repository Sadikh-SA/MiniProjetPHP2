<?php
        $tel=$_GET['tel'];
        //$newligne='';
        $file= fopen("../Fichiers/apprenant.txt","r");
        while($ligne=fgets($file)){
            $tab = explode("|",$ligne);
            if ($tel==$tab[5]) {
                if ($tab[7]!="Exclue") {
                    $tab[7]="Exclue";
                    $modif=$tab[0]."|".$tab[1]."|".$tab[2]."|".$tab[3]."|".$tab[4]."|".$tab[5]."|".$tab[6]."|".$tab[7]."|".$tab[8]; 
                }
                else {
                    $tab[7]="OnLine";
                    $modif=$tab[0]."|".$tab[1]."|".$tab[2]."|".$tab[3]."|".$tab[4]."|".$tab[5]."|".$tab[6]."|".$tab[7]."|".$tab[8];
                }    
            }
            else {
                $modif=$ligne;
            }
            $newligne=$newligne.$modif;
        }
        fclose($file);
        $id_file=fopen("../Fichiers/apprenant.txt","w+");
        fwrite($id_file,$newligne);
        fclose($id_file); 
        header('location: exclure.php');
?>