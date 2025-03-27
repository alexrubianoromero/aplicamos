<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
date_default_timezone_set('America/Bogota');
require '../../phpmailer/Exception.php';
require '../../phpmailer/PHPMailer.php';
require '../../phpmailer/SMTP.php';
require_once('../movil/model/EmpresaModel.php');
require_once('../correo/model/CorreoModel.php');

class EnviarCorreoPhpMailer 
{
    protected $mail;
    protected $body;
    protected $email; 
    protected $empresaModel;
    protected $correoModel;

    public function __construct($email,$body){
        $this->email = $email;
        $this->body = $body;
        $this->empresaModel = new EmpresaModel();
        $this->correoModel = new CorreoModel();
        // $infoEmpresa =$this->empresaModel->traerInfoEmpresa();
        //     echo '<pre>'; 
        //     print_r($infoEmpresa); 
        //     echo'</pre>';
        //     die(); 
        $this->mail = new PHPMailer(true);
        $this->enviarCorreoPhpMailer();
    }

    public function enviarCorreoPhpMailer(){
        try {

            $infoEmpresa =$this->empresaModel->traerInfoEmpresa();
            $infoConfCorreo = $this->correoModel->traerInfoConfigCorreo();
            // echo '<pre>'; 
            // print_r($infoConfCorreo); 
            // echo'</pre>';
            // die(); 

            $this->mail->SMTPDebug = 0;                      //Enable verbose debug output
            $this->mail->isSMTP();                                            //Send using SMTP
            $this->mail->Host       = $infoConfCorreo['mailHost'];                     //Set the SMTP server to send through
            $this->mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $this->mail->Username   = $infoEmpresa['correoEnviarInfo'];                     //SMTP username
            $this->mail->Password   = $infoConfCorreo['password'];                                //SMTP password
            $this->mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
            $this->mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            //Recipients
            // die('email cliente phpMaile '.$this->email);
            $this->mail->setFrom($infoEmpresa['correoEnviarInfo'], $infoConfCorreo['anombredequienllega']);
            $this->mail->addAddress($this->email);     //Add a recipient
            $this->mail->addCC($infoConfCorreo['conCopiaA']);    // Copia visible
            // $this->mail->addBCC('copiaoculta@ejemplo.com'); // Copia oculta
            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
            //Content
            $this->mail->isHTML(true);                                  //Set email format to HTML
            $this->mail->Subject = $infoConfCorreo['subject'];
            $this->mail->Body    = $this->body;
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $this->mail->send();
            echo 'Mensaje de Correo Enviado<br>';
        } catch (Exception $e) {
            echo "Error en e  el envio del mensaje: {$this->mail->ErrorInfo}";
        }
    }

} //fin de la clase

?>