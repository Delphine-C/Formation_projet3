<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 21/06/2018
 * Time: 09:21
 */
require_once('model/entities/Chapter.php');
require_once ('model/ChapterManager.php');
require_once ('model/CommentManager.php');

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