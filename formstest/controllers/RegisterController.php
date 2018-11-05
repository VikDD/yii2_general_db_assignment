<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\RegisterPhysForm;
use app\models\RegisterJuridForm;

class RegisterController extends Controller
{
    public function actionIndex()
    {
    	
		$postarr = Yii::$app->request->post();
		$formtype = $postarr['formtype'];
		
        $regphysmodel = new RegisterPhysForm();
		$regjuridmodel = new RegisterJuridForm();
		
		if( $formtype == 'reg_phys'){
			if ($regphysmodel->load(\Yii::$app->request->post()) && $regphysmodel->validate()) {
            	Yii::$app->session->setFlash('registerFormSubmitted');
        	}
		}else if( $formtype == 'reg_jurid'){
			if ($regjuridmodel->load(\Yii::$app->request->post()) && $regjuridmodel->validate()) {
            	Yii::$app->session->setFlash('registerFormSubmitted');
        	}
		}
		
        return $this->render('index', [
            'regphysmodel' => $regphysmodel,
            'regjuridmodel' => $regjuridmodel,
            'submitted' => $formtype
        ]);  
    }
}