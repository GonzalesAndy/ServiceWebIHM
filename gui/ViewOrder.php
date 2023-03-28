<?php
namespace gui;

include_once "View.php";

class ViewOrder extends View
{
    public function __construct($layout)
    {
        parent::__construct($layout);

        $this->title = 'Exemple Annonces Basic PHP: Connexion';
        
        $this->content = '
        <main>
            <div class="container-order">
                <h1>Finalisation de commande</h1>
                    <div class="form-container">
                    <form id="checkout-form">
                        <h2>Adresse de livraison</h2>
                        <label for="full-name">Nom complet :</label>
                        <input type="text" id="full-name" name="full-name" required>
                        
                        <label for="address">Adresse :</label>
                        <input type="text" id="address" name="address" required>
                        
                        <label for="city">Ville :</label>
                        <input type="text" id="city" name="city" required>
                        
                        <label for="postal-code">Code postal :</label>
                        <input type="text" id="postal-code" name="postal-code" required>
                        
                        <label for="country">Pays :</label>
                        <input type="text" id="country" name="country" required>
                        
                        <h2>Informations de paiement</h2>
                        <label for="card-number">Numéro de carte :</label>
                        <input type="text" id="card-number" name="card-number" required>
                        
                        <label for="expiry-date">Date d\'expiration :</label>
                        <input type="month" id="expiry-date" name="expiry-date" required>
                        
                        <label for="cvv">Code de sécurité (CVV) :</label>
                        <input type="text" id="cvv" name="cvv" required>
                        
                        <button type="submit" id="submit-btn">Valider la commande</button>
                    </form>
                </div>
            </div>
        </main>
            ';
    }
}