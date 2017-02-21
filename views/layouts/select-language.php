<?php
use yii\bootstrap\Html;

//Search the language and conclude link
if (\Yii::$app->language == 'ru'):
  //Change language to English if we are using RU
  echo Html::a('Go to English', array_merge(
    \Yii::$app->request->get(),
    [\Yii::$app->controller->route, 'language' => 'en']
  ));
else:
  //Change language to Russian if we are using EN
  echo Html::a('Перейти на Русский', array_merge(
    \Yii::$app->request->get(),
    [\Yii::$app->controller->route, 'language' => 'ru']
  ));
endif;
