<?php

namespace popp\ch04\batch11;


class XmlException extends \Exception {

  /**
   * @var \LibXMLError
   */
  private $error;

  /**
   * XmlException constructor.
   *
   * @param \LibXMLError $error
   */
  public function __construct(\LibXMLError $error) {
    $shortfile = basename($error->file);
    $msg = "[{$shortfile}, line {$error->line}, col {$error->column}] {$error->message}";
    $this->error = $error;
    parent::__construct($msg, $error->code);
  }

  /**
   * @return \LibXMLError
   */
  public function getLibXmlError() {
    return $this->error;
  }
}