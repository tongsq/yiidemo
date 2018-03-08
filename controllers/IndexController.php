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

    public function actionCountry()
    {
        $countries = Country::find()->orderBy('name')->all();
        var_dump($countries);
        $country = Country::findOne('US');
        var_dump($country);
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
}