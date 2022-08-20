<?php

namespace app\models;


/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property int $price
 */
class Product extends \yii\db\ActiveRecord
{  
       
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'price'], 'required'],
            [['price'], 'integer', 'min' =>1],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'price' => 'Цена',
        ];
    }


}
