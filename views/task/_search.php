<!--Subview for searching task-->
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="task-search">
  <?php
$form = ActiveForm::begin([
  'action' => ['index'],
  'method' => 'get',
]);   ?>

<?= $form->field($model, 'task_name') ?>

<div class="form-group">
  <?= Html::submitButton(Yii::t('yii', 'Search'), ['class'=> 'btn btn-primary']) ?>
  <?= Html::resetButton(Yii::t('yii', 'Reset'), ['class'=> 'btn btn-default']) ?>
</div>
<?php ActiveForm::end(); ?>
</div>
