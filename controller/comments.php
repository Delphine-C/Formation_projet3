<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 21/06/2018
 * Time: 09:22
 */
require_once ('model/CommentManager.php');
require_once ('model/Comment.php');

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

function moderate()
{
    $commentManager=new CommentManager();
    $reported=$commentManager->getCommentsReported();
    $countreported=$commentManager->countReported();
    $unreported=$commentManager->getCommentsUnreported();
    $countunreported=$commentManager->countUnreported();


    require ('view/backend/commentsReportedView.php');
}

function validComment($id)
{
    $commentManager=new CommentManager();
    $commentManager->validComment($id);

    $commentManager=new CommentManager();
    $count=$commentManager->countReported();

    require('view/backend/adminView.php');
}

function deleteComment($id)
{
    $commentManager=new CommentManager();
    $commentManager->deleteComment($id);

    $commentManager=new CommentManager();
    $count=$commentManager->countReported();

    require('view/backend/adminView.php');
}