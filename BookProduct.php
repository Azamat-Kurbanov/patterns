<?php

class BookProduct extends ShopProduct {

  /**
   * @var int
   */
  private $numPages;

  /**
   * BookProduct constructor.
   *
   * @param string $title
   * @param string $firstName
   * @param string $mainName
   * @param int $price
   * @param int $numPages
   */
  public function __construct(string $title, string $firstName, string $mainName, int $price, int $numPages) {
    parent::__construct($title, $firstName, $mainName, $price);
    $this->numPages = $numPages;
  }

  /**
   * @return int
   */
  public function getNumberOfPages(): int {
    return $this->numPages;
  }

  /**
   * @return string
   */
  public function getSummaryLine(): string {
    $base = parent::getSummaryLine();
    $base .= ": page count - {$this->numPages}";

    return $base;
  }

  /**
   * @return float
   */
  public function getPrice(): float {
    return $this->price;
  }
}