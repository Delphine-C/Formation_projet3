<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
<link rel="stylesheet" href="web/css/style.css"/>
</head>

<body>
<?php
if(isset($_SESSION['user'])){
    ?>
    <a href="index.php?deconnexion">Déconnexion</a>
    <br>
    <p>Bonjour <?= $_SESSION['user']->username() ?> !</p>
    <?php
}
else{?>
    <a href="index.php?getConnexion">Connexion</a>
    <?php
}
?>

<?= $content ?>
</body>
</html>