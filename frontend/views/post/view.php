<?php

/* @var $this yii\web\View */

$this->title = 'LLongAgo Blog';
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-lg-8">                
                <? 
                    echo '
                    <div class="panel">
                        <div class="panel-body"><h3>'.$post->title.'</h3></div>
                          <div class="panel-body">
                              <p>'.date("Y-m-d H:i", $post->update_date).'</p>
                              <p>'.$post->desc.'</p>
                          </div>
                          <div class="panel-body">'.$post->content.'</div>
                    </div>
                    ';
                ?>
                
            </div>

            <div class="col-lg-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">最新文章</div>
                    <div class="panel-body">
                        <ul class="list-group">
                            <? foreach ($new_post as $key => $value) {
                                echo '
                                <li class="list-group-item" style="border:none;">
                                    <a href="'.Yii::$app->urlManager->createUrl('post/view?id='.$value['id']).'">'.$value['title'].'
                                    </a>
                                </li>
                                ';
                            } ?>
                        </ul>
                    </div>
                </div>

                <div class="panel panel-primary">
                    <div class="panel-heading">文章分类</div>
                    <div class="panel-body">
                        <ul class="list-group">
                            <? foreach ($cat as $key => $value) {
                            echo '
                                <li class="list-group-item" style="border:none;">
                                    <span class="badge">'.$value['cat_count'].'</span><a href="'.Yii::$app->urlManager->createUrl('post/list?id='.$value['id']).'">'.$value['cat_name'].'</a>
                                </li>
                            ';
                            } ?>
                        </ul>
                    </div>
                </div>

                <div class="panel panel-success">
                    <div class="panel-heading">友情链接</div>
                    <div class="panel-body">
                        <a href="http://www.junphp.com/Blog/Index.php">牛神博客</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
