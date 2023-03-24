<?php
include 'Product.php';

class Furniture extends Product
{
  private $product;
  public function __construct($product)
  {
    $this->product = $product;
  }
  public function getProduct()
  {
    return $this->product;
  }

  public function getFormatedAttributes()
  {
    $unserialized = $this->unserializeAttribute($this->getProduct());
    $attr = $unserialized['attribute'];
    $unserialized['attribute'] = 'Dimension: ' . $attr[0] . 'x' . $attr[1] . 'x' . $attr[2];
    return $unserialized;
  }
}
