<?php


    
    $prekes_id = $_POST['id'];
    $prekes_kaina = $_POST['kaina'];
    $kliento_vardas = $_POST['vardas'];
    $kliento_telefonas = $_POST['telefonas'];
    $kliento_elpastas = $_POST['elpastas'];
    $kliento_miestas = $_POST['miestas'];
    $kliento_gatve = $_POST['gatve'];
    $kliento_postCode = $_POST['postCode'];
    $kliento_postMethod = $_POST['postMethod'];
    

    // Import PHPMailer classes into the global namespace
    // These must be at the top of your script, not inside a function
    // use PHPMailer\PHPMailer\PHPMailer;
    // use PHPMailer\PHPMailer\Exception;

    //Load composer's autoloader
    require 'libs/PHPMailer-master/PHPMailerAutoload.php';

    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPOptions = array(
            'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
            )
            );
        $mail->Host = 'tls://smtp.gmail.com:587';

        $mail->SMTPDebug = 0;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        // $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'testams752@gmail.com';                 // SMTP username
        $mail->Password = 'LabaiSlaptas';                           // SMTP password
        $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
        // $mail->Port = 587;                                    // TCP port to connect to
        $mail->Port = 465;                                    // TCP port to connect to

        
        
        //Recipients
        $mail->setFrom('iskur@gmail.com', 'EL pastas is puslapio');  //Kas siuncia, test@gmail. (email bus tas is kurio siunciama, vardas veikia)
        $mail->addAddress("marius752@gmail.com", $kliento_vardas);     // Kam siunti marius752@gmail 
        // $mail->addAddress('ellen@example.com');               // Name is optional
        $mail->addReplyTo($kliento_elpastas, $kliento_vardas);      // kam bus atsakoma is emailo   prideti kam bus reply kai paspaus (i cia eis pastas is uzpildytos formos)
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');

        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Naujas pirkimas';
        $mail->Body    =    '<b> Siuntėjas: ' . $kliento_vardas . '</b> <br>
                            Telefonas: ' . $kliento_telefonas . ' <br>
                            El paštas: ' . $kliento_elpastas . ' <br>
                            Miestas: ' . $kliento_miestas . ' <br>
                            Gatvė ir nr: ' . $kliento_gatve . ' <br>
                            Pašto kodas: ' . $kliento_postCode . ' <br>
                            Siuntimo metodas: ' . $kliento_postMethod . ' <br>
                            Parduota gaudyklė ID: ' . $prekes_id;
                            
        $mail->AltBody = "erroras kazkur";

            
        
        $mail->send();
        
        // sekmingai isiustas emailas irasomas i duomenu baze kaip atsargine kopija

                
        //$sql_textas = "INSERT INTO emailai VALUES ('', '$kliento_vardas', '$kliento_telefonas', '$kliento_elpastas', '$kliento_zinute')";
        // echo $sql_textas; 
        //$emailToDB = mysqli_query($conn, $sql_textas);

        //free result
        //mysqli_free_result($emailToDB);
        
        // close connection
        //mysqli_close($conn);
        
         //$_SESSION["isiuntimas"] = 1;
         //header("Refresh:0");
         //echo "<meta http-equiv='refresh' content='0'>";
    //    echo 'Message has been sent';
    } catch (Exception $e) {
       // echo 'Klaida, seni kazko pridirbai.';
       // echo 'Mailer Error: ' . $mail->ErrorInfo;
    }



