<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <script src="../JQuery/jquery-3.2.1.min.js"></script>
        <script src="../Bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../CSS/style.css">
        <title>Ajouter</title>
        <style>
            /* Remove the navbar's default rounded borders and increase the bottom margin */ 
            .navbar {
                margin-bottom: 50px;
                border-radius: 0;
            }
            
            /* Remove the jumbotron's default bottom margin */ 
            .jumbotron {
                margin-bottom: 0;
            }
        
            /* Add a gray background color and some padding to the footer */
            footer {
                background-color: #f2f2f2;
                padding: 30px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="jumbotron">
                <div class="container text-center">
                    <img src="../Images/rejoind.jpeg" style="width:100%; height:350px;">
                </div>
            </div>

            <nav class="navbar navbar-inverse">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>                        
                        </button>
                        <a class="navbar-brand" href="acceuil.php">MENU</a>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="#">Ajouter Apprenant</a></li>
                            <li class="#"><a href="ajouterpromo.php">Ajouter Promo</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="index.php"><span class="glyphicon glyphicon-log-out"></span> Deconnexion</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div style="margin-top: 5%;">
                    <h3 style="color: teal; text-align: center; border: 1px solid teal; box-shadow: 4px 4px; border-radius: 7px 7px; width: 30%; margin: 0 auto; text-transform: uppercase;">Nouveau Apprenant</h3><br><br>
                    <form class="form-horizontal" action="ajouter.php" method="POST">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="libelle">Nom</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="libelle" placeholder="Enter le nom du nouveau apprenant" name="nom" value="<?php if(isset($_POST['nom']))echo $_POST['nom']?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="PCessio">Prénom</label>
                            <div class="col-sm-6">          
                                <input type="text" class="form-control" id="PCessio" placeholder="Enter le prenom du nouveau apprenant" name="prenom" value="<?php if(isset($_POST['prenom']))echo $_POST['prenom']?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="PPublic">Date De Naissance</label>
                            <div class="col-sm-6">
                                <input type="date" class="form-control" id="PPublic" placeholder="Enter la date de naissance du nouveau apprenant" name="ddn" value="<?php if(isset($_POST['ddn']))echo $_POST['ddn']?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="Tva">Lieu de Naissance</label>
                            <div class="col-sm-6">          
                                <input type="text" class="form-control" id="lieu" placeholder="TEnter le lieu de naissance du nouveau apprenant" name="lieu" value="<?php if(isset($_POST['lieu']))echo $_POST['lieu']?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="PCessio">Téléphone</label>
                            <div class="col-sm-6">          
                                <input type="number" class="form-control" id="tel" placeholder="Enter le numéro de Téléphone du nouveau apprenant" name="tel" value="<?php if(isset($_POST['tel']))echo $_POST['tel']?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="PPublic">E-mail</label>
                            <div class="col-sm-6">
                                <input type="mail" class="form-control" id="PPublic" placeholder="Enter le mail du nouveau apprenant" name="mail" value="<?php if(isset($_POST['mail']))echo $_POST['mail']?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2"  for="Tva">Statut</label>
                            <div class="col-sm-6">          
                                <select name="statut" placeholder="Sélectionner le Statut du nouveau apprenant" id="statut" value="<?php if(isset($_POST['statut']))echo $_POST['statut']?>" required >
                                    <option value=""></option>
                                    <option value="Présentiel" name="statut">Présentiel</option>
                                    <option value="OnLine" name="statut">OnLine</option>
                                    <option value="OnLine" name="statut">Exclue</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2"  for="Tva">Promotion</label>
                            <div class="col-sm-6">
                                <?php $id_file = fopen("../Fichiers/promo.txt","r");
                                    echo '<select name="promo" placeholder="Enter la promotion du nouveau apprenant" id="statut" required>
                                                <option value="" name="promo"></option>';
                                            while ($ligne=fgets($id_file)) {
                                                $tab = explode("|",$ligne);
                                                echo '<option value="'.$tab[1].'" name="promo">'.$tab[1].'</option>';
                                            }
                                    echo '</select>';
                                    fclose($id_file);
                                ?>          
                            </div>
                        </div>
                        <div class="form-group">        
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" name="submit" class="btn btn-success" style="background: teal;">Submit</button>
                            </div>
                        </div>
                    </form>
            </div>
        </div>
        <footer class="container-fluid text-center" style="background:#CCC;">
            <p>Online Store Copyright</p>  
            <form class="form-inline">Get deals:
                <input type="email" class="form-control" size="50" placeholder="Email Address">
                <button type="button" class="btn btn-danger">Sign Up</button>
            </form>
        </footer>
    </body>
</html>

<?php
    if (isset($_POST['submit'])) {
        $code =rand(0,1000000);
        $nom = strtoupper($_POST['nom']);
        $prenom = $_POST['prenom'];
        $ddn = $_POST['ddn'];
        $lieu = $_POST['lieu'];
        $tel = $_POST['tel'];
        $mail = $_POST['mail'];
        $statut = $_POST['statut'];
        $promo = $_POST['promo'];

        $id_file = fopen("../Fichiers/apprenant.txt","r");
        while ($ligne=fgets($id_file)) {
            $tab = explode("|",$ligne);
            if (($code == $tab[0]) || (strtolower($nom)==strtolower($tab[1]) && strtolower($prenom)==strtolower($tab[2]) && ($ddn==$tab[3]) && strtolower($lieu)==strtolower($tab[4])) || $tel==$tab[5] || $mail==$tab[6]) {
                $test=true;
            }
        }
        fclose($id_file);
        $id_file=fopen("../Fichiers/apprenant.txt","a+");
            if ($test==true) {
                echo"<h2 style='color: darkred; text-align: center; width: 50%; text-transform: uppercase; margin: 0 auto; margin-top: -55%;'>Ce Apprenant $prenom $nom existe déja. Verifiez bien.</h2>";
            }
            else {
                fwrite($id_file,"\n".$code."|".$nom."|".$prenom."|".$ddn."|".$lieu."|".$tel."|".$mail."|".$statut."|".$promo);
                echo "<h2 style='color: teal; text-align: center; width: 50%; text-transform: uppercase; margin: 0 auto; margin-top: -55%;'>Apprenant(e) ajouté(e) avec succès.</h2>";
            }
        fclose($id_file);
        
    }
?>