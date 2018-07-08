<?php
/**
 * Created by c5game.com
 * User: douma
 * Date: 2018/5/31
 * Time: 11:29
 */

return  [
    't' => 'Yii::t',
    'chunk' => function ($array, $val) {
        return array_chunk($array, $val);
    },
    'currency' => function () {
        if (\Yii::$app->language == 'zh-CN') {
            return '¥';
        } 
        return '$';
    },
    'baseUrl' => function() {
        return \Yii::$app->request->baseUrl;
    }
];