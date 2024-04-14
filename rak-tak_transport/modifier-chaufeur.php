<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification</title>
    <link rel="stylesheet" href="css/reserver.css">
    <link rel="stylesheet" href="css/passager.css">
    
</head>
<body>
    
    <?php
     include_once "connexionbd.php";
     $id=$_GET['id'];
     $req=mysqli_query($con,"SELECT * FROM chaufeur WHERE id_chauffeur = $id");
     $row=mysqli_fetch_assoc($req);
    if(isset($_POST["modifier"])){
        extract($_POST);
        if(isset($_POST['nom']) && isset($_POST['grp']) && isset($_POST['tel'])){
           
            $req=mysqli_query($con, "UPDATE  chaufeur SET nomComplet='$nom',groupesanguin='$grp',tel='$tel' WHERE id_chauffeur=$id");
            if($req){
                header("location:liste-chauffeur.php");
            }else {
                echo "chauffeur non modifier";
            }
        }
    }
    
    ?>
    <header class="header">
            <div class="logo">
                <img src="images\logo-raktak.svg" alt="">
            </div>
            <ul class="menu">
                <li><a href="accueil.php">Accueil</a></li>
                <li><a href="passager.php">Passager</a></li>
                <li><a href="chauffeur.php">Chauffeur</a></li>
                <li><a href="reservation.php">Réservation</a></li>
               
               
            </ul>
            <button><a href="connecte.php">Login</a></button>
        
    </header>
    <div class="tree">
        <div class="contact">
            <img id="directrice" src="images\jeune-femme-coupe-cheveux-afro-portant-pull-blanc_273609-22963.avif" alt="">
            <div class="card">
            </div>
        </div>
        
        <form action="" class="select" method="POST">
            <a href="chauffeur.php">Retourner à la page précédente</a>
        <h3 id="demande"> <strong>Conduire une voiture</strong></h3>
            <label class="la" >Nom complet</label> <br>
            <input type="text" placeholder="type de chauffage " name="nom" value="<?=$row['nomComplet']?>"> <br>
            <label class="la" >Groupe Sanguin</label> <br>
            <input class="ha" type="text" placeholder="votre nom " name="grp" value="<?=$row['groupesanguin']?>"> <br>
            <label class="la" >Téléphone </label> <br>
            <input type="text" placeholder="+221 770010101 " name="tel" value="<?=$row['tel']?>"> <br>
            
            <input type="submit" value="modifier" name="modifier" class="boum">
            <a href="liste-chauffeur.php">Annuler</a>
        </form>
    </div>
</body>
</html>