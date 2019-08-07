<?php  
	
	// Import PHPMailer classes into the global namespace
	// These must be at the top of your script, not inside a function
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	// Load Composer's autoloader
	require '../vendor/autoload.php';

	session_start();
	//WHEN TO CHECKOUT?
	// 1. sure of the cart content
	// 2. user is logged in.

	require_once '../controllers/connection.php';

	function generate_transaction_code() {
		$ref_number = "";
		$source =  ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "A", "B", "C", "D", "E", "F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];

		for($i = 0; $i < 6; $i++) {
			$index = rand(0, 15); //randomizes the number from 0 15
			$ref_number .= $source[$index];
		}

		$today = getdate();

		return $ref_number . "-" . $today[0];
	}

	if(isset($_SESSION['user'])) {
		$user_id = $_SESSION['user']['id'];
		$status_id = 1; 
		$payment_mode_id = 3; //remit
		$date_today = date('Y-m-d');
		$trans_code = generate_transaction_code();
		$totalAmount = $_SESSION['total'];
		$totalAmount = str_replace(',', '', $totalAmount);
		$total = 0;
		$email = $_SESSION['user']['email'];
		$fullname = $_SESSION['user']['firstname'] . " " . $_SESSION['user']['lastname'];

		$order_query = "INSERT INTO orders (user_id, transaction_code, total, status_id, payment_mode_id) VALUES ('$user_id', '$trans_code', '$totalAmount', '$status_id', '$payment_mode_id')";

		
		$order_result = mysqli_query($conn, $order_query);
		
		$order_id = mysqli_insert_id($conn); 

		foreach($_SESSION['cart'] as $id => $quantity) {
			$item_query = "SELECT * FROM items WHERE id =$id";
			$item_result = mysqli_query($conn, $item_query);
			$item = mysqli_fetch_assoc($item_result);

			$total += $item['price'] * $quantity;

			$order_detail_query = "INSERT INTO item_order (order_id, item_id, quantity) VALUES ('$order_id', '$id', '$quantity')";
			
			$order_detail_result = mysqli_query($conn, $order_detail_query);
			
		}

		$update_total_query = "UPDATE orders SET total = $total WHERE id = $order_id";
		$update_total_result = mysqli_query($conn, $update_total_query);


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
		    //$mail->addAddress('ellen@example.com');               // Name is optional
		    $mail->addReplyTo("$email");
		    // $mail->addCC('cc@example.com');
		    // $mail->addBCC('bcc@example.com');

		    // Attachments
		    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

		    // Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = 'Mk Outdoor Store Purchase';
		    $mail->Body    = 'Thank you for purchasing at <b>MK Outdoor Store</b><br><br>The total amount to be paid is <b>&#8369;</b>' .$totalAmount.'.<br><br>Please Pay to any of the following outlet:<br>Palawan Pawnshop<br>Receiver:MK Outdoor Store<br>Phone #: 0917-xxx-xxxx<br><br>Cebuana<br>Receiver:MK Outdoor Store<br>Phone #: 0917-xxx-xxxx<br><br>Mlhuillier<br>Receiver:MK Outdoor Store<br>Phone #: 0917-xxx-xxxx<br>';
		    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		    $mail->send();
		    echo 'Message has been sent';
		    unset($_SESSION['cart']);
			header('Location: ../views/catalog.php');
		} catch (Exception $e) {
		    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}



	} else {
		header("Location: ../views/login.php");
	}

?>