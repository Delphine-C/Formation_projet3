<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 18/06/2018
 * Time: 11:55
 */
require_once('model/Chapter.php');
require_once('model/ChapterManager.php');

// CHAPTERS

function addChapter()
{
    require('view/backend/addChapterView.php');
}

function writeChapter()
{
    $chapter=new Chapter(['author'=>'Jean Forteroche','title'=>$_POST['title'],'num'=>$_POST['num'],'content'=>$_POST['chapter'],'datepost'=>date('Y-m-d H:i:s')]);
    $chapterManager=new ChapterManager($chapter);
    $chapterManager->add($chapter);
}

function modifyChapter() // choose the chapter to modify or delete
{
    $chapterManager=new ChapterManager();
    $listChapters=$chapterManager->getList();

    require('view/backend/chaptersView.php');
}

function updateChapter($id) // make changes
{
    $chapterManager=new ChapterManager();
    $chapter=$chapterManager->getChapter($id);

    require('view/backend/updatechapterView.php');
}

function chapterModified($id) // save changes in the DB
{
    $chapterManager=new ChapterManager();
    $chapter=$chapterManager->getChapter($id);
    $chapter->setNum($_POST['num']);
    $chapter->setTitle($_POST['title']);
    $chapter->setContent($_POST['chapter']);
    $chapterManager->update($chapter);

    require('view/backend/adminView.php');
}

function deleteChapter($id)
{
    $chapterManager=new ChapterManager();
    $chapterManager->delete($id);

    require('view/backend/adminView.php');
}

// COMMENTS

function moderate()
{
    $commentManager=new CommentManager();
    $reported=$commentManager->getCommentsReported();

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

// ACCOUNT
function changePassword()
{
    require ('view/backend/formpasswordView.php');
}

function passwordModified($password)
{
    $userManager=new UserManager();
    $userManager->changePassword($password);

    require('view/backend/adminView.php');
}
