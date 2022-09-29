<?php

function getPrice($price)
{
    $price = str_replace(' ', '', $price);
    $devise = ' FCFA';
    if ($price > 900) {
        $price = intval($price);
        return number_format($price, 0, '.', ' ') . $devise;
    }
    return number_format($price, 0) . $devise;
}

function subTotal($price, $qty)
{
    if ($qty > 1) {
        $total = $price * $qty;

        return getPrice($total);
    }
    return getPrice($price);
}

function getQty($qty)
{
    if ($qty > 1) {
        return $qty;
    }
    return 1;
}
