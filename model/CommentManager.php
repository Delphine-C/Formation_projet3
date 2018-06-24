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

    public function getComments($idChapter)
    {
        $db=parent::dbConnect();
        $request=$db->query('SELECT id,author,content,DATE_FORMAT(datepost,\'%d/%m/%Y à %H:%i:%s\') AS datepost_fr FROM comments WHERE chapterid='.$idChapter.' ORDER BY datepost');

        return $request;
    }

    public function getCommentsReported()
    {
        $db=parent::dbConnect();
        $request=$db->query('SELECT id,author,content,DATE_FORMAT(datepost,\'%d/%m/%Y à %H:%i:%s\') AS datepost_fr FROM comments WHERE reported=1 ORDER BY datepost');

        return $request;
    }

    public function getCommentsUnreported()
    {
        $db=parent::dbConnect();
        $request=$db->query('SELECT id,author,content,DATE_FORMAT(datepost,\'%d/%m/%Y à %H:%i:%s\') AS datepost_fr FROM comments WHERE reported=0 ORDER BY datepost');

        return $request;
    }

    public function reportComment($id)
    {
        $db=parent::dbConnect();
        $db->exec('UPDATE comments SET reported=1 WHERE id='.$id);
    }

    public function countReported()
    {
        $db=parent::dbConnect();
        $request=$db->query('SELECT COUNT(*) FROM comments WHERE reported=1')
        ;

        return $request->fetchColumn();
    }

    public function countUnreported()
    {
        $db=parent::dbConnect();
        $request=$db->query('SELECT COUNT(*) FROM comments WHERE reported=0');

        return $request->fetchColumn();
    }

    public function validComment($id)
    {
        $db=parent::dbConnect();
        $db->exec('UPDATE comments SET reported=0 WHERE id='.$id);
    }

    public function deleteComment($id)
    {
        $db=parent::dbConnect();
        $db->exec('DELETE FROM comments WHERE id='.$id);
    }
}