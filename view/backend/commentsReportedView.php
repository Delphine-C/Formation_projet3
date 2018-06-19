<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 19/06/2018
 * Time: 11:14
 */

$title='Modérer les commentaires signalés';

ob_start();

while($comment=$reported->fetch())
{
    echo 'Posté par '.$comment['author'].' le '.$comment['datepost_fr'].' : "'.$comment['content'].'" <a href="index.php?validcomment='.$comment['id'].'">Accepter ce commentaire</a> | <a href="index.php?deletecomment='.$comment['id'].'">Supprimer ce commentaire</a><br>';

}

$content=ob_get_clean();
require('view/template.php');
?>
