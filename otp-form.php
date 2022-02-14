<?php
require 'Assets/Mailer/PHPMailer.php';
require 'Assets/Mailer/SMTP.php';
require 'Assets/Mailer/Exception.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'patelastha252@gmail.com';                 // SMTP username
$mail->Password = '';                           // SMTP password
$mail->SMTPSecure = 'tls';                              // Enable TLS encryption, `ssl` also accepted
$mail->Body = "Your OTP for Charvi : {$_SESSION['randomOTP']}";
$mail->Port = 587;                                    // TCP port to connect to


$mail->setFrom('patelastha252@gmail.com', 'Charvi');
$mail->addAddress("{$_SESSION['Remail']}", "{$_SESSION['Rname']}");     // Add a recipient     // Name is optional
$mail->addReplyTo('no-reply@gmail.com', 'Do Not Reply');
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    $error='Message could not be sent.'.'\nMailer Error: ' . $mail->ErrorInfo;
    header("Location: /charvi/register.php?error={$error} & otperror=1");

}
?>

<section class="my-4">
    <div class="container col-md-6 col-sm-12 col-12">
        <h1 class="text-center">Enter OTP</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="bg-light d-flex flex-wrap justify-content-center p-4 p-md-0 p-sm-0 need-validation">
            <div class="m-4 form-floating col-md-8 col-sm-12 col-11">
                <input type="number" class="form-control" id="otp" name="otp" placeholder="Enter The OTP" oninvalid="this.setCustomValidity('Please Enter Valid OTP')" oninput="this.setCustomValidity('')" required>
                <label for="otp">OTP</label>
            </div>
            <div class="col-md-12 col-sm-12 col-12 mb-4 d-flex justify-content-center gap-4">
                <button type="submit" class="btn btn-primary px-4" name="otpsubmit" id="otpsubmit" value="otpsubmit">Submit</button>
            </div>
        </form>
    </div>
</section>