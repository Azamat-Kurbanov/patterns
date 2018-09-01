<?php

class ShopProduct implements Chargeable, IdentityObject {

  use PriceUtilities, IdentityTrait;

  /**
   * @var string
   */
  private $title;

  /**
   * @var string
   */
  private $producerFirstName;

  /**
   * @var string
   */
  private $producerMainName;

  /**
   * @var int
   */
  protected $price;

  /**
   * @var int
   */
  private $discount = 0;

  /**
   * ShopProduct constructor.
   *
   * @param string $title
   * @param string $firstName
   * @param string $mainName
   * @param int $price
   */
  public function __construct(string $title, string $firstName, string $mainName, int $price) {
    $this->title = $title;
    $this->producerFirstName = $firstName;
    $this->producerMainName = $mainName;
    $this->price = $price;
  }

  /**
   * @return string
   */
  public function getProducerFirstName(): string {
    return $this->producerFirstName;
  }

  /**
   * @return string
   */
  public function getProducerMainName(): string {
    return $this->producerMainName;
  }

  /**
   * @param int $num
   */
  public function setDiscount(int $num) {
    $this->discount = $num;
  }

  /**
   * @return string
   */
  public function getTitle(): string {
    return $this->title;
  }

  /**
   * @return float
   */
  public function getPrice(): float {
    return $this->price - $this->discount;
  }

  /**
   * @return string
   */
  public function getProducer(): string {
    return $this->producerFirstName . " " . $this->producerMainName;
  }

  /**
   * @return string
   */
  public function getSummaryLine(): string {
    $base = "{$this->title} ({$this->producerMainName}, ";
    $base .= "{$this->producerFirstName})";
    return $base;
  }

  /**
   * @return float
   */
  public function getTaxRate(): float {
    return 18;
  }
}

$p = new ShopProduct();
$p->calculateTax(100);
$p->generateID();