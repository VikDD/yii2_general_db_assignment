<?php

namespace app\models;

use Yii;
use yii\base\Model;

class RegisterForm extends Model
{
    public $email;
	public $name;
	public $ip;
	public $inn;
	
	public $jur_email;
	public $jur_name;
	public $organisation;
    public $jur_inn;

    public function rules()
    {
        return [
        	[['name', 'email'], 'required', 'on'=>'reg_phys'],
            ['inn', 'integer', 'min'=>100000000000,'max'=>999999999999],
            [['jur_name', 'organisation', 'jur_email', 'jur_inn'], 'required', 'on'=>'reg_jur'],
            ['jur_inn', 'integer', 'min'=>1000000000,'max'=>9999999999],
            ['email', 'email', 'on'=>'reg_phys'],
            ['jur_email', 'email', 'on'=>'reg_jur'],
        ];
    }

    public function attributeLabels()
    {
        return [
        	'email' => 'Эл. почта',
        	'name' => 'ФИО',
        	'ip' => 'ИП',
        	'inn' => 'ИНН',
        	'jur_email' => 'Эл. почта',
        	'jur_name' => 'ФИО',
        	'organisation' => 'Название организации',
        	'jur_inn' => 'ИНН',
        ];
    }
	
}
