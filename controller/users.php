<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 21/06/2018
 * Time: 09:22
 */
require_once('model/User.php');
require_once('model/UserManager.php');

function getConnect()
{
    require ('view/frontend/formaccessView.php');
}

function testConnect()
{
    $user=new User(['username'=>$_POST['username'],'password'=>$_POST['password']]);
    $userManager=new UserManager();
    $testpassword=$userManager->passwordisgood($user);
    $commentManager=new CommentManager();
    $count=$commentManager->countReported();

    session_start();
    $_SESSION['user']=$user;

    require('view/backend/adminView.php');
}

function changePassword()
{
    require ('view/backend/formpasswordView.php');
}

function passwordModified($password)
{
    $userManager=new UserManager();
    $userManager->changePassword($password);

    require('view/backend/adminView.php');
}