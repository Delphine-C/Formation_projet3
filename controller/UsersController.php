<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 21/06/2018
 * Time: 09:22
 */
require_once('model/entities/User.php');
require_once('model/UserManager.php');

class UsersController
{
    public function getConnect()
    {
        require ('view/frontend/formaccessView.php');
    }

    public function testConnect()
    {
        $user=new User(['username'=>$_POST['username'],'password'=>$_POST['password']]);
        $userManager=new UserManager();
        $testpassword=$userManager->passwordisgood($user);

        if(isset($testpassword) && $testpassword==2){
            $commentManager=new CommentManager();
            $count=$commentManager->countReported();

            $_SESSION['user']=$user;
        }

        require('view/backend/adminView.php');
    }

    public function deconnect()
    {
        session_destroy();
        unset($_SESSION);

        header('Location: accueil');
    }

    public function getdashboard()
    {
        if(isset($_SESSION['user'])){
            $commentManager=new CommentManager();
            $count=$commentManager->countReported();

            require ('view/backend/adminView.php');
        }
        else{
            require ('view/error404.php');
        }
    }

    public function changePassword()
    {
        require ('view/backend/formpasswordView.php');
    }

    public function passwordModified()
    {
        $userManager=new UserManager();
        $userManager->changePassword($_POST['password']);

        header('Location: tableau-de-bord');
    }

    public function contact()
    {
        require ('view/frontend/contact.php');
    }

    public function sendEmail()
    {
        $to='corneil.delphine@gmail.com';
        $subject=$_POST['title'];
        $message=$_POST['message'];
        $headers='De la part de : '.$_POST['firstname'].' '.$_POST['name'].' <'.$_POST['mail'].'>';

        if(mail($to,$subject,$message,$headers)){
            require ('view/frontend/contact.php');
        }
        else{
            echo 'Le mail n\'a pu être envoyé. Veuillez réessayer.';
        }
    }
}



