<?php
/**
 * Created by tongsq.
 * Date: 2018/3/10
 * Time: 14:10
 */
namespace app\components;
use yii\base\Action;

class HelloWorldAction extends Action
{
    public $name;
    public function run()
    {
        return "Hello {$this->name}";
    }
}