<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';  // Include PHPMailer autoloader

$alert = ''; // Variable to hold alert message

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $recipient = $_POST['recipient'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'admin@gmail.com';  // Your Gmail address
        $mail->Password = '';  // Your Gmail password (or App Password)
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipients
        $mail->setFrom('admin@gmail.com', 'ADMIN');
        $mail->addAddress($recipient);

        // Attachments
        if (!empty($_FILES['attachment']['name'])) {
            $mail->addAttachment($_FILES['attachment']['tmp_name'], $_FILES['attachment']['name']);
        }

        // Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;

        // Send the email
        $mail->send();
        $alert = "<script>
                    Swal.fire({
                      title: 'Email Sent!',
                      text: 'Your email was successfully delivered.',
                      icon: 'success',
                      confirmButtonText: 'Ok'
                    });
                  </script>";
    } catch (Exception $e) {
        // Error alert using SweetAlert
        $alert = "<script>
                    Swal.fire({
                      title: 'Error!',
                      text: 'Message could not be sent. Mailer Error: {$mail->ErrorInfo}',
                      icon: 'error',
                      confirmButtonText: 'Ok'
                    });
                  </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Sender</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            background-color: #222831;
        }
        #email-app {
            background-color: #C4E1F6;
            padding: 15px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-bottom: 20px;
            font-weight: bold;
            color: #343a40;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div id="email-app" class="container mt-5"> 
    <h1 class="text-center">Your Message, Just a Click Away!</h1>
        &nbsp;
        <h2>Compose Email</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="recipient" class="form-label"><b>To:</label>
                <input type="email" class="form-control" id="recipient" name="recipient" placeholder="Enter recipient's email" required>
            </div>
            <div class="mb-3">
                <label for="subject" class="form-label"><b>Subject:</label>
                <input type="text" class="form-control" id="subject" name="subject" placeholder="Email subject" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label"><b>Message:</label>
                <textarea class="form-control" id="message" name="message" rows="5" placeholder="Type your message here..." required></textarea>
            </div>
            <div class="mb-3">
                <label for="attachment" class="form-label"><b>Attachment:</label>
                <input type="file" class="form-control" id="attachment" name="attachment">
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg">Send</button>
            </div>

        </form>
        <!-- Output the alert here -->
        <?php echo $alert; ?>
    </div>
</body>
</html>
