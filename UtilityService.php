<?php

/**
 * Class UtilityService
 */
class UtilityService extends Service {
  use PriceUtilities, TaxTools {
    TaxTools::calculateTax insteadof PriceUtilities;
    PriceUtilities::calculateTax as basicTax;
    PriceUtilities::getTaxRate as private;
  }

  /**
   * @var float
   */
  private $price;

  /**
   * UtilityService constructor.
   *
   * @param float $price
   */
  public function __construct(float $price) {
    $this->price = $price;
  }

  /**
   * @return float
   */
  public function getTaxRate(): float {
    return 17;
  }

  public function getFinanPrice(): float {
    return ($this->price + $this->basicTax($this->price));
  }
}

$u = new UtilityService();
print $u::basicTax(10);