<?php

namespace app\controllers;

use yii;
use Illuminate\Http\Request;
use yii\web\Controller;
class IndexController extends Controller
{
    public $enableCsrfValidation = false;
    public function actionIndex(Request $request)
    {
        return $this->renderPartial('index');
    }

    public function actionLogin()
    {
        return $this->renderPartial('login');
    }

    public function actionReg()
    {
        return $this->renderPartial('reg');
    }

    public function actionRegadd(){
        $request = Yii::$app->request;
        $all = $request->post();

    }




}