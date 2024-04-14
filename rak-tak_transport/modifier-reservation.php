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
<header class="header">
            <div class="logo">
                <img src="images\logo-raktak.svg" alt="">
            </div>
            <ul class="menu">
                <li><a href="accueil.php">Accueil</a></li>
                <li><a href="liste-client.php">Passager</a></li>
                <li><a href="liste-chauffeur.php">Chauffeur</a></li>
                <li><a href="reservation.php">Réservations</a></li>
               
               
            </ul>
            <button><a href="connecte.php">Login</a></button>
        
    </header>
    <?php
     include_once "connexionbd.php";
     $id=$_GET['id'];
     $req=mysqli_query($con,"SELECT * FROM reservations inner join clients WHERE num_reservation = $id");
     $row=mysqli_fetch_assoc($req);
    if(isset($_POST["modifier"])){
        extract($_POST);
        if(isset($nom) && isset($grp)  && isset($tel) && $date){
           
            $req=mysqli_query($con, "UPDATE  reservations inner join clients  SET nomcomplet='$nom',groupesanguin='$grp',tel='$tel', date ='$date' WHERE num_reservation=$id");
            if($req){
                header("location:reservation.php");
            }else {
                echo "reservation non modifier";
            }
        }
    }
    
    ?>
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
            <input type="text" placeholder="+221 770010101 " name="date" value="<?=$row['date']?>"> <br>
            
            
            <input type="submit" value="Modifier" name="modifier" class="boum">
        </form>
    </div>
</body>
</html>