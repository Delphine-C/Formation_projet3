<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 21/06/2018
 * Time: 09:22
 */
require_once ('model/CommentManager.php');
require_once ('model/entities/Comment.php');
require_once ('controller/ChaptersController.php');

class CommentsController
{
    public function addComment()
    {
            // Test recaptcha
        $secret = '6Lf1aGAUAAAAAAOeINC1KCntr_yyOcYqFyM1eWPl'; // votre clé privée
        $response = $_POST['g-recaptcha-response'];// Paramètre renvoyé par le recaptcha
        $remoteip = $_SERVER['REMOTE_ADDR'];// On récupère l'IP de l'utilisateur

        $api_url = "https://www.google.com/recaptcha/api/siteverify?secret="
        . $secret
        . "&response=" . $response
        . "&remoteip=" . $remoteip ;

        $decode = json_decode(file_get_contents($api_url), true);

        if ($decode['success'] == true) {
            $id=$_SESSION['arg'][1];
            $comment=new Comment(['chapterid'=>$id,'author'=>$_POST['pseudo'],'content'=>$_POST['content']]);
            $commentManager=new CommentManager();
            $commentManager->addComment($comment);
            $chapterManager=new ChapterManager();
            $chapter=$chapterManager->getChapter($id);
            $commentManager=new CommentManager();
            $listComments=$commentManager->getComments($id);

            if(is_null($chapter->id())){
            throw new Exception('Aucun identifiant de chapitre envoyé');
            }
            else{
                header('Location: chapitre.'.$chapter->id().'');
            }
        }
        else {
            echo 'Erreur: Bad robot !';
        }
    }

    public function reportComment()
    {
        $commentManager=new CommentManager();
        $comment=$commentManager->reportComment($_SESSION['arg'][1]);
        $chapters=new ChaptersController();
        $chapters->readChapter($comment->chapterid());
    }

    public function moderate()
    {
        $commentManager=new CommentManager();
        $reported=$commentManager->getCommentsReported();
        $countreported=$commentManager->countReported();
        $unreported=$commentManager->getCommentsUnreported();
        $countunreported=$commentManager->countUnreported();

        require ('view/backend/commentsReportedView.php');
    }

    public function validComment()
    {
        $id=$_SESSION['arg'][1];
        $commentManager=new CommentManager();
        $commentManager->validComment($id);

        $this->moderate();
    }

    public function deleteComment()
    {
        $id=$_SESSION['arg'][1];
        $commentManager=new CommentManager();
        $commentManager->deleteComment($id);

        $this->moderate();
    }
}