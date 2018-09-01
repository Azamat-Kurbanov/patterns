<?php

/**
 * Interface IdentityObject
 */
interface IdentityObject {

  /**
   * @return string
   */
  public function generateID(): string;
}