<?php

  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = 'anusoruban@gmail.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-attachment/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->subject = $_POST['subject'];

  // Uncomment below code if you want to use SMTP to send emails. You need to enter your correct SMTP credentials
  
  $contact->smtp = array(
    'host' => 'smtp.gmail.com',
    'username' => 'anusarva57@gmail.com',
    'password' => 'axdeexcksvwlhnpk',
    'port' => '587'
  );
  

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['message'], 'Message', 10);
  $contact->add_attachment('resume', 20, array('pdf', 'doc', 'docx', 'rtf'));

  echo $contact->send();
?>
