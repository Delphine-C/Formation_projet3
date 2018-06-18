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
    // CHAPTERS

    if(isset($_GET['chapter'])){
        if($_GET['chapter']>0){
            readChapter($_GET['chapter']);
        }
        else{
            throw new Exception('Aucun identifiant de chapitre envoyé');
        }
    }
    elseif(isset($_GET['addChapter'])){
        addChapter();
    }
    elseif(isset($_GET['newChapter'])){
        writeChapter();
        listChapters();
    }
    elseif (isset($_GET['modifyChapter'])){ // choose the chapter to modify
        modifyChapter();
    }
    elseif (isset($_GET['updateChapter'])){ // make changes
        if($_GET['updateChapter']>0){
            updateChapter($_GET['updateChapter']);
        }
        else{
            throw new Exception('Aucun identifiant de chapitre envoyé');
        }
    }
    elseif (isset($_GET['chaptermodified'])){ // save changes in the DB
        if($_GET['chaptermodified']>0){
            chapterModified($_GET['chaptermodified']);
        }
        else{
            throw new Exception('Aucun identifiant de chapitre envoyé');
        }
    }
    elseif (isset($_GET['deleteChapter'])){
        if ($_GET['deleteChapter']>0){
            deleteChapter($_GET['deleteChapter']);
        }
        else{
            throw new Exception('Aucun identifiant de chapitre envoyé');
        }
    }

    // ACCOUNT

    elseif (isset($_GET['changepw'])){
        changePassword();
    }
    elseif (isset($_GET['pwsubmitted'])){
        passwordModified($_POST['password']);
    }

    // CONNEXION

    elseif (isset($_GET['getConnexion'])){
        getConnect();
    }
    elseif(isset($_GET['testConnexion'])){
        testConnect();
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