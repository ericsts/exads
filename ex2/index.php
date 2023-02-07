<?php

$char1 = ',';
$char2 = '|';

$ascii1 = ord($char1);
$ascii2 = ord($char2);

$original = [];

for($i = $ascii1 ; $i <= $ascii2 ; $i++)    $original[] = chr($i);

$randomPos = rand(0, count($original));

$originalCopy = $original;

shuffle($originalCopy);

unset($originalCopy[$randomPos]);

$missing = array_diff($original, $originalCopy);

print "\n missing char is pos = $randomPos  char =" . current($missing);

