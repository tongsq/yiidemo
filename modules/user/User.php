<?php
/**
 * Created by tongsq.
 * Date: 2018/3/10
 * Time: 17:19
 */
namespace app\modules\user;

class User extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\user\controllers';

    public function init()
    {
        parent::init();

        $this->layout = "@app/views/layouts/main.twig";

        $this->params['name'] = 'user';

        \Yii::configure($this, require(__DIR__ . '/config.php'));


    }

}