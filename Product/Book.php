<?php

class Book extends Product
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
    $unserialized['attribute'] = 'Weight: ' . $attr[0] . 'KG';
    return $unserialized;
  }
}
