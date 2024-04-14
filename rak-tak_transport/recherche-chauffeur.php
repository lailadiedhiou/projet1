<?php
        include_once "connexionbd.php";
        session_start();
        $req1=mysqli_query($con,"SELECT * FROM chaufeur ORDER BY id_chauffeur desc");
        if(isset($_GET['search']) and !empty($_GET['search'])){
            $recherche=htmlspecialchars($_GET['search']);
            $req1=mysqli_query($con,'SELECT * from chaufeur where nomComplet like "%' .$recherche.'%" ORDER BY id_chauffeur DESC');
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
        <form action="" method="GET">
            <input type="search" name="search" placeholder="Rechercher...">
            <input type="submit" value="Envoyer">
        </form>
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
                        <td><?=$row['nomComplet']?></td>
                        <td><?=$row['groupesanguin']?></td>
                        <td><?=$row['tel']?></td>

                        
                        <td><a href="modifier-chaufeur.php?id=<?=$row['id_chauffeur']?>"><img src="images\pen.png" alt=""></a></td>
                        <td><a href="supprimer-chaufeur.php?id=<?=$row['id_chauffeur']?>" onClick="return confirm('Etes vous sur ?')"><img src="images\trash.png" alt=""></a></td>
                   
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
    </div>
</body>
</html>