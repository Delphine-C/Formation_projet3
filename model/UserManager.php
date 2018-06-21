<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 18/06/2018
 * Time: 13:44
 */
require_once ('PDO_Manager.php');

class UserManager extends PDO_Manager
{


    public function passwordisgood(User $user)
    {

        $db=parent::dbConnect();
        $request=$db->prepare('SELECT * FROM users WHERE username=:username AND password=:password');
        $request->execute(['username'=>$user->username(),':password'=>$user->password()]);

        $donnees=$request->fetch(PDO::FETCH_ASSOC);
        return new User($donnees);
    }

    public function changePassword($password)
    {
        $db=parent::dbConnect();
        $request=$db->prepare('UPDATE users SET password=:password WHERE id=:id');
        $request->execute([':password'=>password_hash($password,PASSWORD_DEFAULT),':id'=>1]);
    }
}