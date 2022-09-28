<?php

function getPrice($price)
{
    $devise = ' FCFA';
    if ($price > 900) {
        $price = floatval($price);
        return number_format($price, 2, '.', ' ') . $devise;
    }
    return number_format($price, 0) . $devise;
}

function subTotal($price, $qty)
{
    if ($qty > 1) {
        $total = $price * $qty;

        return($total);
    }
    return ($price);
}

function getQty($qty)
{
    if ($qty > 1) {
        return $qty;
    }
    return 1;
}
