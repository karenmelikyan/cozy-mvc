<?php declare(strict_types=1);

use mvc\app\Controller;

class SiteController extends Controller
{
    public function actionIndex()
    {
        $this->render('index',[
            'message' => 'SiteController, actionIndex',
        ]);
    }
}