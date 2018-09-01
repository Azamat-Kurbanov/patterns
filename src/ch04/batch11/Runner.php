<?php
declare(strict_types=1);

namespace popp\ch04\batch11;

/**
 * Class Runner
 *
 * @package popp\ch04\batch11
 */
class Runner {

  /**
   * @throws \Exception
   */
  public static function run() {
    try {
      $conf = new Conf(__DIR__ . "/conf01.xml");
      print "user: " . $conf->get('user') . "\n";
      print "host: " . $conf->get('host') . "\n";
      $conf->set("pass", "newpass2");
      $conf->write();
    } catch (\Exception $e) {
      die($e->__toString());
    }

  }
}
