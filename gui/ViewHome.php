<?php
namespace gui;

include_once "View.php";
//Interface graphique de la page d'accueil
class ViewHome extends View
{
    public function __construct($layout, $presenter)
    {
        parent::__construct($layout);

        $this->title = 'Exemple Annonces Basic PHP: Connexion';

        $this->content = '<main><h1 class=mainTitle>Liste de nos produits</h1>';
        $this->content .= '
                <div class="product-list">
                    ' . $presenter->getAllProductsHTML() . '
                    <!-- Répétez la div "product" pour chaque produit que vous souhaitez afficher -->
                </div>';

        $this->content .= '</main>';
    }
}