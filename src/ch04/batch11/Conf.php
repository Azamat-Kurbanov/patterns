<?php
declare(strict_types=1);

namespace popp\ch04\batch11;

/* listing 04.57 */

/**
 * Class Conf
 *
 * @package popp\ch04\batch10
 */
class Conf {

  /**
   * @var string
   */
  private $file;

  /**
   * @var \SimpleXMLElement
   */
  private $xml;

  /**
   * @var
   */
  private $lastmatch;

  /**
   * Conf constructor.
   *
   * @param string $file
   *
   * @throws \Exception
   */
  public function __construct(string $file) {
    if (!file_exists($file))
      throw new \Exception("file '$file' doesn't exist");
    $this->file = $file;
    $this->xml = simplexml_load_file($file);
  }

  /**
   * write
   */
  public function write() {
    if (!is_writable($this->file))
      throw new \Exception("file '{$this->file}' isn't writable");
    file_put_contents($this->file, $this->xml->asXML());
  }

  /**
   * @param string $str
   *
   * @return null|string
   */
  public function get(string $str) {
    $matches = $this->xml->xpath("/conf/item[@name=\"x$str\"]");
    if (count($matches)) {
      $this->lastmatch = $matches[0];
      return (string) $matches[0];
    }
    return NULL;
  }

  /**
   * @param string $key
   * @param string $value
   */
  public function set(string $key, string $value) {
    if (!is_null($this->get($key))) {
      $this->lastmatch[0] = $value;
      return;
    }
    $conf = $this->xml->conf;
    $this->xml->addChild('item', $value)->addAttribute('name', $key);
  }
}
