<?php
/**
 * Created by tongsq.
 * Date: 2018/3/7
 * Time: 9:36
 */
use yii\helpers\Html;
?>

<p>You have entered the following information:</p>

<ul>
    <li><label>Name</label>: <?= Html::encode($model->name) ?></li>
    <li><label>Email</label>: <?= Html::encode($model->email) ?></li>
</ul>

