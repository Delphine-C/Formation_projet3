<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 18/06/2018
 * Time: 11:47
 */
session_start();

require_once ('Router.php');

$_SESSION['arg']=explode(".",$_GET['r'],2);

$request= (!empty($_GET['r'])) ? $_SESSION['arg'][0] : 'accueil';

$router=new Router($request);
$router->findController();