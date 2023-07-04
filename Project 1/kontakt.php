<?php

use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$db = new mysqli('localhost', 'mradic', 'Ghf563xcvg32D', 'mradic');

$ime = $_POST['ime'];
$email = $_POST['email'];
$tema = $_POST['tema'];
$text = $_POST['sporocilo'];


$sql = "INSERT INTO kontakt(ime, email, tema, sporocilo)
VALUES('$ime', '$email', '$tema', '$text')";

$rezultat = $db->query($sql);

$headers = 'From: webmaster@example.com';


$mail = new PHPMailer(true);
try {
    $mail->isSMTP(); // using SMTP protocol
    $mail->Host = 'smtp.gmail.com'; // SMTP host as gmail 
    $mail->SMTPAuth = true;  // enable smtp authentication
    $mail->Username = 'test.burek@gmail.com';  // sender gmail host
    $mail->Password = 'burek55555'; // sender gmail host password
    $mail->SMTPSecure = 'tls';  // for encrypted connection
    $mail->Port = 587;   // port for SMTP

    $mail->setFrom('test.burek@gmail.com', "Sender"); // sender's email and name
    $mail->addAddress('test.burek@gmail.com', "Receiver");  // receiver's email and name

    $mail->Subject = 'Novo Sporocilo (Kontakt)' . $tema;
    $mail->Body    ="Ime: ".$ime." \nMail: ".$email."\nBesedilo: ".$text;

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) { // handle error.
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}




if($rezultat)
{
    header("Location: http://policija.cf/5/Anyar/index.php?error=uspesno");
    exit();
    }

else{

    header("Location: http://policija.cf/5/Anyar/index.php?error=neuspesno");
    exit();
}

?>