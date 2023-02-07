<?php

// Autoload files using Composer autoload
require_once __DIR__ . '/../vendor/autoload.php';

use Eric\MyABTest;

$AB = new MyABTest();

for($x=1; $x<=3; $x++){
  print("\nThe best convertion rate for the promotion {$AB->getName($x)} is:");
  $result = $AB->getData($x);
  print("\nName: {$result['designName']} whit {$result['splitPercent']}%");
  print("\n\n");
}
