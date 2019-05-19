<html>
<head>
<title>Authentification du Super Admin</title>
    <link rel="stylesheet" type="text/css" href="../CSS/login.css">
<body>
    <div class="loginbox">
    <img src="../Images/avatar.png" class="avatar">
        <h1>Authentification</h1>
        <form action="index.php" method="POST" >
            <p>Login</p>
            <input type="text" name="username" value="<?php if(isset($_POST['username']))echo $_POST['username']?>" placeholder="Enter Username">
            <p>Mot de Passe</p>
            <input type="password" name="pwd" placeholder="Enter Password">
            <input type="submit" name="Login" value="Login">
            <a href="#">mot de passe oublié</a><br>
            <a href="#">Pas de Compte? S'inscrire</a>
        </form>
        
    </div>
   

</body>
</head>
</html>
<?php
$id_file = fopen("../Fichiers/utilisateur.txt","r");
if (isset ($_POST['Login'])) {
    $login=htmlspecialchars($_POST['username']);
    $mdp=htmlspecialchars($_POST['pwd']);
    while($ligne = fgets($id_file)){
        $users = explode(",",$ligne);
        if ($users[0]==$login) {
            if($users[1]==$mdp) { 
                header('location: acceuil.php');
            }
            else {
                $i++;
            }
        }
        else {
            $j++;
        }
    }
    if(substr_count($id_file, "\n")==$j || substr_count($id_file, "\n")==$i){
        echo"<h2 style='text-align:center; color: teal; margin-top: 20px;'>Identifiant Incorrecte</h2>";
    }
    fclose($id_file);
}
?>
