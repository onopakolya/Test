<?php

namespace app\module\admin\controllers;

use yii\web\Controller;
use app\models\PostForm;

class PostController extends Controller 
{
    public function actionCreate() 
    {
        $model = new PostForm();
        if ($model->load($this->request->post()) && $model->validate())
        {
            return $this->render('view',['model' => $model]);
        }
        return $this->render('create',['model' => $model]);
    }  
}