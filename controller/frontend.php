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
require_once ('model/CommentManager.php');
require_once ('model/Comment.php');

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
    $commentManager=new CommentManager();
    $listComments=$commentManager->getComments($id);

    require('view/frontend/chapterView.php');
}

// COMMENTS
function addComment($id)
{
    $comment=new Comment(['chapterid'=>$id,'author'=>$_POST['pseudo'],'content'=>$_POST['content']]);
    $commentManager=new CommentManager();
    $commentManager->addComment($comment);
    $chapterManager=new ChapterManager();
    $chapter=$chapterManager->getChapter($id);
    $commentManager=new CommentManager();
    $listComments=$commentManager->getComments($id);

    require ('view/frontend/chapterView.php');
}

function reportComment($id)
{
    $commentManager=new CommentManager();
    $commentManager->reportComment($id);
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
    $commentManager=new CommentManager();
    $count=$commentManager->countReported();

    session_start();
    $_SESSION['user']=$user;

    require('view/backend/adminView.php');
}