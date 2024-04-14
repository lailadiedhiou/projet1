<?php
        include_once "connexionbd.php";
        session_start();
        $req1=mysqli_query($con,"SELECT * FROM reservations join clients join chaufeur ORDER BY num_reservation desc");
        if(isset($_GET['search']) and !empty($_GET['search'])){
            $recherche=htmlspecialchars($_GET['search']);
            $req1=mysqli_query($con,'SELECT * from reservations join clients join chaufeur where date like "%' .$recherche.'%" ORDER BY num_reservation DESC');
        }
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/passager.css">
    <link rel="stylesheet" href="css/tableau.css">
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
            <button><a href="connecte.php">Deconnexion</a></button>
        
    </header>
    <div class="container">
        
        <table>
            <tr id="items">
                <th>Nom Complet</th>
                <th>Groupe Sanguin</th>
                <th>Téléphone</th>
                <th>Modifier</th>
                <th>Supprimer</th>
            </tr>
    
            <?php
            if(mysqli_num_rows($req1)>0){
                while($row=mysqli_fetch_assoc($req1)){
                    ?>
                    <tr>
                        <td><?=$row['nomcomplet']?></td>
                        <td><?=$row['nomComplet']?></td>
                        <td><?=$row['date']?></td>

                        
                        <td><a href="modifier-reservation.php?id=<?=$row['num_reservation']?>"><img src="images\pen.png" alt=""></a></td>
                        <td><a href="supprimer-reservation.php?id=<?=$row['num_reservation']?>" onClick="return confirm('Etes vous sur ?')"><img src="images\trash.png" alt=""></a></td>
                    
                    </tr>
                    <?php     
                }
                    }else {
                    ?>
                    <p>Aucun resultat trouvé</p>
                <?php
            }
            ?>      
        </table>
        <form action="" method="GET">
            <input type="search" name="search" placeholder="Rechercher...">
            <input type="submit" value="Envoyer">
        </form>
    </div>
</body>
</html>