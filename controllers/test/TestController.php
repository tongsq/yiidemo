<?php
/**
 * Created by tongsq.
 * Date: 2018/3/6
 * Time: 14:56
 */
namespace app\controllers\test;
use \yii\web\Controller;

class TestController extends Controller{

    public function actionTest(){
        echo "/test/test/test\n";
    }
    public function actionIndex(){
        echo "/test/test/index\n";
        return $this->render('index');
    }
}