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
        <div class="">
        <a href="recherche-chauffeur.php">Rechercher un chauffeur</a>
        </div>
        <a href="accueil.php">Retour</a>
        <h1>Liste des chaufeur</h1>
        <a href="potuler.php"class="Btn_add" >Ajouter un Chauffeur</a>
        <table>
            <tr id="items">
                <th>Nom Complet</th>
                <th>Groupe Sanguin</th>
                <th>Téléphone</th>
                <th>Action1</th>
                <th>Action2</th>
            </tr>
    
        <?php
            include_once "connexionbd.php";
          
            $req=mysqli_query($con,"SELECT * FROM chaufeur");
            if(mysqli_num_rows($req) == 0){
                echo "il n'y a pas encore de chauffeur ajouter";
            }else{
                while($row=mysqli_fetch_assoc($req)){
                    ?>
                    <tr>
                        <td><?=$row["nomComplet"]?></td>
                        <td><?=$row["groupesanguin"]?></td>
                        <td><?=$row["tel"]?></td>
                       
                            <td><a href="modifier-chaufeur.php?id=<?=$row['id_chauffeur']?>"><img src="images\pen.png" alt=""></a></td>
                            <td><a href="supprimer-chaufeur.php?id=<?=$row['id_chauffeur']?>" onClick="return confirm('Etes vous sur ?')"><img src="images\trash.png" alt=""></a></td>
                        
                    </tr>
            <?php     
                }
            }       
            ?>
            
        
        </table>
    </div>
</body>
</html>