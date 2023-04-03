<?php

// charge et initialise les bibliothèques globales
include_once 'data/DataAccess.php';
include_once 'data/ApiProductAccess.php';

include_once 'control/Controllers.php';
include_once 'control/Presenter.php';

include_once 'service/AnnoncesChecking.php';
include_once 'service/UserCreation.php';
include_once 'service/ProductChecking.php';

include_once 'gui/Layout.php';
include_once 'gui/ViewLogin.php';
include_once 'gui/ViewError.php';
include_once 'gui/ViewHome.php';
include_once 'gui/ViewCart.php';
include_once 'gui/ViewOrder.php';
include_once 'gui/ViewProduct.php';

use gui\{ViewLogin, ViewError, Layout, ViewHome, ViewCart, ViewOrder, ViewProduct};
use control\{Controllers, Presenter};
use data\{DataAccess, ApiProductAccess};
use service\{UserCreation, ProductChecking, AnnoncesChecking};

$data = null;
try {
    $data = new DataAccess( new PDO('mysql:host=mysql-flouvat.alwaysdata.net;dbname=flouvat_annonces_db', 'flouvat_annonces', 'flouvat_annonces_mdp') );

} catch (PDOException $e) {
    print "Erreur de connexion !: " . $e->getMessage() . "<br/>";
    die();
}

$apiProduct = new ApiProductAccess();
$controller = new Controllers();
$productCheck = new ProductChecking();
$userCreation = new UserCreation() ;
$presenter = new Presenter($productCheck);
$annoncesCheck = new AnnoncesChecking();

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);
session_start();
if( !isset($_SESSION['login']) ) {

    // Si la page d'origine est le formulaire de connexion ou de création de compte
    if( isset($_POST['login']) && isset($_POST['password']) )
    {
        // Vérification de l'authentification si la précédente page était le formulaire de connexion
        
        if( !$controller->authenticateAction($_POST['login'], $_POST['password'], $data, $annoncesCheck) ){
            $error_msg='Mauvais login ou password';
            $redirect = '/annonces/index.php';
            $uri='/annonces/index.php/error' ;
        }
        // Enregistrement des informations de session après une authentification réussie
        else {
            $_SESSION['login'] = $_POST['login'] ;
            $login = $_SESSION['login'];
        }
    }
}
else
    // Récupération du login si l'utilisateur est déjà connecté
    $login = $_SESSION['login'] ;


if (isset($_SESSION['login']))
    $layout = new Layout("gui/layoutLogged.html",);
else
    $layout = new Layout("gui/layout.html");

if ( '/' == $uri || '/index.php' == $uri || '/logout' == $uri) {
    // affichage de la page de connexion

    if ($uri == '/logout') {
        session_destroy();
        $layout = new Layout("gui/layout.html" );
        header('Location: /');
    }

    $controller->productsAction($apiProduct, $productCheck);
    
    $viewHome = new ViewHome( $layout, $presenter);

    $viewHome->display();
}
elseif ('/seConnecter' == $uri) {
    $vueLogin = new ViewLogin( $layout );

    $vueLogin->display();
}
//page de produit avec id
elseif (preg_match('/\/product\/[0-9]+/', $uri)) {
    $id = explode('/', $uri)[2];
    $controller->productPageAction($apiProduct, $productCheck, $id);
    $viewProduct = new ViewProduct( $layout, $presenter, $id);

    $viewProduct->display();
}
elseif('/cart' == $uri && isset($_SESSION['login'])){
    if (!isset($_SESSION['login'])) {
        var_dump($_SESSION['login']);
        $error_msg='Vous devez être connecté pour accéder à votre panier';
        $redirect = '/';
        $uri='/error' ;
    }
    $viewCart = new ViewCart( $layout );

    $viewCart->display();
}
elseif('/order' == $uri && isset($_SESSION['login'])) {
    $vueOrder = new ViewOrder( $layout );
    $vueOrder->display();
}
elseif ( '/error' == $uri ){
    // Affichage d'un message d'erreur

    $vueError = new ViewError( $layout, $error_msg, $redirect );

    $vueError->display();
}
else {
    header('Status: 404 Not Found');
    echo '<html><body><h1>My Page NotFound</h1></body></html>';
}

?>
