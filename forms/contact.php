 
  <?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Variables del formulario
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Configuración de PHPMailer
    $mail = new PHPMailer(true);
    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'wei21bedoya@gmail.com';
        $mail->Password = 'arango=1984';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Configuración del remitente y destinatario
        $mail->setFrom($email, $name);
        $mail->addAddress('destinatario@example.com', 'Nombre del Destinatario');

        // Configuración del contenido del correo
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;

        // Enviar el correo
        $mail->send();
        
        echo 'OK'; // Respuesta al cliente indicando éxito
    } catch (Exception $e) {
        echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
    }
} else {
    echo 'Método no permitido'; // Respuesta al cliente si el método no es POST
}
?>


