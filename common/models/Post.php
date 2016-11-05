<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property integer $admin_id
 * @property integer $cat_id
 * @property string $desc
 * @property integer $status
 * @property integer $create_date
 * @property integer $update_date
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'content', 'admin_id', 'cat_id', 'desc', 'status', 'create_date', 'update_date'], 'required'],
            [['content'], 'string'],
            [['admin_id', 'cat_id', 'status', 'create_date', 'update_date'], 'integer'],
            [['title', 'desc'], 'string', 'max' => 50],
            [['title'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题',
            'content' => '内容',
            'admin_id' => '作者',
            'cat_id' => '分类',
            'desc' => '简介',
            'status' => '状态',
            'create_date' => '创建时间',
            'update_date' => '修改时间',
        ];
    }

    public function getNewPost()
    {
        $res = self::find()->asArray()->where(['status' => 1])->orderBy('update_date')->limit(5)->all();
        if (!$res) {
            throw new Exception("暂无最新文章!");       
        }else{
            return $res;
        }
    }

}
