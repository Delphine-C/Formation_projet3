<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 18/06/2018
 * Time: 14:50
 */
require_once ('PDO_Manager.php');

class CommentManager extends PDO_Manager
{
    public function addComment(Comment $comment)
    {
        $db=parent::dbConnect();
        $request=$db->prepare('INSERT INTO comments(chapterid,author,content,datepost) VALUES (:chapterid,:author,:content,NOW())');
        $request->bindValue(':chapterid',$comment->chapterid());
        $request->bindValue(':author',$comment->author());
        $request->bindValue(':content',$comment->content());
        $request->execute();
    }

    public function getComments($numChapter)
    {
        $db=parent::dbConnect();
        $request=$db->query('SELECT author,content,DATE_FORMAT(datepost,\'%d/%m/%Y à %H:%i:%s\') AS datepost_fr FROM comments WHERE chapterid='.$numChapter.' ORDER BY datepost');

        return $request;
    }
}