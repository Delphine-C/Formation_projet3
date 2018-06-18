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