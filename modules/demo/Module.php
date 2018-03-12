<?php
/**
 * Created by tongsq.
 * Date: 2018/3/10
 * Time: 17:19
 */
namespace app\modules\demo;

class Module extends \yii\base\Module
{
    public function init()
    {
        parent::init();

        $this->params['name'] = 'demo';
        \Yii::configure($this, require(__DIR__ . '/config.php'));
    }
}