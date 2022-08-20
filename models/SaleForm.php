<?php

namespace app\models;
use yii\base\Model;
 
class SaleForm extends Model
{
    public $name;
    public $price;
    public $sale;
        
    public function rules()
    {
        return [
            [['name', 'price','sale'], 'required'],
            ['price', 'integer', 'min' =>1],
            ['sale', 'integer', 'min' => 0, 'max' => 100],
            ['name', 'string', 'max' => 255],
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'name' => 'Наименование',
            'price' => 'Цена',
            'sale' => 'Скидка',
        ];
    }
    
}