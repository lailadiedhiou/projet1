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
                <li><a href="liste-client.php">Passager</a></li>
                <li><a href="liste-chauffeur.php">Chauffeur</a></li>
               
            </ul>
            <button><a href="connecte.php">Login</a></button>
        
    </header>
    <div class="form">
    <h1>Inscription</h1>
    <form action="" method="post">
        <label for="login">Email:</label>
        <input type="text" name="email">
        <label for="mdp">Mot de passe:</label>
        <input type="password" name="mdp">
        <label for="role">Role:</label>
        <input type="text" name="role">
        <input type="submit" name="Ajouter_user" value="s'inscrire">
        
    <?php
    if(isset($_POST['Ajouter_user'])){
        extract($_POST);
        if(isset($email) && ($mdp)){
             include_once "connexionbd.php";
             session_start();
             $req = mysqli_query($con , "INSERT INTO users VALUES(null, '$email','$mdp','$role')");
             if($req){
                 header("location: connecte.php");
             }else {
                 echo "users non ajouté";
             }
        }
    }   
    ?>
    </form>
    </div>
</body>
</html>