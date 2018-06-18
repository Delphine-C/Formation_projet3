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
    const WRONG_USERNAME=1;
    const WRONG_PASSWORD=2;
    const SUCCESSFUL=3;

    public function passwordisgood(User $user)
    {

        $db=parent::dbConnect();

        $request1=$db->prepare('SELECT COUNT(*) FROM users WHERE username=:username');
        $request1->execute([':username'=>$user->username()]);
        $condUser= (bool) $request1->fetchColumn();

        $request2=$db->prepare('SELECT password FROM users WHERE username=:username');
        $request2->execute([':username'=>$user->username()]);
        $pw=$request2->fetch(PDO::FETCH_ASSOC);
        $condPassword=(bool) ($pw['password'] == $user->password());

        if($condUser){
            if($condPassword){
                return self::SUCCESSFUL;
            }
            else{
                return self::WRONG_PASSWORD;
            }
        }
        else{
            return self::WRONG_USERNAME;
        }
    }
}