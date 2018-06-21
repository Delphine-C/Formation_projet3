<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 18/06/2018
 * Time: 13:44
 */
require_once ('Hydrator.php');

class User extends Hydrator
{
    private $_id;
    private $_username;
    private $_password;

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
    public function username()
    {
        return $this->_username;
    }

    /**
     * @return mixed
     */
    public function password()
    {
        return $this->_password;
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
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->_username = $username;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->_password = $password;
    }
}