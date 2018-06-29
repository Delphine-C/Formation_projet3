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
            <h1><a href="#">Billet simple pour l'alaska</a></h1>
            <span>Par Jean Forteroche, écrivain et acteur</span>
        </div>

        <!-- Nav -->
        <nav id="nav">
            <ul>
                <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Accueil</a></li>
                <li><a href="index.php?chapters"><span class="glyphicon glyphicon-book"></span> Lire le livre</a></li>
                <li><a href="#"><span class="glyphicon glyphicon-info-sign"></span> A propos</a></li>
                <li><a href="index.php?contact"><span class="glyphicon glyphicon-envelope"></span> Contact</a></li>
                <li>
                    <?php
                    if(isset($_SESSION['user'])){
                        ?>
                    <a href="index.php?dashboard"><span class="glyphicon glyphicon-wrench"></span> Tableau de bord</a></li>
                    <li><a href="index.php?deconnexion"><span class="glyphicon glyphicon-user"></span> Déconnexion</a>
                        <?php
                    }
                    else{?>
                        <a href="index.php?getConnexion"><span class="glyphicon glyphicon-user"></span> Connexion</a>
                        <?php
                    }
                    ?>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- Header -->