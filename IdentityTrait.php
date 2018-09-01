<?php

/**
 * Trait IdentityTrait
 */
trait IdentityTrait {

  /**
   * @return string
   */
  public function generateID(): string {
    return uniqid();
  }
}