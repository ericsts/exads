<?php

namespace Eric;

use Exads\ABTestData;

class MyABTest
{
  public function getData(int $promoId): array
  {
    $abTest = new ABTestData($promoId);
    $promotion = $abTest->getPromotionName();
    $designs = $abTest->getAllDesigns();

    // get the biggest splitPercent
    $max = max(array_map(function ($item) {
      return $item['splitPercent'];
    }, $designs));

    // filter design that have the biggest value on splitPercent
    $bestDesign = array_filter($designs, function ($item) use ($max) {
      return ($item['splitPercent'] == $max);
    });

    return reset($bestDesign);
  }

  public function getName(int $promoId): string
  {
    $abTest = new ABTestData($promoId);
    $promotion = $abTest->getPromotionName();
    return $promotion;
  }
}
