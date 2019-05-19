<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../CSS/style.css">
        <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <script src="../JQuery/jquery-3.2.1.min.js"></script>
        <script src="../Bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../CSS/style.css">
        <title>Exclure un Apprenants</title>
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
                            <li class="active"><a href="#">Exclure Apprenants</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="index.php"><span class="glyphicon glyphicon-log-out"></span> Deconnexion</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="tab-content">
                <div id="listeFournisseur" class="tab-pane fade in active">
                    <h3 style="color: teal; text-align: center; border: 1px solid teal; box-shadow: 4px 4px; border-radius: 7px 7px; width: 30%; margin: 0 auto; text-transform: uppercase;">Liste des Apprenants</h3><br><br>
                    <form id="recherche-form" class="recherche-form" method="POST" action=<?= $_SERVER["PHP_SELF"] ?>>
                        <div class="form-group">
                            <div class="produit">
                                <label for="produit"><h3>Recherche d'Apprenants Par Promo</h3></label>
                                <?php $id_file = fopen("../Fichiers/promo.txt","r");
                                    echo '<select name="promo" placeholder="Enter la promotion du nouveau apprenant" id="statut" style="width: 50%; margin-left:30px;" required>
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
                        <div class="form-group" style="margin-bottom:10%; margin-top:-5%;">        
                            <div class="col-sm-offset-11 col-sm-10" >
                                <button type="submit" name="lister" class="btn btn-success" style="background:teal;">Submit</button>
                            </div>
                        </div>
                    </form>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>CODE</th>
                                <th>NOM</th>
                                <th>PRENOM</th>
                                <th>DATE DE NAISSANCE</th>
                                <th>LIEU DE NAISSANCE</th>
                                <th>TÉLÉPHONE</th>
                                <th>E-MAIL</th>
                                <th>STATUT</th>
                                <th>PROMO</th>
                                <th>INCIDENT</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            if (isset($_POST['lister'])) {
                                $promo=$_POST['promo'];
                                $id_file = fopen("../Fichiers/apprenant.txt","r");
                                while ($ligne=fgets($id_file)) {
                                    $tab = explode("|",$ligne);
                                    if ($promo==$tab[8] || $promo."\n"==$tab[8]) {
                                        if ($tab[7]=="Exclue") {
                                            echo "<tr class='bg-danger' style='background: darkred; color: white;'>";
                                        }
                                        else {
                                            echo "<tr>";
                                        }
                                        for ($i=0; $i <count($tab) ; $i++) { 
                                            echo "<td>$tab[$i]</td>";
                                        }
                                        echo "<td><a href='traitement.php?tel=".$tab[5]."'><button type='submit' class='btn btn-danger' name='statut' style='width:100%; text-align:center;'>Exclure</button></a></td>";
                                        echo "</tr>";
                                    }
                                }
                                fclose($id_file);
                            } else {
                                $id_file = fopen("../Fichiers/apprenant.txt","r");
                                while ($ligne=fgets($id_file)) {
                                    $tab = explode("|",$ligne);
                                    if ($tab[7]=="Exclue") {
                                        echo "<tr class='bg-danger' style='background: darkred; color: white;'>";
                                    }
                                    else {
                                        echo "<tr>";
                                    }
                                    for ($i=0; $i <count($tab) ; $i++) { 
                                        echo "<td>$tab[$i]</td>";
                                    }
                                    if ($tab[7]!="Exclue") {
                                        echo "<td><a href='traitement.php?tel=".$tab[5]."'><button type='submit' class='btn btn-danger' name='statut' style='width:100%; text-align:center;'>Exclure</button></a></td>";
                                    }
                                    else {
                                        echo "<td><a href='traitement.php?tel=".$tab[5]."'><button type='submit' class='btn btn-success' style='background: teal;' name='statut' style='width:100%; text-align:center;'>OnLine</button></a></td>";
                                    }
                                    echo "</tr>";
                                }
                                fclose($id_file);
                            }
                        ?>

                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <footer class="container-fluid text-center" style="background:#CCC;">
            <p>Online Store Copyright</p>  
            <form class="form-inline">Get deals:
                <input type="email" class="form-control" size="50" placeholder="Email Address">
                <button type="button" class="btn btn-success">Sign Up</button>
            </form>
        </footer>
    </body>
</html>

