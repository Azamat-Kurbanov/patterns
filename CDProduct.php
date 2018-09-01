<?php

class CDProduct extends ShopProduct {

  /**
   * @var int
   */
  private $playLength = 0;

  /**
   * CDProduct constructor.
   *
   * @param string $title
   * @param string $firstName
   * @param string $mainName
   * @param int $price
   * @param int $playLength
   */
  public function __construct(string $title, string $firstName, string $mainName, int $price, int $playLength) {
    parent::__construct($title, $firstName, $mainName, $price);
    $this->playLength = $playLength;
  }

  /**
   * @return int
   */
  public function getPlayLength(): int {
    return $this->playLength;
  }

  public function getSummaryLine(): string {
    $base = parent::getSummaryLine();
    $base .= ": playing time - {$this->playLength}";
    return $base;
  }
}