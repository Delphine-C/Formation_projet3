<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 25/06/2018
 * Time: 17:39
 */
?>

<!-- Header -->
<div id="header">
    <div class="container">

        <!-- Logo -->
        <div id="logo">
            <h1><a href="accueil">Billet simple pour l'alaska</a></h1>
            <span>Par Jean Forteroche, écrivain et acteur</span>
        </div>

        <!-- Nav -->
        <nav id="nav">
            <ul>
                <li><a href="accueil"><span class="glyphicon glyphicon-home"></span> Accueil</a></li>
                <li><a href="chapitres"><span class="glyphicon glyphicon-book"></span> Lire le livre</a></li>
                <li><a href="a-propos"><span class="glyphicon glyphicon-info-sign"></span> A propos</a></li>
                <li><a href="contact"><span class="glyphicon glyphicon-envelope"></span> Contact</a></li>
                <li>
                    <?php
                    if(isset($_SESSION['user'])){
                        ?>
                    <a href="tableau-de-bord"><span class="glyphicon glyphicon-wrench"></span> Tableau de bord</a></li>
                    <li><a href="deconnexion"><span class="glyphicon glyphicon-user"></span> Déconnexion</a>
                        <?php
                    }
                    else{?>
                        <a href="se-connecter"><span class="glyphicon glyphicon-user"></span> Connexion</a>
                        <?php
                    }
                    ?>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- Header -->