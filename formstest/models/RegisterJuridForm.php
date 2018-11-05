<?php

namespace app\models;

use Yii;
use yii\base\Model;

class RegisterJuridForm extends Model
{
    public $email;
	public $name;
	public $organisation;
    public $inn;

    public function rules()
    {
        return [
            [['name', 'organisation', 'email', 'inn'], 'required'],
            ['inn', 'integer', 'min'=>1000000000,'max'=>9999999999],
            ['email', 'email'],
        ];
    }

    public function attributeLabels()
    {
        return [
        	'email' => 'Эл. почта',
        	'name' => 'ФИО',
        	'organisation' => 'Название организации',
        	'inn' => 'ИНН',
        ];
    }
}
