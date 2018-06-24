<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 18/06/2018
 * Time: 12:10
 */
?>
    <head>
        <script src='https://www.google.com/recaptcha/api.js'></script>
    </head>
<?php
$title='Chapitre';

$siteKey = '6Lf1aGAUAAAAAAc6Md8lde8nRRWQFYCyOlzKrhZw'; // votre clé publique


ob_start(); ?>

    <h1>Chapitre <?= $chapter->num() ?></h1>
    <h2><?= $chapter->title() ?></h2>s<br>
    <p><?= $chapter->content() ?></p>

<?php
    while($comment=$listComments->fetch())
    {
    echo '<p>'.$comment['author'].' <a href="index.php?report='.$comment['id'].'&amp;numchapter='.$chapter->id().'">Signaler le commentaire</a><br>Posté le'.$comment['datepost_fr'].'<br>'.$comment['content'].'</p>';

    }
?>

    <h2>Laisser un commentaire</h2>
    <form action="index.php?newcomment=<?= $chapter->id() ?>" method="post">
        <label>Pseudo :</label><input type="text" name="pseudo"><br>
        <label>Votre commentaire</label><br>
        <textarea name="content"></textarea><br>
        <div class="g-recaptcha" data-sitekey="<?php echo $siteKey; ?>"></div>
        <input type="submit" value="Publier">
    </form>
<?php
// Ma clé privée
$secret = '6Lf1aGAUAAAAAAOeINC1KCntr_yyOcYqFyM1eWPl'; // votre clé privée
// Paramètre renvoyé par le recaptcha
$response = $_POST['g-recaptcha-response'];
// On récupère l'IP de l'utilisateur
$remoteip = $_SERVER['REMOTE_ADDR'];

$api_url = "https://www.google.com/recaptcha/api/siteverify?secret="
    . $secret
    . "&response=" . $response
    . "&remoteip=" . $remoteip ;

$decode = json_decode(file_get_contents($api_url), true);

if ($decode['success'] == true) {
    // C'est un humain
    ?>

    <?php
}

else {
    // C'est un robot ou le code de vérification est incorrecte
}

?>
    <a href="index.php">Revenir à la liste des chapitres</a>

<?
$content=ob_get_clean();
require('view/template.php');
?>