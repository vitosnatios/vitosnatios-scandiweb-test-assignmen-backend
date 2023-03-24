<?php

abstract class Product
{
  public function unserializeAttribute($value)
  {
    $value['attribute'] = unserialize($value['attribute']);
    return $value;
  }

  abstract function getFormatedAttributes();
}
