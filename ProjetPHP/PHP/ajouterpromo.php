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
                            <li class="#"><a href="ajouter.php">Ajouter Apprenant</a></li>
                            <li class="active"><a href="#">Ajouter Promo</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="index.php"><span class="glyphicon glyphicon-log-out"></span> Deconnexion</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div style="margin-top: 5%;">
                    <h3 style="color: teal; text-align: center; border: 1px solid teal; box-shadow: 4px 4px; border-radius: 7px 7px; width: 30%; margin: 0 auto; text-transform: uppercase;">Nouvelle Promotion</h3><br><br>
                    <form class="form-horizontal" action="ajouterpromo.php" method="POST">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="libelle">Nom Promotion</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="libelle" placeholder="Enter le nom du nouveau apprenant" name="nom" value="<?php if(isset($_POST['nom']))echo $_POST['nom']?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="PCessio">Date de Commencement</label>
                            <div class="col-sm-6">          
                                <input type="date" class="form-control" id="PCessio" placeholder="Enter le prenom du nouveau apprenant" name="ddn" value="<?php if(isset($_POST['ddn']))echo $_POST['ddn']?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="PPublic">Date De Fin</label>
                            <div class="col-sm-6">
                                <input type="date" class="form-control" id="PPublic" placeholder="Enter la date de naissance du nouveau apprenant" name="ddn1" value="<?php if(isset($_POST['ddn1']))echo $_POST['ddn1']?>" required>
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
        $code = rand(0,1000000);
        $nom = $_POST['nom'];
        $ddn = $_POST['ddn'];
        $ddn1 = $_POST['ddn1'];
        $test=false;
        $test1=false;
        $file=fopen("../Fichiers/promo.txt","r");
        while ($ligne=fgets($file)) {
            $tab = explode("|",$ligne);
            if (strtolower($nom)==strtolower($tab[1]) || $code == $tab[0]) {
                $test=true;
            }
        }
        fclose($file);
        $id_file=fopen("../Fichiers/promo.txt","a+");
            if ($test==true) {
                echo"<h2 style='color: darkred; text-align: center; width: 50%; text-transform: uppercase; margin: 0 auto; margin-top: -35%;'>Cette Promotion Existe déja. Verifiez bien.</h2>";
            }
            else {
                fwrite($id_file,"\n".$code."|".$nom."|".$ddn."|".$ddn1);
                echo "<h2 style='color: teal; text-align: center; width: 50%; text-transform: uppercase; margin: 0 auto; margin-top: -35%;'>Promotion ajoutée avec succès.</h2>";
            }
        fclose($id_file);
    }
?>