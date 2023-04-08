<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require '../vendor/PHPMailer/PHPMailer/src/Exception.php';
require '../vendor/PHPMailer/PHPMailer/src/PHPMailer.php';
require '../vendor/PHPMailer/PHPMailer/src/SMTP.php';

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$anexo = $_FILES['arquivo'];

if (!isset($dados['conteudo']) && !isset($dados['destino'])) {
        header("Location: ../view/index.php");
}

$mail = new PHPMailer(true);

try {
        //Configurações do Servidor 
        // Necessário adaptar 
        $mail->isSMTP();
        $mail->Host       = '';
        $mail->SMTPAuth   = true;
        $mail->Username   = '';
        $mail->Password   = '';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;


        //Remetente
        $mail->setFrom('', '');

        //Destinatário
        $mail->addAddress($dados['destino']);


        //Envio com anexo
        if (isset($anexo['name']) && !empty($anexo['name'])) {
                $mail->addAttachment(
                        $anexo['tmp_name'] //Endereço do arquivo 
                        ,
                        $anexo['name'] // Nome do arquivo
                );
        }

        //Conteúdo
        $mail->isHTML(true);
        $mail->Subject = $dados['assunto'];
        $mail->CharSet = "UTF-8";
        $mail->msgHTML(nl2br($dados['conteudo'])); //A função nl2br pula linhas 
        $mail->send();





        header("Location: ../view/index.php?status=enviado");
} catch (Exception $e) {
        echo "Erro:  " . $e;
}
