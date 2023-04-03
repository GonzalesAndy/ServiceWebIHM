<?php
namespace control;
class Presenter
{
    protected $productCheck;

    public function __construct($productCheck)
    {
        $this->productCheck = $productCheck;
    }


    public function getAllProductsHTML() {
        $content = null;
        if ($this->productCheck->getProductsTxt() != null) {
            foreach ($this->productCheck->getProductsTxt() as $product) {
                $content .= "<div class='product'>
                                <img src='/gui/img/quest2.png' alt='Image du produit'>
                                <a href=/product/". $product['id'] ."><h3>" . $product['name'] . "</h3></a>
                                <p class=prix>" . $product['price'] . "<span style='position:relative; top:-0.50em;font-size: 18px;'>€</p>
                            </div>";
            }   
        }
        if ($content == null)
            $content = "<tr><td colspan='6'>Aucun produit trouvé</td></tr>";
        return $content;
    }

    public function getProductPageHTML() {
        $content = null;
        if ($this->productCheck->getProductsTxt() != null) {
            $product = $this->productCheck->getProductsTxt();
            $content .= "'<main><div class='productContainer'>
            <div class='singleProduct'>
              <div class='product-image'>
                <img src='/gui/img/quest2.png' alt='Image du produit' width='100%'>
              </div>
              <div class='product-details'>
                <h1 class='product-title'>". $product['name'] ."</h1>
                <p class='product-description'>
                  ". $product['description'] ."
                </p>
                <p class='product-price'>Prix: " . $product['price'] . "</p>
                <p class='product-stock'>Stock restant: " . $product['stock'] . "</p>
                <p class='product-unit'>Unité de mesure: ". $product['quantityType'] . "</p>
                <button class='add-to-cart-button'>Ajouter au panier</button>
              </div>
            </div>
          </div></main>';";
        }
        if ($content == null)
            $content = "<tr><td colspan='6'>Aucun produit trouvé</td></tr>";
        return $content;
    }
}