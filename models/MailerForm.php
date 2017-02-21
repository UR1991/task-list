<?php
namespace app\models;

use Yii;
use yii\base\Model;

class MailerForm extends Model
{
  public $message;

  //Function for sending reminder mail
  public function sendEmail($message)
  {
    if ($this->validate())
    {
      //Create tho body of mail
      $mailbody = 'Dont forget to do:
      Task name:'.$message->task_name.'
      Task description:'.$message->task_description;

      //Compose and send mail
      Yii::$app->mailer->compose()
        ->setTo(Yii::$app->params['adminEmail'])
        ->setFrom('kirillov.example@yandex.ru')
        ->setSubject('Hello!')
        ->setHtmlBody($mailbody)
        ->send();
      return true;
    }
    return false;
  }

}
 ?>
