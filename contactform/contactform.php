<?php

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$subject = $_POST['subject'];

require "vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

$mail -> isSMTP();
$mail -> SMTPAuth = true;

$mail -> Host = "smtp.gmail.com";
$mail -> SMTPSecure = "PHPMailer::ENCRYPTION_STARTTLS";
$mail -> Port = 587;

$mail -> Username = "your email";
$mail -> Password = "your password";

$mail -> setFrom("your email", "your name");
$mail -> addAddress("your email", "your name");

$mail -> Subject = $subject;
$mail -> Body = "<h3>Name : $name <br>Email : $email <br>Message : $message</h3>";

$mail -> send();

header("Location: thanku.html");