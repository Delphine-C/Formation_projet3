<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
    <link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!--[if lte IE 8]><script src="web/js/html5shiv.js"></script><![endif]-->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="web/js/skel.min.js"></script>
    <script src="web/js/skel-panels.min.js"></script>
    <script src="web/js/init.js"></script>
    <noscript>
        <link rel="stylesheet" href="web/css/skel-noscript.css" />
        <link rel="stylesheet" href="web/css/style.css" />
    </noscript>
</head>

<body>
    <?php
    require('view/header.php');
    ?>

    <div id="main">
        <?= $content ?>
    </div>

    <footer>
        <div id="footer">
            Tous droits réservés.
        </div>
    </footer>

</body>

</html>