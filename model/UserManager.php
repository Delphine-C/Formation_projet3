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
    const FAIL=1;
    const SUCCESS=2;

    public function passwordisgood(User $user)
    {
        $db=parent::dbConnect();
        $request=$db->prepare('SELECT * FROM users WHERE username=:username');
        $request->execute(['username'=>$user->username()]);

        if(password_verify($user->password(),$request->fetch(PDO::FETCH_ASSOC)['password'])){
            return self::SUCCESS;
        }
        else{
            return self::FAIL;
        }
    }

    public function changePassword($password)
    {
        $db=parent::dbConnect();
        $request=$db->prepare('UPDATE users SET password=:password WHERE id=:id');
        $request->execute([':password'=>password_hash($password,PASSWORD_DEFAULT),':id'=>1]);
    }
}