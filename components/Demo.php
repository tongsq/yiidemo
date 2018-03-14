<?php
/**
 * Created by tongsq.
 * Date: 2018/3/14
 * Time: 10:02
 */
namespace app\components;
use yii\base\Object;

class Demo extends Object
{
    private $_name;
    //public $name;
    public function getName()
    {
        return $this->_name;
    }

    public function setName($name)
    {
        $this->_name = trim($name, 'a');
    }
}