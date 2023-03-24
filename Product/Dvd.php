<?php

class Dvd extends Product
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
    $unserialized['attribute'] = 'Size: ' . $attr[0] . ' MB';
    return $unserialized;
  }
}
