<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 21/06/2018
 * Time: 09:22
 */
require_once('model/entities/User.php');
require_once('model/UserManager.php');

function getConnect()
{
    require ('view/frontend/formaccessView.php');
}

function testConnect()
{
    $user=new User(['username'=>$_POST['username'],'password'=>$_POST['password']]);
    $userManager=new UserManager();
    $testuser=$userManager->passwordisgood($user);
    $testpassword=$testuser->passwordisgood();

    $commentManager=new CommentManager();
    $count=$commentManager->countReported();

    $_SESSION['user']=$user;

    require('view/backend/adminView.php');
}

function deconnect()
{
    session_destroy();
    unset($_SESSION);
}

function getdashboard()
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

function changePassword()
{
    require ('view/backend/formpasswordView.php');
}

function passwordModified($password)
{
    $userManager=new UserManager();
    $userManager->changePassword($password);

    header('Location: index.php?dashboard');
}