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
                $content .= "<tr><td>" . $product['id'] . "</td><td>" . $product['name'] . "</td><td>" . $product['price'] . "</td><td>" . $product['description'] . "</td><td>" . $product['stock'] . "</td><td>" . $product['quantityType'] . "</td></tr>";
            }
        }
        if ($content == null)
            $content = "<tr><td colspan='6'>Aucun produit trouvé</td></tr>";
        return $content;
    }
}