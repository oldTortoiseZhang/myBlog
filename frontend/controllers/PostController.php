<?php
namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Post;
use common\models\Cats;

/**
 * Post controller
 */
class PostController extends Controller
{
    public function actionIndex()
    {
    	$post = new Post();
    	$new_post = $post->getNewPost();
    	$cats = new Cats();
    	$cats_list = $cats->find()->asArray()->all();
        return $this->render('index', ['cat' => $cats_list, 'post' => $new_post]);
    }

    public function actionView()
    {
    	$id = Yii::$app->request->get('id', 1);
    	$post_info = Post::findOne($id);
    	$post = new Post();
    	$new_post = $post->getNewPost();
    	$cats = new Cats();
    	$cats_list = $cats->find()->asArray()->all();
        return $this->render('view', ['cat' => $cats_list, 'post' => $post_info, 'new_post' => $new_post]);
    }

    public function actionList()
    {
    	$id = Yii::$app->request->get('id', 1);
    	$post_list = Post::findAll(['cat_id' => $id, 'status' => 1]);
    	$post = new Post();
    	$new_post = $post->getNewPost();
    	$cats = new Cats();
    	$cats_list = $cats->find()->asArray()->all();
        return $this->render('list', ['cat' => $cats_list, 'post' => $post_list, 'new_post' => $new_post]);
    }





}

