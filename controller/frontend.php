<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 18/06/2018
 * Time: 11:31
 */
require_once ('model/ChapterManager.php');
require_once ('model/Chapter.php');

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