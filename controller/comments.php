<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 21/06/2018
 * Time: 09:22
 */
require_once ('model/CommentManager.php');
require_once ('model/entities/Comment.php');

function addComment($id)
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
            require ('view/frontend/chapterView.php');
        }
    }
    else {
        echo 'Erreur: Bad robot !';
    }
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

    moderate();
}

function deleteComment($id)
{
    $commentManager=new CommentManager();
    $commentManager->deleteComment($id);

    moderate();
}