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
    if(isset($_GET['chapter'])){}

    // BY DEFAULT
    else{
        listChapters();
    }
}
catch(Exception $e)
{
    echo 'Erreur: '  .$e->getMessage();
}