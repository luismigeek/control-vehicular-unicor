<?php

class Operaciones
{

    function __construct()
    { }

    public function cifrar_bcrypt($data = null)
    {
        return password_hash($data, PASSWORD_BCRYPT);
    }

    function send_email($data = null)
    {
        require 'PHPMailerAutoload.php';

        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';

            $mail->SMTPAuth = true;
            $mail->SMTPAutoTLS = false;
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            $mail->Username = 'es.veh.unicor@gmail.com';
            $mail->Password = 'Es%veh%unicor1';
            $mail->setFrom('es.veh.unicor@gmail.com', "Entrada y salid vehicular - Unicordoba");
            $mail->addAddress($data['email'], $data['user']);

            $mail->isHTML(true);
            $mail->Subject = $data['object'];
            $mail->Body    = $data['mensaje'];

            $mail->send();
            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    function generate_verification_code($data = null)
    {
        $hast = sha1($data['user'] . '%' . $data['id']);
        return $hast;
    }
}
