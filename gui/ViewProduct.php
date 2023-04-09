<?php
namespace gui;

include_once "View.php";

// Interface graphique de la page de produit
class ViewProduct extends View
{
    public function __construct($layout, $presenter, $id)
    {
        parent::__construct($layout);

        $this->title = 'Exemple Annonces Basic PHP: Connexion';


        $this->content .= $presenter->getProductPageHTML();

    }
    
}