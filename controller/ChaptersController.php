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

class ChaptersController
{
    public function home()
    {
        $chapterManager=new ChapterManager();
        $chapters=$chapterManager->listHome();

        require ('view/frontend/home.php');
    }

    public function listChapters()
    {
        $chapterManager=new ChapterManager();
        $listChapters=$chapterManager->getList();

        require('view/frontend/chaptersView.php');
    }

    public function readChapter($id=null)
    {
        if(is_null($id)){
            $id=$_SESSION['arg'][1];
        }

        $chapterManager=new ChapterManager();
        $chapter=$chapterManager->getChapter($id);
        $commentManager=new CommentManager();
        $listComments=$commentManager->getComments($id);

        if(is_null($chapter->id())){
            throw new Exception('Aucun identifiant de chapitre envoyé');
        }
        else{
            require('view/frontend/chapterView.php');
        }
    }

    public function addChapter()
    {
        require('view/backend/addChapterView.php');
    }

    public function writeChapter()
    {
        $chapter=new Chapter(['author'=>'Jean Forteroche','title'=>$_POST['title'],'num'=>$_POST['num'],'content'=>$_POST['chapter'],'datepost'=>date('Y-m-d H:i:s')]);
        $chapterManager=new ChapterManager($chapter);
        $chapterManager->add($chapter);

        header('Location: tableau-de-bord');
    }

    public function modifyChapter() // choose the chapter to modify or delete
    {
        $chapterManager=new ChapterManager();
        $listChapters=$chapterManager->getList();

        require('view/backend/chaptersView.php');
    }

    public function updateChapter() // make changes
    {
        $id=$_SESSION['arg'][1];
        $chapterManager=new ChapterManager();
        $chapter=$chapterManager->getChapter($id);

        if(is_null($chapter->id())){
            throw new Exception('Aucun identifiant de chapitre envoyé');
        }
        else{
            require('view/backend/updatechapterView.php');
        }
    }

    public function chapterModified() // save changes in the DB
    {
        $id=$_SESSION['arg'][1];
        $chapterManager=new ChapterManager();
        $chapter=$chapterManager->getChapter($id);
        $chapter->setNum($_POST['num']);
        $chapter->setTitle($_POST['title']);
        $chapter->setContent($_POST['chapter']);
        $chapterManager->update($chapter);

        header('Location: tableau-de-bord');
    }

    public function deleteChapter()
    {
        $id=$_SESSION['arg'][1];
        $chapterManager=new ChapterManager();
        $chapterManager->delete($id);

        header('Location: tableau-de-bord');;
    }
}




