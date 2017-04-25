<?php

$app->post('/email', function () {
    $app = \Slim\Slim::getInstance();

    $email = $app->request->post('email');
    $mensagem = $app->request->post('mensagem');
    $telefone = $app->request->post('telefone');
    $nome = $app->request->post('nome');
    $assunto = $app->request->post('assunto');


    $mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com	';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'lcmpaci@gmail.com';                 // SMTP username
    $mail->Password = 'senha';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    $mail->setFrom('lcmpaci@gmail.com', 'Lucas');
    $mail->addAddress($email, $nome);     // Add a recipient
    //$mail->addAddress('ellen@example.com');               // Name is optional
    //$mail->addReplyTo('info@example.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    //$mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = $assunto;
    $mail->Body = $mensagem;

    if (!$mail->send()) {
        //$results = 'Message could not be sent.';
        $results = 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        $results = 'Message has been sent';
    }
    $status = "200";

    return helper::jsonResponse(false, 'results', $status, $results);
});
