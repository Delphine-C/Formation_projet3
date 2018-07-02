<?php
/**
 * Created by PhpStorm.
 * User: Delphine_Corneil
 * Date: 02/07/2018
 * Time: 16:19
 */
require_once ('controller/ChaptersController.php');
require_once ('controller/CommentsController.php');
require_once ('controller/UsersController.php');
require_once ('controller/PagesController.php');

class Router
{
    private $_request;
    private $_routes=[
        'accueil'=>['controller'=>'ChaptersController','method'=>'home'],
        'chapitre'=>['controller'=>'ChaptersController','method'=>'readChapter'],
        'chapitres'=>['controller'=>'ChaptersController','method'=>'listChapters'],
        'rediger-un-chapitre'=>['controller'=>'ChaptersController','method'=>'addChapter'],
        'nouveau-chapitre-enregistre'=>['controller'=>'ChaptersControllers','method'=>'writeChapter'],
        'modifier-un-chapitre'=>['controller'=>'ChaptersController','method'=>'modifyChapter'],
        'modifier-le-chapitre'=>['controller'=>'ChaptersController','method'=>'updateChapter'],
        'chapitre-modifie'=>['controller'=>'ChaptersController','method'=>'chapterModified'],
        'supprimer-chapitre'=>['controller'=>'ChaptersController','method'=>'deleteChapter'],
        'nouveau-commentaire'=>['controller'=>'CommentsController','method'=>'addComment'],
        'commentaire-signale'=>['controller'=>'CommentsController','method'=>'reportComment'],
        'moderer-les-commentaires'=>['controller'=>'CommentsController','method'=>'moderate'],
        'commentaire-valide'=>['controller'=>'CommentsController','method'=>'validComment'],
        'commentaire-supprime'=>['controller'=>'CommentsController','method'=>'deleteComment'],
        'tableau-de-bord'=>['controller'=>'UsersController','method'=>'getdashboard'],
        'changer-mot-de-passe'=>['controller'=>'UsersController','method'=>'changePassword'],
        'mot-de-passe-modifie'=>['controller'=>'UsersController','method'=>'passwordModified'],
        'se-connecter'=>['controller'=>'UsersController','method'=>'getConnect'],
        'connexion'=>['controller'=>'UsersController','method'=>'testConnect'],
        'deconnexion'=>['controller'=>'UsersController','method'=>'deconnect'],
        'contact'=>['controller'=>'UsersController','method'=>'contact'],
        'a-propos'=>['controller'=>'PagesController','method'=>'about'],
    ];

    public function __construct($request)
    {
        $this->_request=$request;
    }

    public function findController()
    {
        $request=$this->_request;
        if(key_exists($request,$this->_routes)){
            $controller=$this->_routes[$request]['controller'];
            $method=$this->_routes[$request]['method'];

            $needController=new $controller;
            $needController->$method();
        }
        else{
            require ('view/error404.php');
        }
    }
}