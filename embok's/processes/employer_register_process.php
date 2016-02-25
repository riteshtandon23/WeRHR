<?php
include_once("connection.php");
require("../vendor/autoload.php");
use Mailgun\Mailgun;

session_start();

$fileloc = fopen("../email_templates/account_created_employer.php", 'r');
$fileread = fread($fileloc, filesize("../email_templates/account_created_employer.php"));


if(isset($_POST['submit'])){
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$email = $_POST['email'];
	$mobile = ($_POST['mobile']);
	$company = $_POST['cname'];
	$web = $_POST['website'];
	$address = $_POST['address'];
	$city = ($_POST['city']);
	$state = ($_POST['state']);
	$country = ($_POST['country']);
	$password = ($_POST['password']);
	$sequence2 = md5($email);		#encrypting email as emal is unique
	$sequence = sha1($sequence2);	#to be used in activation url
	$fileread = str_replace("#fname#", ucfirst($fname), $fileread);
	$fileread = str_replace("#seq#", $sequence, $fileread);
	
	$query1 = mysqli_query($con,"SELECT email FROM users WHERE email='$email' UNION ALL SELECT email FROM employers WHERE email='$email'");
	if(mysqli_num_rows($query1)>0){
		print '<script type="text/javascript">'; 
		print 'alert("The email address  is already registered!");';
		print 'window.location="http://localhost/WeRHR_Login/employer_register.php";'; 
		print '</script>';	
	}
	else
	{
		//$query1 = mysqli_query($con,"INSERT INTO employers(firstname,lastname,email,contact,companyName,companyWebsite,address,city,state,country,password,act_status,sequence) VALUES('$fname','$lname','$email','$mobile','$company','$web','$address','$city','$state','$company','$password','0','$sequence')");
		$res = $con->query("INSERT INTO employers(firstname,lastname,email,contact,companyName,companyWebsite,address,city,state,country,password,act_status,sequence) VALUES('$fname','$lname','$email','$mobile','$company','$web','$address','$city','$state','$country','$password','0','$sequence')");
		$row = mysqli_fetch_assoc($res);
		$_SESSION['id'] = $row['id'];
		$_SESSION['sequence'] = $sequence;
		print '<script type="text/javascript">'; 
		print 'alert("Successfully registered");';
		print 'window.location="http://localhost/WeRHR_Login/login.php";';
		print '</script>';

		# Instantiate the client.
        $mg = new Mailgun('key-1450c038c9c4c1a803cfa607ceff9fe6');
        $domain = "werhr.in";

        # Make the call to the client.
        $mg->sendMessage($domain, array('from'    => 'noreply@werhr.in', 
                                'to'      => $email, 
                                'subject' => 'Welcome to We\'R\'HR', 
                                'html'    => $fileread));
	}
	
}	
else
{
    print '<script type="text/javascript">'; 
    print 'alert("POST is empty");'; 
    print '</script>'; 
}

?>