<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cats".
 *
 * @property integer $id
 * @property string $cat_name
 * @property integer $cat_count
 */
class Cats extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cats';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat_name', 'cat_count'], 'required'],
            [['cat_count'], 'integer'],
            [['cat_name'], 'string', 'max' => 50],
            [['cat_name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cat_name' => 'Cat Name',
            'cat_count' => 'Cat Count',
        ];
    }
}
