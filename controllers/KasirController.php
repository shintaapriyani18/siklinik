<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class KasirController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
