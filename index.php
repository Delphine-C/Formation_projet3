<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 18/06/2018
 * Time: 11:47
 */
require ('controller/chapters.php');
require ('controller/comments.php');
require ('controller/users.php');
require ('controller/pages.php');

session_start();

try
{
    // CHAPTERS

    if(isset($_GET['chapter'])){
        readChapter($_GET['chapter']);
    }
    elseif (isset($_GET['chapters'])){
        listChapters();
    }
    elseif(isset($_GET['addChapter'])){
        addChapter();
    }
    elseif(isset($_GET['newChapter'])){
        writeChapter();
    }
    elseif (isset($_GET['modifyChapter'])){ // choose the chapter to modify
        modifyChapter();
    }
    elseif (isset($_GET['updateChapter'])){ // make changes
        updateChapter($_GET['updateChapter']);
    }
    elseif (isset($_GET['chaptermodified'])){ // save changes in the DB
        chapterModified($_GET['chaptermodified']);
    }
    elseif (isset($_GET['deleteChapter'])){
        deleteChapter($_GET['deleteChapter']);
    }

    // COMMENTS

    elseif (isset($_GET['newcomment'])){
        addComment($_GET['newcomment']);
    }
    elseif (isset($_GET['report']) && isset($_GET['numchapter'])){
        reportComment($_GET['report']);
        readChapter($_GET['numchapter']);
    }
    elseif (isset($_GET['moderate'])){
        moderate();
    }
    elseif (isset($_GET['validcomment'])){
        validComment($_GET['validcomment']);
    }
    elseif (isset($_GET['deletecomment'])){
        deleteComment($_GET['deletecomment']);
    }

    // ACCOUNT

    elseif(isset($_GET['dashboard'])){
        getdashboard();
    }
    elseif (isset($_GET['changepw'])){
        changePassword();
    }
    elseif (isset($_GET['pwsubmitted'])){
        passwordModified($_POST['password']);
    }
    elseif (isset($_GET['contact'])){
        contact();
    }

    // CONNEXION

    elseif (isset($_GET['getConnexion'])){
        getConnect();
    }
    elseif(isset($_GET['testConnexion'])){
        testConnect();
    }
    elseif (isset($_GET['deconnexion'])){
        deconnect();
        home();
    }

    // ABOUT

    elseif (isset($_GET['about'])){
        about();
    }

    // BY DEFAULT

    else{
        home();
    }
}
catch(Exception $e)
{
    echo 'Erreur: '  .$e->getMessage();
}