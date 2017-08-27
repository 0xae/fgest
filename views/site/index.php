<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <!-- 
    <div class="jumbotron">
        <h1>Congratulations!</h1>
        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>
    -->

    <div class="body-content">
        <div class="row">
            <div class="col-lg-4">
                <h2>Or&ccedil;amentos Recentes</h2>
                <p>
                    <a class="btn  btn-success" href="index.php?r=orcamento/create">
                    criar or&ccedil;amento
                    </a>
                </p>

            </div>
            <?php foreach ($model as $orc): ?>
                <div class="col-lg-4">
                    <h2><?= $orc->titulo ?></h2>
                    <p><?= $orc->descricao; ?> </p>
                    <p>
                        <a class="btn btn-sm btn-default" href="index.php?r=orcamento/update&id=<?= $orc->id ?>">
                            <span class="glyphicon glyphicon-pencil"></span>
                            editar
                        </a>
                    </p>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>
