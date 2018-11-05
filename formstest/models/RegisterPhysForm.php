<?php

namespace app\models;

use Yii;
use yii\base\Model;

class RegisterPhysForm extends Model
{
    public $email;
	public $name;
	public $ip;
    public $inn;
	
    public function rules()
    {
        return [
			[['name', 'email'], 'required'],
            ['inn', 'integer', 'min'=>100000000000,'max'=>999999999999],
            ['email', 'email'],
        ];
    }

    public function attributeLabels()
    {
        return [
        	'email' => 'Эл. почта',
        	'name' => 'ФИО',
        	'ip' => 'ИП',
        	'inn' => 'ИНН',
        ];
    }
}
