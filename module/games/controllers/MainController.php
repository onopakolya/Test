<?php

namespace app\module\games\controllers;

use Yii;
use yii\web\Controller;


/**
 * Default controller for the `admin` module
 */
class MainController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */


    public function actionFirstGame($a,$b) 
    {
        $c = $a + $b;
        return $this->render('firstgame', [                  //передаем значение во view
            'c' => $c 
        ]);
    }
}