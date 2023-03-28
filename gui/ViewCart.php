<?php
namespace gui;

include_once "View.php";

class ViewCart extends View
{
    public function __construct($layout)
    {
        parent::__construct($layout);

        $this->title = 'Exemple Annonces Basic PHP: Connexion';
        
        $this->content = '
        <main>
        <div class="cart-container">
            <h2>Votre panier</h2>
            <div class="cart-item">
                <img src="/gui/img/quest2.png" alt="Image du produit">
                <div class="cart-item-info">
                    <div class="flex">
                        <h3>Titre du produit</h3>
                        <button>Supprimer</button>
                    </div>
                    <p>Prix: 00,00 €</p>
                    <label for="quantity">Quantité:</label>
                    <input type="number" id="quantity" min="1" value="1">
                </div>
            </div>
            <!-- Répétez la div "cart-item" pour chaque produit dans le panier -->
            <div class="cart-summary">
                <h3>Total (0 article): 00,00 €</h3>
                <a href="/order"><button>Passer à la caisse</button></a>
            </div>
        </div>
    </main>
            ';
    }
}

