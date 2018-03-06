<?php
/**
 * Created by tongsq.
 * Date: 2018/3/6
 * Time: 15:06
 */
namespace app\controllers;

use yii\web\Controller;

class IndexController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}