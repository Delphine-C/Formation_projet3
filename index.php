<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 18/06/2018
 * Time: 11:47
 */
require('controller/frontend.php');
require('controller/backend.php');

try
{
    if(isset($_GET['chapter'])){
        if($_GET['chapter']>0){
            readChapter($_GET['chapter']);
        }
        else{
            throw new Exception('Aucun identifiant de chapitre envoyé');
        }
    }

    // BY DEFAULT
    else{
        listChapters();
    }
}
catch(Exception $e)
{
    echo 'Erreur: '  .$e->getMessage();
}