<?php
include_once "connexionbd.php";
session_start();

if(isset($_POST['connect'])){
    $email = $_POST['email'];
    $role = $_POST['role'];
    $mdp = $_POST['mdp'];

    $req = "select id_user from users where email='$email' and mdp='$mdp'";
    $result=mysqli_query($con, $req);
    if(mysqli_num_rows($result)==1){
        $_SESSION['email']=$email;
        $_SESSION['role']=$role;
        header('location:accueil.php');
    }else {
        $error="email ou mot de passe incorrecte";
    }
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/tableau.css">
    <link rel="stylesheet" href="css/passager.css">
</head>
<body>
<header class="header">
            <div class="logo">
                <img src="images\logo-raktak.svg" alt="">
            </div>
            <ul class="menu">
                <li><a href="accueil.php">Accueil</a></li>
                <li><a href="passager.php">Passager</a></li>
                <li><a href="chauffeur.php">Chauffeur</a></li>

            </ul>
            <button><a href="connecte.php">Login</a></button>
        
</header>
    
    <div class="form">
    <h1>Connexion...</h1>
    <form action="" method="post">
        <label for="login">Email:</label>
        <input type="text" name="email">
        <label for="mdp">Mot de passe:</label>
        <input type="password" name="mdp">
        <label for="role">Role</label>
        <input type="text" name="role">
        <input type="submit" name="connect" value="se connecter">
        <input type="submit" name="Ajouter_user" value="creer compte">
        <?php if(isset($error)){
            echo "<h3>$error</h3>";
        }
        ?>
         <?php
    if(isset($_POST['Ajouter_user'])){
        header("location:inscription-users.php");
    }   
    ?>
    <a href="deconnexion.php"><button>se deconnecter</button></a>
    </form>
    </div>
</body>
</html>
