<?php

/* @var $this yii\web\View */

$this->title = 'LLongAgo Blog';
?>
<div class="site-index">

    <div class="body-content">

        <div class="row">
            <div class="col-lg-8">                
                <? foreach ($post as $value) :?>
                <div class="panel">
                    <div class="panel-body"><h3><?=$value->title?></h3></div>
                      <div class="panel-body">
                          <p><?=date("Y-m-d H:i", $value->update_date)?></p>
                          <p><?=$value->desc?></p>
                      </div>
                      <div class="panel-body">
                            <p style="text-align:right;">
                                <a href="<?=Yii::$app->urlManager->createUrl('post/view?id='.$value->id)?>">
                                    <button type="button" class="btn btn-success">阅读全文</button>
                                </a>
                            </p>
                      </div>
                </div>
                <?endforeach;?>
                
            </div>

            <div class="col-lg-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">最新文章</div>
                    <div class="panel-body">
                        <ul class="list-group">
                            <?foreach ($new_post as $key => $value):?>
                            <li class="list-group-item" style="border:none;">
                                <a href="<?=Yii::$app->urlManager->createUrl('post/view?id='.$value['id'])?>">
                                    <?=$value['title']?>
                                </a>
                            </li>
                            <?endforeach;?>
                        </ul>
                    </div>
                </div>

                <div class="panel panel-primary">
                    <div class="panel-heading">文章分类</div>
                    <div class="panel-body">
                        <ul class="list-group">
                            <?foreach ($cat as $key => $value):?>
                            <li class="list-group-item" style="border:none;">
                                <span class="badge"><?=$value['content']?></span><a href="<?=Yii::$app->urlManager->createUrl('post/list?id='.$value['id'])?>"><?=$value['cat_name']?></a>
                            </li>
                            <?endforeach;?>
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
