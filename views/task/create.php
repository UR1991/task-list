<?php
use yii\helpers\Html;

$this->title = Yii::t('app', 'Create Task');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Task'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
 ?>
<div class="task-create">
  <h1><?= Html::encode($this->title) ?></h1>

  <?= $this->render('_form', ['model' => $model,]) ?>
</div>
