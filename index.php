<?php
require_once './env.php';
//import de l'autoloader des classes
require_once './autoload.php';

use App\Controller\HomeController;
use App\Controller\RolesController;
use App\Controller\CategorieController;


$homeController = new HomeController();
$rolesControler = new RolesController();
$categorieControler = new CategorieController();


//utilisation de session_start(pour gérer la connexion au serveur)
session_start();
//Analyse de l'URL avec parse_url() et retourne ses composants
$url = parse_url($_SERVER['REQUEST_URI']);
//test si l'url posséde une route sinon on renvoi à la racine
$path = isset($url['path']) ? $url['path'] : '/';
//routeur
switch ($path) {
        //Accueil
    case '/OPENCLASSROOM/':
        $homeController->getHome();
        break;

        //Roles
    case '/OPENCLASSROOM/api/role/add':
        $rolesControler->addRole();
        break;

    case '/OPENCLASSROOM/api/roles/':
        $rolesControler->findRoleById();
        break;

    case '/OPENCLASSROOM/api/roles/all':
        $rolesControler->findAllRole();
        break;

    case '/OPENCLASSROOM/api/roles/update':
        $rolesControler->updateRole();
        break;

        //Categorie
    case '/OPENCLASSROOM/api/categorie/add':
        $categorieControler->addCategorie();
        break;

    case '/OPENCLASSROOM/api/categorie/':
        $categorieControler->findCategorieById();
        break;

    case '/OPENCLASSROOM/api/categorie/all':
        $categorieControler->findAllCategorie();
        break;

    case '/OPENCLASSROOM/api/categorie/update':
        $categorieControler->updateCategorie();
        break;

    default:
        $homeController->get404();
        break;
}
