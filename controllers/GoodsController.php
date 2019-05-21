<?php

namespace app\controllers;

use yii\web\Controller;
class GoodsController extends Controller
{
    public function actionGoods_type()
    {
        return $this->renderPartial('goods_type');
    }

}