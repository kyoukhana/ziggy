<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';




 /*Process form */

  //Populate POST variable with incoming JSON from Axios.
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_POST)):
    $_POST = (array) json_decode(file_get_contents('php://input'), true);
endif;


// /*Form Type */
 $frmType = $_POST['formtype'] ? $_POST['formtype'] : '0';

$firstName=$_POST['firstName'] ? $_POST['firstName'] : '0';
$lastName=$_POST['lastName'] ? $_POST['lastName'] : '0';
$emailAddress=$_POST['email'] ? $_POST['email'] : '0';
$address=$_POST['address'] ? $_POST['address'] : '0';

 $city=$_POST['city'] ? $_POST['city'] : '0';
 $prov=$_POST['prov'] ? $_POST['prov'] : '0';
 $postal=$_POST['postal'] ? $_POST['postal'] : '0';
 $phone=$_POST['phone'] ? $_POST['phone'] : '0';
//
// /*Car info */
 $make=$_POST['make'] ? $_POST['make'] : '0';
 $model=$_POST['model'] ? $_POST['model'] : '0';
 $year=$_POST['year'] ? $_POST['year'] : '0';
 $colour=$_POST['colour'] ? $_POST['colour'] : '0';
 $plate=$_POST['plate'] ? $_POST['plate'] : '0';
 $vin=$_POST['vin'] ? $_POST['vin'] : '0';
 $odometer=$_POST['odometer'] ? $_POST['odometer'] : '0';
 $detectuble=$_POST['detectuble'] ? $_POST['detectuble'] : '0';

//
//
// /*INSURANCE */
//
 $insurance=$_POST['insurance'] ? $_POST['insurance'] : '0';
 $insurancePhone=$_POST['insurancephone'] ? $_POST['insurancephone'] : '0';
 $policy=$_POST['policyno'] ? $_POST['policyno'] : '0';
 $ClaimNo=$_POST['claimno'] ? $_POST['claimno'] : '0';
 $detectuble=$_POST['detectuble'] ? $_POST['detectuble'] : '0';
 $appraiser=$_POST['appraiser'] ? $_POST['appraiser'] : '0';

 $daterecived=$_POST['daterecived'] ? $_POST['daterecived'] : '0';
 $datereleased=$_POST['datereleased'] ? $_POST['datereleased'] : '0';

 $wrkPerformed=$_POST['wordperformed'] ? $_POST['wordperformed'] : '0';


 $formatter = new NumberFormatter('en_CA', NumberFormatter::CURRENCY);

 $partsCost=$_POST['parts'] ? $formatter->formatCurrency($_POST['parts'],'CAD') : '0';
 $LabourCost=$_POST['labour'] ? $formatter->formatCurrency($_POST['labour'],'CAD') : '0';


 $hst=$_POST['hst'] ? $_POST['hst'] : '0';
 $ttlCost=$_POST['totalCost'] ? $_POST['totalCost'] : '0';

 /*Keep this a simple invoice sent out to the client non HTML */

 $Header="<h2>Ziggys Auto</h2><p>333 McNielly Rd, Hamilton, ON, L8E 5H4</p>";
 $phoneEMail="Ziggy’s 905.746.024 <br>Mo’s Cell 905.746.2471 <br>Email: truckcarrepairs@gmail.com <br>";
 $dateInfo="<p>Date Recived: ".$daterecived. "<br>Date Released " . $datereleased;
 $CustomerInfo="<h2>Customer Information</h2><p>".$firstName.", ".$lastName."<br>".$address .", " . $city . ", " .$prov . ", " .$phone ."</p>";
 $CarInfo="<h2>Car Details</h2><p>Make: ".$make . "<br>Model: " . $model . "<br>Year: " . $year . "<br>Colour: " . $colour. "<br>Vin:" . $vin. "<br>Odometer:" . $odometer;
 $insurance="<h2>Insurnace Company</h2>".$insurance."<br>".$insurancePhone."<br>".$policy.", Claim No:".$ClaimNo."<br> Detectuble:".$detectuble.", Appraiser:".$appraiser;
 $WordPerfer="<h2>Work Performed</h2>".$wrkPerformed;
 $totalCost="<h2>Cost Breakdown</h2> Parts: ". $partsCost . "<br>Labour Cost:".$LabourCost."<br>HST: ".$hst."<br>Total Cost: ".$ttlCost;

     
 function sendEmail($smtpaddr,$username,$password,$from,$too,$tooName,$replyTo,$replyToName,$subject,$body){
     /*EMAIL Settings area */
      try {
          //Server settings
          // Instantiation and passing `true` enables exceptions
          $mail = new PHPMailer(true);
          $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
          $mail->isSMTP();                                            // Send using SMTP
          $mail->Host       = $smtpaddr;                    // Set the SMTP server to send through
          $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
          $mail->Username   = $username;                     // SMTP username
          $mail->Password   = $password;                               // SMTP password
          $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
          $mail->Port       = 587;                                    // TCP port to connect to

          //Recipients
          $mail->setFrom($from, 'Mailer');
          $mail->addAddress($too, $tooName);     // Add a recipient
          //$mail->addAddress('ellen@example.com');               // Name is optional
          $mail->addReplyTo($replyTo, $replyToName);
          // $mail->addCC('cc@example.com');
          // $mail->addBCC('bcc@example.com');

          // Attachments
          // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
          // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

          // Content
          $mail->isHTML(true);                                  // Set email format to HTML
          $mail->Subject = $subject;
          $mail->Body    = $body;
          //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

          $mail->send();
          echo 'Message has been sent';
        } catch (Exception $e) {
          echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }
      /*End EMail Settings area */
    }
    $emailName=$firstName . $lastName;
    // Compose a simple HTML email message
    $message = '<html><body>';
    $message .= $Header;
    $message .= $phoneEMail;
    $message .= $dateInfo;
    $message .= $CustomerInfo;
    $message .= $CarInfo;
    $message .= $insurance;
    $message .= $WordPerfer;
    $message .= $totalCost;
    $message .= '</body></html>';

    $frmsubject="Ziggys Collision Service ".$frmType;
    sendEmail('mail.ziggyscollision.com','noreply@ziggyscollision.com','noreplyemail123','noreply@ziggyscollision.com',$emailAddress,$emailName,'noreply@ziggyscollision.com','Ziggys Collision Service',$frmsubject,$message);


?>
