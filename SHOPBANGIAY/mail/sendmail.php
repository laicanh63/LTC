<?php 
    include "PHPMailer/src/PHPMailer.php";
    include "PHPMailer/src/Exception.php";
    include "PHPMailer/src/OAuth.php";
    include "PHPMailer/src/POP3.php";
    include "PHPMailer/src/SMTP.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    class Mailer {
    public function dathangmail($tieude, $noidung, $maildathang){
        $mail = new PHPMailer(true);
        $mail -> CharSet = 'UTF-8';
        //print_r($mail);
        try {
            //Server Settings
            $mail -> SMTPDebug = 0;
            $mail -> isSMTP();
            $mail -> Host='smtp.gmail.com';
            $mail -> SMTPAuth = true;
            $mail -> Username = 'tblienminh@gmail.com';
            $mail -> Password = 'gfqe obpv ntqs pwhn';
            $mail -> SMTPSecure = 'tls';
            $mail -> Port = 587;
    
            //Recipients
            $mail -> setFrom('tblienminh@gmail.com', 'Nike');
    
            $mail -> addAddress($maildathang, 'Gia Bảo');
            //$mail -> addAddress('ellen@example');
    
            //Name is optional
            //$mail -> addReplyTo('info@example.com', 'Information');
            $mail -> addCC('tblienminh@gmail.com');
            // $mail -> addBCC('BCC@example.com');
    
            //Attachments
            // $mail -> addAtachment('/var/tmp/file.tar.gz');
            // $mail -> addAtachment('/tmp/image.jpg', 'new.jpg');
    
            //Contents
            $mail -> isHTML(true);
            $mail -> Subject = $tieude;
            $mail -> Body = $noidung;
            //$mail -> AltBody = 'This is the body in plain text for non-HTML mail clients';
    
            $mail -> send();
            echo 'Message has been send';
        } catch(Exception $e) {
            echo 'Message could not be send. Mailer Error: ', $mail -> ErrorInfo;
        }
}
}
?>