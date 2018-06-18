<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 18/06/2018
 * Time: 18:31
 */
require_once ('Hydrator.php');

class Comment extends Hydrator
{
    private $_id;
    private $_chapterid;
    private $_author;
    private $_content;
    private $_datepost;

    // GETTERS

    /**
     * @return mixed
     */
    public function id()
    {
        return $this->_id;
    }

    /**
     * @return mixed
     */
    public function chapterid()
    {
        return $this->_chapterid;
    }

    /**
     * @return mixed
     */
    public function author()
    {
        return $this->_author;
    }

    /**
     * @return mixed
     */
    public function content()
    {
        return $this->_content;
    }

    /**
     * @return mixed
     */
    public function datepost()
    {
        return $this->_datepost;
    }

    // SETTERS

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->_id = $id;
    }

    /**
     * @param mixed $chapterid
     */
    public function setChapterid($chapterid)
    {
        $this->_chapterid = $chapterid;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->_author = $author;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->_content = $content;
    }

    /**
     * @param mixed $datepost
     */
    public function setDatepost($datepost)
    {
        $this->_datepost = $datepost;
    }
}