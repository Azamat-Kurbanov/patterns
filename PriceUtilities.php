<?php

/**
 * Trait PriceUtilities
 */
trait PriceUtilities {

  /**
   * @var int
   */
  private static $taxrate = 17;

  /**
   * @param float $price
   *
   * @return float
   */
  public static function calculateTax(float $price): float {
    return ((self::$taxrate/100) * $price);
  }

  /**
   * @return float
   */
  abstract function getTaxRate(): float ;
}