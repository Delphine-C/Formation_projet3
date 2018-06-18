<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 18/06/2018
 * Time: 11:31
 */
require_once ('model/ChapterManager.php');

// CHAPTERS
function listChapters()
{
    $chapterManager=new ChapterManager();
    $listChapters=$chapterManager->getList();

    require('view/frontend/chaptersView.php');
}