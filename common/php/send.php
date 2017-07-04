<?php
// Import the variables from the contact form
@$name = addslashes($_POST['name']);
@$phone = addslashes($_POST['phone']);
@$email = addslashes($_POST['email']);
@$message = addslashes($_POST['message']);

// Prepare the message
$headers = "From: $email\n" // person that send the e-mail
 . "Reply to: $email\n"
 . "Subject:" . $request . "," . $service . "\n";
$subject = "$asunto\n"; // subject that will appear in the mail client
$email_to = "youremail@yourdomain.com"; // change for your e-mail
$email_to = array("youremail@yourdomain.com", "yourotheremail@yourdomain.com"); // mutiple e-mails
$content = "$name has sent you an e-mail from http://yourdomain.com\n"
. "\n"
. "Name: $name\n"
. "Phone: $phone\n"
. "E-mail: $email\n"
. "Message: $message\n"
. "\n";

// Send the message y check the output
  if (mail ($email_to, $subject, $content, $headers)) {
      echo "<p class="sent">Your message has sent correctly. Thanks for contact us.</p>";
  } else {
      echo "<p class="not-sent">Oops!, something went wrong. Please try again.</p>";
  }
?>
