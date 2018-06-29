<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 27/06/2018
 * Time: 18:08
 */
$title='Accueil';

ob_start(); ?>
<div class="container">
    <header>
        <h2>Voici les derniers chapitres publiés</h2>
    </header>
    <div class="row">
<?php
        while($chapter=$chapters->fetch())
        {?>
        <div class="3u">
            <section>
                <a href="?chapter=<?=  $chapter['id'] ?>" class="image full"><img src="web/images/alaska-ice-mountains.jpg" alt="skiers" /></a>
                <h3>Chapitre <?= $chapter['num'] ?></h3>
                <p><?= $chapter['title'] ?></p>
                <a href="?chapter=<?=  $chapter['id'] ?>" class="button">Lire le chapitre</a>
            </section>
        </div>
        <?php } ?>
    </div>
</div>

<?php
$content=ob_get_clean();
require('view/template.php');
?>