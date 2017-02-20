<?php
use yii\helpers\Html;

$this->title = Yii::t('yii', 'Edit Task');
$this->params['breadcrumbs'][] = ['label' => 'Task', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
 ?>
<div class="task-edit">
  <h1><?= Html::encode($this->title) ?></h1>

  <?= $this->render('_form', ['model' => $model,]) ?>
</div>
