<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/reserver.css">
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
                <?php
                session_start();
                if($_SESSION['role']==="admin"){
                ?>
                <li><a href="reservation.php">Reservations</a></li>
                <?php
                }
                ?>
               
            </ul>
            <button><a href="connecte.php">Login</a></button>
        
    </header>
    <div class="tree">
        <div class="contact">
            <img id="directrice" src="images\jeune-femme-coupe-cheveux-afro-portant-pull-blanc_273609-22963.avif" alt="">
            <div class="card">
            </div>
        </div>
        
        <form action="potuler.php" class="select" method="POST">
            <a href="chauffeur.php">Retourner à la page précédente</a>
        <h3 id="demande"> <strong>Conduire une voiture</strong></h3>
            <label class="la" >Nom complet</label> <br>
            <input type="text" placeholder="type de chauffage " name="nom"> <br>
            <label class="la" >Groupe Sanguin</label> <br>
            <input class="ha" type="text" placeholder="votre nom " name="grp"> <br>
            <label class="la" >Téléphone </label> <br>
            <input type="text" placeholder="+221 770010101 " name="tel"> <br>
            
            <input type="submit" value="Soumettre" name="Soumettre" class="boum">
        </form>
        <?php
        include_once "connexionbd.php";
            if(isset($_POST["Soumettre"])){
                extract($_POST);
                if(isset($_POST['nom']) && isset($_POST["grp"]) && isset($_POST["tel"]) ){
                    
                    
                    
                    $req1=mysqli_query($con, "INSERT INTO chaufeur  VALUES (NULL, '$nom', '$grp', '$tel')");
                   
                if($req1){
                    echo "<h3 id='demande'> Opération réussie,votre postulation a bien été pris en compte </h3>";
                
                }else {
                    echo "reservation non ajouter";
                }
                }
            }
    
         ?>
    </div>     
</body>
</html>