<?php
/**
 * Created by tongsq.
 * Date: 2018/3/12
 * Time: 16:46
 */
namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;

class HelloWidget extends Widget
{
    public $msg;

    public function init()
    {
        parent::init();
        if ($this->msg === null) {
            $this->msg = 'Hello World';
        }
    }

    public function run()
    {
        return Html::encode($this->msg);
    }
}