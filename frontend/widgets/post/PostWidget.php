<?php

namespace frontend\widgets\post;

use Yii;
use yii\base\Widget;
use common\models\Post;
use yii\helpers\Url;
use yii\data\Pagination;

/**
* 自定义文章列表组件
*/
class PostWidget extends Widget
{
	#文章列表总标题
	public $title = '';
	#显示的文章数量
	public $limit = 5;
	#是否显示更多
	public $more = true;
	#是否显示分页
	public $page = false;

	public function run()
	{
		$curPage = Yii::$app->request->get('page', 1);
		#查询条件
		$cond = ['=', 'status', 1];
		$res = Post::getList($cond, $curPage, $this->limit);
		$result['title'] = $this->title?:"最新文章";
		$result['more'] = Url::to(['post/list']);
		$result['body'] = $res['data']?:[];
		#是否显示分页
		if ($this->page) {
			$pages = new Pagination(['totalCount'=>$res['count'], 'pageSize' => $res['pageSize']]);
			$result['page'] = $pages;
		}
		return $this->render('index', ['data' => $result]);
	}
}