<?php
/**
 * Created by c5game.com
 * User: douma
 * Date: 2018/5/31
 * Time: 11:29
 */

return  [
    'hasMatch' => function($str, $reg) {
        preg_match($reg, $str, $matches);
        return count($matches);
        // return $reg;
    },
    'price' => function($value) {
        return number_format($value / 100, 2, '.', ',');
    }
];