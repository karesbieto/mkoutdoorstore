<?php

	// Import PHPMailer classes into the global namespace
	// These must be at the top of your script, not inside a function
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	// Load Composer's autoloader
	require '../vendor/autoload.php';

	session_start();
	require_once './connection.php';

	if(isset($_POST['firstname']) && !empty($_POST['firstname']) &&
		isset($_POST['lastname']) && !empty($_POST['lastname']) && 
		isset($_POST['email']) && !empty($_POST['email']) &&
		isset($_POST['subject']) && !empty($_POST['subject']) &&
		isset($_POST['message']) && !empty($_POST['message']))
	{

	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$fullname = $firstname . " " . $lastname;
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];

	
		$query = "INSERT INTO contact (firstname, lastname, email, subject, message) VALUES ('$firstname', '$lastname', '$email', '$subject', '$message')";
		// var_dump($query);
		// die();
		$result = mysqli_query($conn, $query);


			// Instantiation and passing `true` enables exceptions
		$mail = new PHPMailer(true);

		try {
		    //Server settings
		    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
		    $mail->isSMTP();                                            // Set mailer to use SMTP
		    $mail->Host       = 'smtp.gmail.com';  	// Specify main and backup SMTP servers
		    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		    $mail->Username   = 'mkoutdoorstore@gmail.com';                     // SMTP username
		    $mail->Password   = 'mkoutdoorstore2019';                               // SMTP password
		    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
		    $mail->Port       = 587;                                    // TCP port to connect to

		    //Recipients
		    $mail->setFrom('mkoutdoorstore@gmail.com', 'MK Outdoor Store');
		    $mail->addAddress("$email", "$fullname");     // Add a recipient
		    // $mail->addAddress("$email", "$fullname");               // Name is optional
		    // $mail->addReplyTo("$email", "$fullname");
		    // $mail->addCC('cc@example.com');
		    $mail->addBCC('mkoutdoorstore@gmail.com', 'MK Outdoor Store');

		    // Attachments
		    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

		    // Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = 'Inquiry Sent successfully';
		    $mail->Body    = 'Thank you, we will get back to you soon.';
		    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		    $mail->send();
		    echo 'Message has been sent';
			header('Location: ../views/home.php');
		} catch (Exception $e) {
		    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}

	}

?>