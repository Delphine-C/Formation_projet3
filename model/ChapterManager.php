<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 18/06/2018
 * Time: 11:58
 */
require_once ('PDO_Manager.php');

class ChapterManager extends PDO_Manager
{
    public function getList()
    {
        $db=parent::dbConnect();
        $request=$db->query('SELECT id,author,title,num,DATE_FORMAT(datepost,\'%d/%m/%Y à %H:%i:%s\') AS datepost_fr FROM chapters ORDER BY num');

        return $request;
    }

    public function getChapter($id)
    {
        $db=parent::dbConnect();
        $request=$db->prepare('SELECT * FROM chapters WHERE id=:id');
        $request->execute([':id'=>$id]);

        $donnees=$request->fetch(PDO::FETCH_ASSOC);
        return new Chapter($donnees);
    }

    public function add(Chapter $chapter)
    {
        $db=parent::dbConnect();
        $request=$db->prepare('INSERT INTO chapters (author,title,num,content,datepost) VALUES (:author,:title,:num,:content,NOW())');
        $request->bindValue(':author',$chapter->author());
        $request->bindValue(':title',$chapter->title());
        $request->bindValue(':num',$chapter->num());
        $request->bindValue(':content',$chapter->content());
        $request->execute();
    }
}