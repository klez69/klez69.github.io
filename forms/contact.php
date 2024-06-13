<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */
  class PHP_Email_Form {
    public $ajax;
    public $to;
    public $from_name;
    public $from_email;
    public $subject;
    public $smtp;
    private $messages = [];

    public function add_message($message, $label, $priority = 0) {
        $this->messages[] = ['message' => $message, 'label' => $label, 'priority' => $priority];
    }

    public function send() {
        // Implementation of the send function
        return true;
    }
}

  $receiving_email_address = 'klez69@gmail.com';

  if( file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php' )) {
    include( $php_email_form );
  } else {
    die( 'Unable to load the "PHP Email Form" Library!');
  }

  $contact = new PHP_Email_Form;
  $contact->ajax = true;
  
  $contact->to = $receiving_email_address;
  $contact->from_name = $_POST['name'];
  $contact->from_email = $_POST['email'];
  $contact->subject = $_POST['subject'];

  
  $contact->smtp = array(
    'host' => 'gmail.com',
    'username' => 'klez69',
    'password' => 'pass',
    'port' => '587'
  );
 

  $contact->add_message( $_POST['name'], 'From');
  $contact->add_message( $_POST['email'], 'Email');
  $contact->add_message( $_POST['message'], 'Message', 10);

  echo $contact->send();
?>
