<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

  require './PHPMailer/src/Exception.php';
  require './PHPMailer/src/PHPMailer.php';
  require './PHPMailer/src/SMTP.php';
  function getPost($key)
  {
  return $_POST[$key];
  }

  function extractfilecontents($key)
  {
  return file_get_contents($_FILES[$key]['tmp_name']);
  }

  function sendMail($recipient,$smtp,$replyTo)
  {
    global $message,$subject,$fromEmail,$fromName;

    $mail = new PHPMailer();
    $output = [];

    try {
      $error;
      $mail->SMTPDebug = 3; // Enable verbose debug output
      // $mail->Debugoutput = function($str, $level) { echo $error = "debug level $level; message: $str";};

      $mail->isSMTP(); // Send using SMTP
      $mail->Host = $smtp['host'];//$line[3]; // Set the SMTP server to send through
      $mail->SMTPAuth = true; // Enable SMTP authentication
      $mail->Username = $smtp['username']; // SMTP username
      $mail->Password = $smtp['password'];
      $mail->Port = (int)$smtp['port'];
      $mail->setFrom($smtp['username'],$fromName);
      //Recipient
      $mail->addAddress($recipient); // Name is optional
      $mail->ClearReplyTos();

      foreach ($replyTo as $key => $value) {
        $mail->addReplyTo($value['email'],$value['name']);
      }
      // Content
      $mail->isHTML(true); // Set email format to HTML
      $mail->Subject = $subject;
      $mail->Body = $message;
      // var_dump($mail->getError());
      return $mail->send();
    }catch (phpmailerException $e) {
      var_dump('i am here ');
      // echo $e->errorMessage(); //Pretty error messages from PHPMailer
    } catch (Exception $e) {
      var_dump('i am there ');
      // echo $e->getMessage(); //Boring error messages from anything else!
      $failed++;
    }
  }
?>
