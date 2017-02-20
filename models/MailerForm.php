<?php
namespace app\models;

use Yii;
use yii\base\Model;

class MailerForm extends Model
{
  //public $fromEmail;
  //public $fromName;
  //public $toEmail;
  //public $subject;
  //public $body;
  public $message;

  /*public function rules()
  {
    return [
      [['fromEmail', 'fromName', 'toEmail', 'subject', 'body'], 'required'],
      ['fromEmail', 'email'],
      ['toEmail', 'email']
    ];
  }*/

  public function sendEmail($message)
  {
    if ($this->validate())
    {
      $mailbody = '<h3>Dont forget to do:</h3>
      <p><b>Task name:</b>'.$message->task_name.'</p>
      <p><b>Task description:</b>'.$message->task_description.'</p>';

      Yii::$app->mailer->compose()
        ->setTo('kirillov.example@yandex.ru')
        ->setFrom('kirillov.example@yandex.ru')
        ->setSubject('Hello!')
        ->setTextBody($mailbody)
        ->send();
      return true;
    }
    return false;
  }

}
 ?>
