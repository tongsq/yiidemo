<?php
/**
 * Created by tongsq.
 * Date: 2018/3/6
 * Time: 15:06
 */
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\index\EntryForm;
use app\models\index\Country;
use yii\data\Pagination;
use yii\helpers\Url;

class IndexController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => '\yii\web\ErrorAction',
            ],
            'hello' => [
                'class' => 'app\components\HelloWorldAction',
                'name' => 'World',
            ]
        ];
    }

    public function actionIndex()
    {
        //return $this->render('index');
        echo "hello yiidemo";
        $db = Yii::$app->db;
        $transaction = $db->beginTransaction();
        $command = $db->createCommand('select * from country limit 2');
        $data = $command->queryAll();
        //$command = $db->createCommand('update country set name=:name where code=:code',[':name'=>'aaa', ':code'=>'aa']);
        $command = $db->createCommand('update country set population=:population where name=:name',[':name'=>'aaa', ':population'=>10086]);
        var_dump($command->execute());

        $transaction->commit();
        var_dump($data);
        var_dump(Yii::$app->params);
        var_dump(Yii::$app->controller->module);
        return 'success';
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

    public function actionCountry()
    {
        $countries = Country::find()->orderBy('name')->all();
        var_dump($countries);
        $country = Country::findOne('US');
        var_dump($country);
        var_dump($country->toArray());
        var_dump($country->attributes());
        echo $country->name;
        $country->name = 'U.S.A';
        $country->save();exit();
    }
    public function actionCountryShow()
    {
        //var_dump(Yii::$app->getRequest()->getQueryString());exit();
        $query = Country::find();
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $countries = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('country-show', [
            'countries' => $countries,
            'pagination' => $pagination,
        ]);
    }
    public function actionWidget()
    {
        return $this->render('widget');
    }
    public function actionAlias()
    {
        var_dump(Yii::$aliases);
    }
    public function actionUrl(){
        $url = Url::to(['demo/index/url', 'id'=>100]);
        echo $url . '</br>';
        $url2 = Url::to(['url', 'msg'=>'test']);
        echo $url2 . '</br>';
        $url3 = Url::to(['index/url'], true);
        echo $url3 , '</br>';
        $url4 = Url::to([''], 'https');
        echo $url4 . '</br>';
        echo 'home(): ' . Url::home() . '</br>';
        echo 'base(): ' . Url::base() . '</br>';
        echo 'canonical(): ' . Url::canonical() . '</br>';
        Yii::setAlias('@example', 'http://example.com/');
        echo Url::to('@example');
    }
    public function actionRequest()
    {
        $request = Yii::$app->request;
        echo 'request->get(\'id\', 1) : ' . $request->get('id', 1) . '</br>';
        $params = $request->bodyParams;
        $id = $request->getBodyParam('id');
        echo 'the method is : ' . $request->method . "</br>";
        $userHost = $request->userHost;
        $userIP = $request->userIP;
        echo "userHost: {$userHost}, userIp: {$userIP}</br>";
    }
    public function actionResponse()
    {
        $response = Yii::$app->response;
        $response->headers->set('Pragma', 'no cache');
        $response->content = "Hello World";
        $response->format = \yii\web\Response::FORMAT_JSON;
        $response->data = ['a', 'b', 'c' => 'cc'];
        $response->send();
        echo "aaaa</br>";
    }
    public function actionSession()
    {
        $session = Yii::$app->session;
        $msg = $session->get('msg');
        echo "session msg: {$msg}";
        $session['msg'] = "hello</br>";

        $cookies = Yii::$app->request->cookies;
        $msg = $cookies->getValue('msg');
        $cookie = $cookies->get('msg');
        $msg2 = '';
        if ($cookie)
            $msg2 = $cookie->value;
        echo "cookie msg: {$msg} {$msg2}</br>";
        $cookies2 = Yii::$app->response->cookies;
        $cookies2->add(new \yii\web\Cookie([
            'name' => 'msg',
            'value' => 'hello cookie',
        ]));
    }
    public function actionComponent()
    {
        $demo = new \app\components\Demo();
        $demo->name = 'abba';
        echo $demo->name;
    }
}