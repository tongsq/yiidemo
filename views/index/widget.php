<?php
/**
 * Created by tongsq.
 * Date: 2018/3/12
 * Time: 16:32
 */
use yii\jui\DatePicker;
use app\components\HelloWidget;
?>
<?= HelloWidget::widget(['msg' => 'hello']) ?>
<?= DatePicker::widget(['name' => 'date','language' => 'zh-CN', 'dateFormat' => 'php:Y-m-d']) ?>
