<?php

use mvc\app\Controller;

class AdminController extends Controller
{
    public function actionIndex()
	{ 
		$this->render('index',[
			'message' => 'AdminController, actionIndex',
		]);
	}

}


