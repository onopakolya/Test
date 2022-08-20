<?php

namespace app\module\admin\controllers;

use Yii;
use app\models\Product;
use app\models\SaleForm;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Product models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Product::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Product();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) 
            {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionSale()
    {
        $sale = new SaleForm();        

        if ($this->request->isPost) {
            if ($sale->load($this->request->post()) && $sale->validate())                
            {
                $product = new Product();
                $product->name = $sale->name;  
                $product->price = $sale->price - ($sale->price / 100 * $sale->sale);
                $product->price = round($product->price);                
                $product->save();
                return $this->redirect(['view', 'id' => $product->id]);           
            }      
        }       
            return $this->render('sale', [
            'model' => $sale,
        ]);
    }
    

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

  





    public function actionTestCreate()
    {
        $model = new Product();
        $model->name = 'Water';
        $model->price = 2300;
        $model->save();
        return $this->redirect(['index']);
    }

    public function actionTestUpdate()
    {
        $changeName =  Product::findOne(['id' => 2]);
        $changeName->name = 'Send';
        $changeName->save();
        return $this->redirect(['index']);
    }

    public function actionTestDelete()
    { 
        $delete = Product::findOne(['id' => 2]);
        $delete->delete();
        return $this->redirect(['index']);
    }

    public function actionAll()
    {
        $allProducts = Product::find()->all();
        foreach ($allProducts as $product)
        {
            if($product->price < 0)
            {
                $product->delete();
            }
        }
        return $this->redirect(['index']);
    }

    public function actionSumm()
    {
        $allProducts = Product::find()->all();
        $summPrice = 0;
        foreach ($allProducts as $product)
        {
           $summPrice += $product->price;
           
        }
        $summ = new Product();
        $summ->name = 'Summa';
        $summ->price = $summPrice;
        $summ->save();
        return $this->redirect(['index']);
    } 
    
    //public function actionSale() 
    //{
    //    $allProducts = Product::find()->all();
    //    foreach ($allProducts as $product)
    //    {
    //        $product->name = 'Акция! '.$product->name;
    //        $product->save();
    //    }
    //    return $this->redirect(['index']);
    //}
    

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
