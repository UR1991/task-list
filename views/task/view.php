<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
 ?>
 <div class="task-view">
   <h1><?= Html::encode($this->title) ?></h1>

   <p>
     <?= Html::a('Edit', ['edit', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
     <?= Html::a('Delete', ['delete', 'id' => $model->id], [
       'class' => 'btn btn-danger',
       'data' => [
           'confirm' => 'Are your sure?',
           'method' => 'post',
       ],
       ]) ?>
   </p>

   <?= DetailView::widget([
     'model' => $model,
     'attributes' => [
       'id',
       'task_name',
       'task_description',
     ],
     ]) ?>
 </div>
