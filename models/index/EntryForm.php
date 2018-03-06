<?php
/**
 * Created by tongsq.
 * Date: 2018/3/6
 * Time: 17:09
 */
namespace app\models\index;

use Yii;
use yii\base\Model;

class EntryForm extends Model
{
    public $name;
    public $email;

    public function rules()
    {
        return [
            [['name', 'email'], 'required'],
            ['email', 'email'],
        ];
    }
}