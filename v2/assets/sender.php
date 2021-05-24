<?php
  function sendMail( $subject, $message, $recipient, $smtpHost, $smtpUser, $smtpPassword, $smtpPort, $fromEmail, $fromName) {
      
  $mail = new PHPMailer();
  $output = [];
  try {
      $mail->SMTPDebug = 2; // Enable verbose debug output
      $mail->Debugoutput = function($debugOutputLine, $level) {
        
        
    };
    
      $mail->isSMTP(); // Send using SMTP
      // $mail->Host = $smtpHost; //$line[3]; // Set the SMTP server to send through
      // $mail->SMTPAuth = true; // Enable SMTP authentication
      // $mail->Username = $smtpUser; // SMTP username
      // $mail->Password = $smtpPassword; // SMTP password
      
      // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
      // $mail->Port = (int) $smtpPort; // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
      $mail->isSMTP(); // Send using SMTP
      $mail->Host = 'alkhalaf.net';//$line[3]; // Set the SMTP server to send through
      $mail->SMTPAuth = true; // Enable SMTP authentication
      $mail->Username = 'ali@alkhalaf.net'; // SMTP username
      $mail->Password = 'canada905'; 
      $mail->Port = 587;

      //Recipients
      $mail->setFrom($fromEmail, $fromName);
      // $mail->addAddress('joe@example.net', 'Joe User'); // Add a recipient
      $mail->addAddress($recipient); // Name is optional

      // $mail->addReplyTo('ali@alkhalaf.net', 'Broadcast');
      // $mail->addReplyTo('ogunleyetolu65@gmail.com', 'Broadcast');
      // $mail->addCC('cc@example.com');
      // $mail->addBCC('bcc@example.com');

      // Attachments
      // $mail->addAttachment('/var/tmp/file.tar.gz'); // Add attachments
      // $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); // Optional name

      // Content
      $mail->isHTML(true); // Set email format to HTML
      $mail->Subject = $subject;
      $mail->Body = $message;
      // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      $sent = true;
      var_dump($mail->send());
      $success++;
      file_put_contents('./success' . date('Ymd') . '.txt', "$recipient\n",FILE_APPEND);
      sleep(2);
  } catch (Exception $e) {
      $failed++;
      file_put_contents('./error' . date('Ymd') . '.txt',"$recipient: Message could not be sent. Mailer Error: {$mail->ErrorInfo} \n",FILE_APPEND);
      // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo} ";//.$line[3]." ".$line[6]." ".$line[7];
  }
}

?>