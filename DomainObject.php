<?php

/**
 * Class DomainObject
 */
abstract class DomainObject {

  /**
   * @var string
   */
  private $group;

  /**
   * DomainObject constructor.
   */
  public function __construct() {
    $this->group = static::getGroup();
  }
  /**
   * @return \DomainObject
   */
  public static function create(): DomainObject {
    return new static();
  }

  /**
   * @return string
   */
  public static function getGroup(): string {
    return "default";
  }
}