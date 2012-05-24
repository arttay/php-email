<?php
if(isset($_POST['email'])) {
	
	// CHANGE THE TWO LINES BELOW
	$email_to = "arttay1190@yahoo.com";
	
	$email_subject = "website html form submissions";
	
	
	function died($error) {
		// your error code can go here
		echo "We're sorry, but there's errors found with the form you submitted.<br /><br />";
		echo $error."<br /><br />";
		echo "Please go back and fix these errors.<br /><br />";
		die();
	}
	
	// validation expected data exists
	if(!isset($_POST['first_name']) ||
		!isset($_POST['email']) ||
		!isset($_POST['message'])) {
		died('We are sorry, but there appears to be a problem with the form you submitted.');		
	}
	
	$first_name = $_POST['first_name']; // required
	$email_from = $_POST['email']; // required
	$comments = $_POST['message']; // required
	
	$error_message = "";
	$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
  if(!preg_match($email_exp,$email_from)) {
  	$error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
	$string_exp = "/^[A-Za-z .'-]+$/";
  if(!preg_match($string_exp,$first_name)) {
  	$error_message .= 'The First Name you entered does not appear to be valid.<br />';
  }

  if(strlen($comments) < 2) {
  	$error_message .= 'The Comments you entered do not appear to be valid.<br />';
  }
  if(strlen($error_message) > 0) {
  	died($error_message);
  }
	$email_message = "Form details below.\n\n";
	
	function clean_string($string) {
	  $bad = array("content-type","bcc:","to:","cc:","href");
	  return str_replace($bad,"",$string);
	}
	
	$email_message .= "First Name: ".clean_string($first_name)."\n";
	$email_message .= "Email: ".clean_string($email_from)."\n";
	$email_message .= "Comments: ".clean_string($comments)."\n";
	
	
// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);  
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Art Taylor | Contact</title>
        <link rel="Stylesheet" type="text/css" href="../css/smoothDivScroll.css" /><!-- the CSS for Smooth Div Scroll -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js" type="text/javascript"></script><!-- jQuery library - I get it from Google API's -->
	<script src="../javascript/jquery.ui.widget.js" type="text/javascript"></script><!-- jQuery UI widget factory -->
	<script src="../javascript/jquery.smoothDivScroll-1.1-min.js" type="text/javascript"></script><!-- Smooth Div Scroll 1.1 - minified for faster loading-->
	<link rel="stylesheet" type="text/css" href="../css/random.css" /><!-- Styles for my specific scrolling content -->
	<link rel="stylesheet" type="text/css" href="../css/bg.css" /><!--body content background -->
		<script type="text/javascript">
		// Initialize the plugin with no custom options
		$(window).load(function() {
			$("div#makeMeScrollable").smoothDivScroll({});
		});
	</script>
    </head>
    <body>
    	<div id ="wrapper">
<center>
	
	

<?php include("../includes/nav.php"); ?>

</center>
<article id ="contactpara">
	<div id = "box">
	<div id ="contactList">
		<div class="contactBox padding">

	<div class="alignCenter">
		
		
Thank you, I will get back as soon as I can
</BR>
</br>
-Art Taylor
<br />
		<a href="contact.php">back</a>
				
				
				
					
					
			
		
		
	</div>

</div><!--end id box-->
</article><!--- ... -->
<div class="clearfooter">
</div><!--ends clearfooter-->
</div>
<div id = "footer">
	<?php include("../includes/footer.php"); ?>
</div>
    </body>
</html>


<?php
}
die();
?>