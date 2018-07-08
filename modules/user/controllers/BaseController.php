<?php
/**
 * Created by c5game.com
 * User: tongsiqi@c5game.com
 * Date: 2018/7/7
 * Time: 20:30
 */

namespace app\modules\user\controllers;

use app\controllers\BasicController;

class BaseController extends BasicController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}