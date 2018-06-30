<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 19/06/2018
 * Time: 11:14
 */

$title='Modérer les commentaires signalés';

ob_start();
?>
<header>
    <h2>Modération des commentaires</h2>
</header>
<h3 class="moderate">Commentaires signalés</h3>
<?php
if($countreported>0)
{
?><table class="table">
<?php
    while($comment=$reported->fetch())
    {
        echo '<tr><td>Posté par '.htmlspecialchars($comment['author']).' le '.$comment['datepost_fr'].' : "'.htmlspecialchars($comment['content']).'"</td><td><a href="index.php?validcomment='.$comment['id'].'">Accepter ce commentaire</a> | <a href="index.php?deletecomment='.$comment['id'].'">Supprimer ce commentaire</a></td></tr>';
    }
?>
    </table>
<?php
}
else{
    echo 'Aucun commentaires signalés.';
}
?>

<h3 class="moderate moderate2">Commentaires non signalés</h3>
<?php
if($countunreported>0)
{
?><table class="table">
<?php
    while($comment=$unreported->fetch())
    {
        echo '<tr><td>Posté par '.htmlspecialchars($comment['author']).' le '.$comment['datepost_fr'].' : "'.htmlspecialchars($comment['content']).'"</td><td><a href="index.php?deletecomment='.$comment['id'].'">Supprimer ce commentaire</a></td></tr>';
    }
?>
    </table>
<?php
}
else{
    echo 'Aucun commentaires.';
}

$content=ob_get_clean();
require('view/template.php');
?>
