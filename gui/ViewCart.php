<?php
namespace gui;

include_once "View.php";
// Interface graphique de la page de panier
class ViewCart extends View
{
    public function __construct($layout, $presenter)
    {
        parent::__construct($layout);

        $this->title = 'Exemple Annonces Basic PHP: Connexion';
        
        $this->content = '
        <main>
        <div class="cart-container">
            <h2>Votre panier</h2>';
        
        $this->content .= $presenter->getCartPageHTML();
        $this->content .= '</div></main>';
    }
}

