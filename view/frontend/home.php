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
    <div class="row">
<?php
        while($chapter=$chapters->fetch())
        {?>
        <div class="3u">
            <section>
                <a href="#" class="image full"><img src="images/pics01.jpg" alt="" /></a>
                <p><?= $chapter['title'] ?></p>
                <a href="?chapter=<?=  $chapter['id'] ?>" class="button">Lire la suite</a>
            </section>
        </div>
        <?php } ?>
    </div>
</div>

<?php
$content=ob_get_clean();
require('view/template.php');
?>