<?php
/**
 * Created by c5game.com
 * User: douma
 * Date: 2018/5/31
 * Time: 11:29
 */

return  [
    'enablePrettyUrl' => true,
    'showScriptName' => false,
//    'suffix' => '.html',
    'rules'  => [
        '<module:\w+>/<controller:\w+>' => '/<module>/<controller>/index',
    ]
];