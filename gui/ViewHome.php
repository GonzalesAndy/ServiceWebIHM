<?php
namespace gui;

include_once "View.php";

class ViewHome extends View
{
    public function __construct($layout)
    {
        parent::__construct($layout);

        $this->title = 'Exemple Annonces Basic PHP: Connexion';

        $this->content = '<main><h1 class=mainTitle>Liste de nos produits</h1>';
        $this->content .= '
                <div class="product-list">
                    <div class="product">
                        <img src="/gui/img/quest2.png" alt="Image du produit">
                        <h3>Meta Quest 2</h3>
                        <p>Casque de réalité virtuelle meta quest 2 256gb</p>
                        <p class=prix>479.99<span style="position:relative; top:-0.50em;font-size: 18px;">€</p>
                    </div>
                    <!-- Répétez la div "product" pour chaque produit que vous souhaitez afficher -->
                </div>';
        $this->content .= '</main>';
    }
}