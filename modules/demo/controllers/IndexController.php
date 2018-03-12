<?php
/**
 * Created by tongsq.
 * Date: 2018/3/10
 * Time: 17:27
 */
namespace app\modules\demo\controllers;
use yii\web\Controller;
use Yii;
use yii\filters\AccessControl;
class IndexController extends Controller
{
    public function behaviors()
    {
        return [
            'timefilter' => [
                'class' => 'app\components\ActionTimeFilter',
                'only' => ['filter'],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['access'],
                'rules' => [
                    [
                        'actions' => ['access'],
                        'allow' => true,
                        //'roles' => ['@'],
                        'roles' => ['?'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        echo "demo module index";
        $module = \app\modules\demo\Module::getInstance();
        $module1 = \Yii::$app->getModule('demo');
        $module2 = \Yii::$app->controller->module;
        var_dump($module === $module1);
        var_dump($module === $module2);
        var_dump(\Yii::$app->controller);
    }

    public function actionShowRoute()
    {
        echo \Yii::$app->requestedRoute;

    }

    public function actionFilter()
    {
        //var_dump(Yii::$app->behaviors);
        echo "filter test";
        return "aaaaa";
    }

    public function actionAccess()
    {
        return "access filter test";
    }
}