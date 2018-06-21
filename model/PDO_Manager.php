<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 18/06/2018
 * Time: 11:59
 */

abstract class PDO_Manager
{
    public function dbConnect()
    {
        $db=new PDO ('mysql:host=localhost;dbname=blog_forteroche;charset=utf8','root','',array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        return $db;
    }
}