<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;

class TestController extends Controller
{
    public function actionUsers() {
        return $this->render('users');                 //передаем значение во view     
    }
}