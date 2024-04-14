<?php
require_once "PHPMailerAutoload.php";

$from = $_POST["field4"];
$phone = $_POST["field5"];
$what_to_deliver = $_POST["field3"];
$from_where = $_POST["field1"];
$to_where = $_POST["field2"];

$msg = '<p><strong>Имя:</strong> ' . $from . '</p>';
$msg .= '<p><strong>Телефон:</strong> ' . $phone . '</p>';
$msg .= '<p><strong>Что доставить:</strong> ' . $what_to_deliver . '</p>';
$msg .= '<p><strong>Откуда:</strong> ' . $from_where . '</p>';
$msg .= '<p><strong>Куда:</strong> ' . $to_where . '</p>';

$mail = new PHPMailer(true);
$mail->CharSet = "utf-8";
$mail->IsSMTP();
$mail->Host = "ssl://smtp.yandex.ru";
$mail->SMTPAuth = true;
$mail->Port = 465; //25   465    143
$mail->SMTPDebug = 0;
$mail->Username = "slb-system@ya.ru";
$mail->Password = "vv548w79FKWPN";
$mail->SetFrom("slb-system@ya.ru", "slb-system");

$mail->AddAddress("alekcandrmain@gmail.com","Александр");

$mail->Subject = 'Заявка с сайта slb-system.by';
$mail->IsHTML(true);
$mail->Body = $msg;

if ($from == "" || $phone == "" || $what_to_deliver == "" || $from_where == "" || $to_where == "") {
    echo "Заполните все поля формы.";
} else {
    if(!$mail->send()) {
        echo 'Message was not sent.';
        echo 'Mailer error: ' . $mail->ErrorInfo;
    } else {
        header("Location: ".$_SERVER['HTTP_REFERER']."?zv=ok");
    }
}
?>
