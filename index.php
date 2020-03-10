<?php
require 'vendor/autoload.php'; // If you're using Composer (recommended)
// Comment out the above line if not using Composer
// require("<PATH TO>/sendgrid-php.php");
// If not using Composer, uncomment the above line and
// download sendgrid-php.zip from the latest release here,
// replacing <PATH TO> with the path to the sendgrid-php.php file,
// which is included in the download:
// https://github.com/sendgrid/sendgrid-php/releases

define("SENDGRID_API_KEY", "SG.SU33TvE0RduAdWXF2bdeFA.5EPn2y..........");

$email = new \SendGrid\Mail\Mail();
$email->setFrom("test_sendgrid_from@tld.com", "Test sendgrid from");
$email->setSubject("Sending with SendGrid is Fun");
$email->addTo("test_sendgrid_to@tld.com", "Test sendgrid to");
$email->addContent("text/plain", "Mon message ici en PHP.");
$email->addContent(
"text/html", "<strong>Mon message ici </strong>en PHP."
);

$sendgrid = new \SendGrid(SENDGRID_API_KEY);
try {
    $response = $sendgrid->send($email);
    echo "<pre>".var_export($response, true)."</pre>";

//    print $response->statusCode() . "\n";
//    print_r($response->headers());
//    print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}
