<?php

namespace app\controllers;

use yii\web\Controller;
class IndexController extends Controller
{
    public function actionIndex()
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
}