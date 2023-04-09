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
                <a href=/product/add/".$product['id']." ><button class='add-to-cart-button'>Ajouter au panier</button></a>
              </div>
            </div>
          </div></main>';";
        }
        if ($content == null)
            $content = "<tr><td colspan='6'>Aucun produit trouvé</td></tr>";
        return $content;
    }

    public function getCartPageHTML() {
      $content = null;
      $totalPrice= 0.0;
      $totalArticle= 0;
      if($this->productCheck->getProductsTxt() != null) {

        foreach ($this->productCheck->getProductsTxt() as $product) {

          $content .= '<div class="cart-item">
                <img src="/gui/img/quest2.png" alt="Image du produit">
                <div class="cart-item-info">
                    <div class="flex">
                        <a id="panierHref" href=/product/'.$product['id'].'><h3>'.$product['name'].'</h3></a>
                        <a href=/product/remove/'.$product['id'].'><button>Supprimer</button></a>
                    </div>
                    <p>Prix: '.$product['price'].' €</p>
                    <label for="quantity">Quantité:'.$product['quantity'].'</label>
                </div>
            </div>';
            $totalPrice += $product['price']*$product['quantity'];
            $totalArticle += $product['quantity'];
            
        }
      }
      $content .= '<div class="cart-summary">
                      <h3>Total ('.$totalArticle.' article) : '.$totalPrice.' €</h3>
                      <a href="/order"><button>Passer à la caisse</button></a>
                  </div>';

      return $content;
    }
}