<?php

// charge et initialise les bibliothèques globales
include_once 'data/ApiProductAccess.php';
include_once 'data/ApiUserCreation.php';
include_once 'data/ApiUserAccess.php';
include_once 'data/ApiCartCreation.php';
include_once 'data/ApiCartAccess.php';

include_once 'control/Controllers.php';
include_once 'control/Presenter.php';

include_once 'service/UserCreation.php';
include_once 'service/ProductChecking.php';
include_once 'service/UserChecking.php';
include_once 'service/CartCreation.php';
include_once 'service/CartChecking.php';

include_once 'gui/Layout.php';
include_once 'gui/ViewLogin.php';
include_once 'gui/ViewError.php';
include_once 'gui/ViewHome.php';
include_once 'gui/ViewCart.php';
include_once 'gui/ViewOrder.php';
include_once 'gui/ViewProduct.php';
include_once 'gui/ViewCreate.php';

use gui\{ViewLogin, ViewError, Layout, ViewHome, ViewCart, ViewOrder, ViewProduct, ViewCreate};
use control\{Controllers, Presenter};
use data\{ApiProductAccess, ApiUserCreation, ApiUserAccess, ApiCartCreation, ApiCartAccess};
use service\{UserCreation, ProductChecking, UserChecking, CartCreation, CartChecking};

$apiProduct = new ApiProductAccess();
$apiUserCreation = new ApiUserCreation();
$apiUserAccess = new ApiUserAccess();
$apiCartCreation = new ApiCartCreation();
$apiCartAccess = new ApiCartAccess();

$controller = new Controllers();
$productCheck = new ProductChecking();
$userCreation = new UserCreation() ;
$presenter = new Presenter($productCheck);
$userCheck = new UserChecking();
$cartCreation = new CartCreation();
$cartCheck = new CartChecking();

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

ini_set('session.gc_maxlifetime', 3600);
session_set_cookie_params(3600);
session_start();
if( !isset($_SESSION['login']) ) {

    // Si la page d'origine est le formulaire de connexion ou de création de compte
    if( isset($_POST['login']) && isset($_POST['password']) )
    {
        $resultLog = $controller->authenticateAction($_POST['login'], $_POST['password'], $apiUserAccess, $userCheck);
        if( $resultLog  == false){
            $_SESSION['error'] = 'Erreur d\'authentification';
            header('Location: /error');
        }
        // Enregistrement des informations de session après une authentification réussie
        else {
            $_SESSION['login'] = $_POST['login'] ;
            $_SESSION['id'] = $resultLog;
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
elseif ('/creation' == $uri) {
    if (($resultat = $controller->createUserAction($apiUserCreation, $userCreation, $_GET['mail'], $_GET['login'], $_GET['password'])) == false) {
        $_SESSION['error'] = 'Erreur lors de la création du compte, username pris.';
        header('Location: /error');
    }
    else {
        header('Location: /seConnecter');
    }

}
elseif ('/seConnecter' == $uri) {
    $vueLogin = new ViewLogin( $layout );

    $vueLogin->display();
}
elseif ('/creerCompte' == $uri) {
    $viewCreate = new ViewCreate( $layout );

    $viewCreate->display();
}

//page de produit avec id
elseif (preg_match('/\/product\/[0-9]+/', $uri)) {
    $id = explode('/', $uri)[2];
    $controller->productPageAction($apiProduct, $productCheck, $id);
    $viewProduct = new ViewProduct( $layout, $presenter, $id);

    $viewProduct->display();
}
elseif (preg_match('/\/product\/add\/[0-9]+/', $uri)) {
    $idProduct = explode('/', $uri)[3];
    $controller->addToCartAction($apiCartCreation, $cartCreation, $idProduct, $_SESSION['id']);
    header("Location: /product/".$idProduct);
}
elseif (preg_match('/\/product\/remove\/[0-9]+/', $uri)) {
    $idProduct = explode('/', $uri)[3];
    $controller->removeFromCartAction($apiCartCreation, $cartCreation, $idProduct, $_SESSION['id']);
    header("Location: /cart");
}
elseif('/cart' == $uri){
    if (!isset($_SESSION['login'])) {
        var_dump($_SESSION['login']);
        $_SESSION['error']='Vous devez être connecté pour accéder à votre panier';
        $redirect = '/';
        header('Location: /error');
    }
    $controller->cartPageAction($apiProduct,$apiCartAccess,$productCheck,$cartCheck,$_SESSION['id']);
    $viewCart = new ViewCart( $layout, $presenter );

    $viewCart->display();
}
elseif('/order' == $uri && isset($_SESSION['login'])) {
    $vueOrder = new ViewOrder( $layout );
    $vueOrder->display();
}
elseif ( '/error' == $uri ){
    $vueError = new ViewError( $layout, $_SESSION['error'], $redirect );
    $vueError->display();
}
else {
    header('Status: 404 Not Found');
    echo '<html><body><h1>My Page NotFound</h1></body></html>';
}

?>
