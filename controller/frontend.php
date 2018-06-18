<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 18/06/2018
 * Time: 11:31
 */
require_once ('model/ChapterManager.php');
require_once ('model/Chapter.php');
require_once('model/User.php');
require_once('model/UserManager.php');

// CHAPTERS
function listChapters()
{
    $chapterManager=new ChapterManager();
    $listChapters=$chapterManager->getList();

    require('view/frontend/chaptersView.php');
}

function readChapter($id)
{
    $chapterManager=new ChapterManager();
    $chapter=$chapterManager->getChapter($id);

    require('view/frontend/chapterView.php');
}

// ADMIN CONNEXION

function getConnect()
{
    require ('view/frontend/formaccessView.php');
}

function testConnect()
{
    $user=new User(['username'=>$_POST['username'],'password'=>$_POST['password']]);
    $userManager=new UserManager();
    $testpassword=$userManager->passwordisgood($user);
    session_start();
    $_SESSION['user']=$user;

    require('view/backend/adminView.php');

}