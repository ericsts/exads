<?php

for ($i = 1 ; $i <= 100 ; $i++)
{
    print "$i - ";
    print primeOrMultiples($i);
    print "\n";
}


function primeOrMultiples($num)
{
    $m = [];
    if ($num == 1)
        return '1';

    for ($i = 2; $i <= $num/2; $i++)
    {
        if ($num % $i == 0)
            $m[] = $i;
    }

    return count($m) ? implode(',', $m) : '[PRIME]';
}
