<?php 

if(isset($_POST['submit'])){
require('phpmailer/PHPMailerAutoload.php');

$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$name = $_POST['user_name'];
$email = $_POST['user_email'];
$question = $_POST['user_question'];

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.mail.ru';  																							// Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'questionsender@bk.ru'; // Ваш логин от почты с которой будут отправляться письма
    $mail->Password = 'oapaPcI1EI2|'; // Ваш пароль от почты с которой будут отправляться письма
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров
    $mail->setFrom('questionsender@bk.ru');   
    $mail->addAddress('olzhas.torekhan@icloud.com'); 
        echo $name;
        echo $email;
        echo $question;
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Портфолио';
        $mail->Body    = 'Имя: ' .$name . ' отправил вопрос'. '<br>Почта: ' .$email. '<br>Сообщение ' .$question;
        $mail->AltBody = '';

        if(!$mail->send()) {
            echo 'Error';
        } else {
            echo '<div class="success-send">E-mail успешно отправлен!</div>';
            header("Location: ./index.html");
            exit(); 
        }
    }

?>