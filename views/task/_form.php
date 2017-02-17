<!--Subview for create/edit task-->
<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="task-form">

  <?php $form = ActiveForm::begin();?>

  <?= $form->field($model, 'task_name')->textInput(['maxlength' => true]) ?>
  <?= $form->field($model, 'task_description')->textInput(['maxlength' => true]) ?>

  <div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Edit', ['Class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
  </div>

  <?php ActiveForm::end(); ?>

</div>
