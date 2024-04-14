<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification</title>
    <link rel="stylesheet" href="css/passager.css">
    <link rel="stylesheet" href="css/reserver.css">
    
</head>
<body>
    
    <?php
     include_once "connexionbd.php";
     $id=$_GET['id'];
     $req=mysqli_query($con,"SELECT * FROM clients WHERE id_client = $id");
     $row=mysqli_fetch_assoc($req);
    if(isset($_POST["modifier"])){
        extract($_POST);
        if(isset($nom) && isset($grp) && isset($tel)&& $ad){
           
            $req=mysqli_query($con, "UPDATE  clients SET nomcomplet='$nom',groupesanguin='$grp',tel='$tel',Adresse='$ad' WHERE id_client=$id");
            if($req){
                header("location:liste-client.php");
            }else {
                echo "client non modifier";
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
                <li><a href="liste-client.php">Passager</a></li>
                <li><a href="liste-chauffeur.php">Chauffeur</a></li>
              
                
            </ul>
            <button><a href="connecte.php">Deconnexion</a></button>
        
    </header>
    <div class="tree">
        <div class="contact">
            <img id="directrice" src="images\jeune-femme-coupe-cheveux-afro-portant-pull-blanc_273609-22963.avif" alt="">
            <div class="card">
            </div>
        </div>
        
        <form action="" class="select" method="POST">
        <h3 id="demande"> <strong>Reserver une voiture</strong></h3>
            <label class="la" >Nom Complet</label> <br>
            <input type="text" placeholder="votre nom " name="nom" value="<?=$row['nomcomplet']?>"> <br>
            <label class="la" >Groupe Sanguin</label> <br>
            <input class="ha" type="text" placeholder="votre groupe " name="grp" value="<?=$row['groupesanguin']?>"> <br>
            <label class="la" >Téléphone </label> <br>
            <input type="text" placeholder="+221 770010101 " name="tel" value="<?=$row['tel']?>"> <br>
            <input type="text" placeholder="+221 770010101 " name="ad" value="<?=$row['Adresse']?>"> <br>
            
            
            <input type="submit" value="Modifier" name="modifier" class="boum">
        </form>
    </div>
</body>
</html>