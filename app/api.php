<?php
error_reporting(1);
include_once 'PHPMailer/class.smtp.php';
include_once 'PHPMailer/class.phpmailer.php';

if ($_POST['send'] == "cc") {
    $emails_remetente = $_POST['ccs'];
    // $email = $_POST['email'];
    // $senha = $_POST['senha'];
    $nome_remetente = $_POST['nome'];
    $assunto = $_POST['assunto'];
    $conteudo = $_POST['conteudo'];

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
    $Mailer->Host = "HOST";
    $Mailer->SMTPAuth = true;
    $Mailer->Username = 'USERNAME';
    $Mailer->Password = 'PASSWORD';
    $Mailer->SMTPSecure = "ssl";
    $Mailer->Port = 465;
    $Mailer->FromName = $nome_remetente;
    $Mailer->From = 'FROMEMAIL';
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
