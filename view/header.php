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
                <li class="active"><a href="index.php">Accueil</a></li>
                <li><a href="#">Lire le livre</a></li>
                <li><a href="#">A propos</a></li>
                <li><a href="#">Contact</a></li>
                <li>
                    <?php
                    if(isset($_SESSION['user'])){
                        ?>
                        <a href="index.php?deconnexion">Déconnexion</a>
                        <?php
                    }
                    else{?>
                        <a href="index.php?getConnexion">Connexion</a>
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