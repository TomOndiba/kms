<?php

function kms_email_hook($hook, $type, $returnValue, $params){
    
    $mail = new Email(array(
        'protocol' => 'smtp',
        'smtp_host' => 'smtp.yandex.ru',
        'smtp_user' => 'test@serginho.ru',
        'smtp_port' => "25",
        'smtp_pass' => 'testtest',
        'from' => 'test <test@serginho.ru>',
        'newline' => "\r\n",
        'mailtype' => "html",
        'charset' => 'utf-8',
        'wordwrap' => false));

    $mail->to($params['to']);
    $mail->subject($params['subject']);
    
    $body = preg_replace("/(http:\/\/[^\s]+)/", "<a href='$1'>$1</a>", $params['body']);
    
    $mail->message($body);
    return $mail->send();    
}




