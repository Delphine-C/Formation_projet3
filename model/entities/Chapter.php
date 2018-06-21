<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 18/06/2018
 * Time: 11:33
 */
require_once ('Hydrator.php');

class Chapter extends Hydrator
{
    private $_id;
    private $_author;
    private $_title;
    private $_num;
    private $_content;
    private $_datepost;

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
    public function author()
    {
        return $this->_author;
    }

    /**
     * @return mixed
     */
    public function title()
    {
        return $this->_title;
    }

    /**
     * @return mixed
     */
    public function num()
    {
        return $this->_num;
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

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->_id = $id;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->_author = $author;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->_title = $title;
    }

    /**
     * @param mixed $num
     */
    public function setNum($num)
    {
        $this->_num = $num;
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