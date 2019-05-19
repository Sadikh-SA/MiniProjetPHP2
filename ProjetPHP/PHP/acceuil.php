<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="../Bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <script src="../JQuery/jquery-3.2.1.min.js"></script>
        <script src="../Bootstrap/js/bootstrap.min.js"></script>
        <title>Accueil</title>
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
            h4 {
                color: white;
            }
            #panel {
                background: teal;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="jumbotron">
                <div class="container text-center">
                    <img src="../Images/background.jpeg">
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
                        <a class="navbar-brand" href="#">SACoding.sn</a>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="index.php"><span class="glyphicon glyphicon-log-out"></span> Deconnexion</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
    
            <div class="row">
                <div class="col-sm-6">
                    <div class="panel panel-success">
                        <div class="panel-footer" id="panel"></div>
                        <div class="panel-body"><a href="lister.php"><img src="../Images/listeapprenant.jpeg" class="img-responsive" style="width:100%; height:250px;" alt="Image"></a></div>
                        <div class="panel-heading" id="panel"><a href="lister.php"><h4 align="center">LES APPRENANTS</h4></a></div>
                    </div>
                </div>
                <div class="col-sm-6"> 
                    <div class="panel panel-success">
                        <div class="panel-footer" id="panel"></div>
                        <div class="panel-body"><a href="ajouter.php"><img src="../Images/rejoind.jpeg" class="img-responsive" style="width:100%; height:250px;" alt="Image"></a></div>
                        <div class="panel-heading" id="panel"><a href="ajouter.php"><h4 align="center">AJOUTER</h4></a></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6"> 
                    <div class="panel panel-success">
                        <div class="panel-footer" id="panel"></div>
                        <div class="panel-body"><a href="modifier.php"><img src="../Images/images.jpeg" class="img-responsive" style="width:100%; height:250px;" alt="Image"></a></div>
                        <div class="panel-heading" id="panel"><a href="modifier.php"><h4 align="center">MODIFIER</h4></a></div>
                    </div>
                </div>
                <div class="col-sm-6"> 
                    <div class="panel panel-success">
                        <div class="panel-footer" id="panel"></div>
                        <div class="panel-body"><a href="supprimer.php"><img src="../Images/background.png" class="img-responsive" style="width:100%; height:250px;" alt="Image"></a></div>
                        <div class="panel-heading" id="panel"><a href="exclure.php"><h4 align="center">EXCLURE</h4></a></div>
                    </div>
                </div>
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