<?php

namespace app\models;

use yii\base\Model;

class PostForm extends Model 
{
    public $name;
    public $link;
    public $linkEdit;
    public $linkDonor;
    public $chapterNumber;

    public function rules()
    {
        return [
            [['name', 'link', 'linkEdit', 'linkDonor', 'chapterNumber'], 'required'],
            [['link','linkEdit', 'linkDonor'], 'url'],
            ['chapterNumber','number', 'min' => 0],
        ];
    }
    public function attributeLabels()
    {
        return [
            'name' => 'Название манги',
            'link' => 'Ссылка на сайте',
            'linkEdit' => 'Ссылка редактирования',
            'linkDonor' => 'Ссылка на сайте донора',
            'chapterNumber' => 'Номер главы',
        ];
    }
}