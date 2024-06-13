<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST['submit'])) {
    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'joeyingloh0326@gmail.com';
        $mail->Password = 'ssje gojf tneq jfzm';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        // Recipients
        $mail->setFrom('joeyingloh0326@gmail.com');
        $mail->addAddress($_POST['emailinp']);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Subprize Subscription';
        $mail->Body    = "<b>Subject: Get Delicious Updates & Exclusive Deals – Join Our Newsletter! 🍰</b><br>
         <img src='https://www.tasteofhome.com/wp-content/uploads/2018/03/Ranch-Snack-Mix_exps15898_THCWR143330B03_13_4bC_RMS-2.jpg'><br>

        Hi,<br><br>

        Are you ready to indulge in a world of tasty news and unbeatable deals? Join our newsletter and never miss out on the latest updates, mouth-watering recipes, and exclusive discounts!<br><br>

        By signing up, you’ll receive:<br><br>

        <b>Delicious Recipes:</b> Discover new and exciting recipes that will make your taste buds dance.<br>
        <b>Exclusive Deals:</b> Be the first to know about our special offers and save on your favorite treats.<br>
        <b>Insider News:</b> Get behind-the-scenes updates and stay informed about what’s cooking in our kitchen.<br>
        Don’t wait – subscribe now and treat yourself to the best!<br><br>

        Looking forward to sharing our passion for great food with you!<br><br>

        Best regards,<br>
        Loh Joe Ying<br>
        Subprize
";
        $mail->AltBody = "Join our newsletter and receive tasty news and deals!";

        $mail->send();
        $referrer = isset($_POST['referrer']) ? $_POST['referrer'] : 'firstpage.html';
        echo "<script>alert('Sent successfully!'); document.location.href = '$referrer';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');</script>";
    }
}
?>
