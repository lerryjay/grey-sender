<?php
set_time_limit(0);

include_once './functions.php';
$sent = false;
$success = 0;
$failed  = 0;
$smtps = [];
$recipients = [];
if (isset($_POST['submit'])) { 

  if(getPost('recipients') == 'email'){
    $recipients =  strlen($_POST['recipientemail']) > 0 ?  array($_POST['recipientemail']) : [];
  }
  if(getPost('recipients') == 'combotext'){
    $recipients = explode("\n", $_POST['combotext']);
  }
  if(getPost('recipients') == 'mailtext'){
    $recipients = explode("\n", $_POST['mailtext']);
  }
  if(getPost('recipients') == 'combofile'){
    $recipients = explode("\n", extractfilecontents('combofile'));
    for ($i=0; $i < count($recipients) ; $i++) { 
      $recipients[$i] = explode(':',$recipients[$i])[0];
    }
  }
  if(getPost('recipients') == 'mailfile'){
    $recipients = explode("\n", extractfilecontents('mailfile'));
  }

  $total = count($recipients);

  if(getPost('smtp') == 'file'){
    $smtps = extractfilecontents('smtpcombofile');
    for ($i=0; $i < count($smtps) ; $i++) { 
      $smtp = explode(':',$smtps[$i]);
      $smtps[$i] = ['host'=>$smtp[0], 'ip'=>$smtp[1],'port'=>$smtp[2],'username'=>$smtp[3], 'password'=>$smtp[4]];
    }
  }
  if(getPost('smtp') == 'textarea'){
    $smtps = explode("\n",getPost('smtpconfigtext'));
    for ($i=0; $i < count($smtps) ; $i++) { 
      $smtp = explode(':',$smtps[$i]);
      $smtps[$i] = ['host'=>$smtp[0], 'ip'=>$smtp[1],'port'=>$smtp[2],'username'=>$smtp[3], 'password'=>$smtp[4]];
    }
  }

  if(getPost('smtp') == 'configuration'){
    $smtps[] = ['host'=>getPost('smtphost'),'ip'=>getPost('smtpip'),'port'=>getPost('smtpport'),'username'=>getPost('smtpuser'),'password'=>getPost('smtppass') ];
  }

  $subject = $_POST['subject'];
  $message = $_POST['message'];
    
  $fromEmail = $_POST['senderemail'];
  $fromName = $_POST['sendername'];

  $i = 0;
  while (count($recipients) > 0 && count($smtps) > 0) {
    $smtpIndex = rand(0,count($smtps) - 1);
    $res = sendMail($recipients[$i],$smtps[$smtpIndex]);
    if(!$res){
      $failed++;
      array_splice($smtps,$smtpIndex);
    }else $success++;
    array_splice($recipients,$i,1);
    $i++;
  }
  exit;
  header("Location: ../index.php?success=$success&failed=$failed&total=$total");
}
?>
