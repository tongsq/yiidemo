<?php
/**
 * Created by tongsq.
 * Date: 2018/3/6
 * Time: 15:06
 */
namespace app\controllers;

use yii\web\Controller;
use app\models\index\EntryForm;

class IndexController extends Controller
{
    public function actionIndex()
    {
        echo "aa";
        return $this->render('index');
        echo "bb";
    }

    public function actionSay($msg = 'hello')
    {
        return $this->render('say', ['msg'=>$msg]);
    }

    public function actionEntry()
    {
        $model = new EntryForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            return $this->render('entry-confirm', ['model'=>$model]);
        } else {
            return $this->render('entry', ['model'=>$model]);
        }
    }
}