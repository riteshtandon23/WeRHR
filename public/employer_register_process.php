<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php
require("vendor/autoload.php");
use Mailgun\Mailgun;

session_start();

$fileloc = fopen("email_templates/account_created_employer.php", 'r');
$fileread = fread($fileloc, filesize("email_templates/account_created_employer.php"));


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
	$date=date("Y-m-d");
	$sequence2 = md5($email);		#encrypting email as emal is unique
	$sequence = sha1($sequence2);	#to be used in activation url
	$fileread = str_replace("#fname#", ucfirst($fname), $fileread);
	$fileread = str_replace("#seq#", $sequence, $fileread);
	
	$query1 = mysqli_query($connection,"SELECT email FROM users WHERE email='$email' UNION ALL SELECT email FROM employers WHERE email='$email'");
	if(mysqli_num_rows($query1)>0){
		$Error="The email address  is already registered!"; 
         header("location:employer_register.php?Error=" . $Error); 	
	}
	else
	{
		//$query1 = mysqli_query($con,"INSERT INTO employers(firstname,lastname,email,contact,companyName,companyWebsite,address,city,state,country,password,act_status,sequence) VALUES('$fname','$lname','$email','$mobile','$company','$web','$address','$city','$state','$company','$password','0','$sequence')");
		$res = $connection->query("INSERT INTO employers(firstname,lastname,email,contact,companyName,companyWebsite,address,city,state,country,password,act_status,sequence,reg_date) VALUES('$fname','$lname','$email','$mobile','$company','$web','$address','$city','$state','$country','$password','0','$sequence','$date')");
		$row = mysqli_fetch_assoc($res);
		$_SESSION['id'] = $row['id'];
		$_SESSION['sequence'] = $sequence;

		# Instantiate the client.
        $mg = new Mailgun('key-1450c038c9c4c1a803cfa607ceff9fe6');
        $domain = "werhr.in";

        # Make the call to the client.
        $mg->sendMessage($domain, array('from'    => 'noreply@werhr.in', 
                                'to'      => $email, 
                                'subject' => 'Welcome to We\'R\'HR', 
                                'html'    => $fileread));
        $msg = 'Successfully Registered! Please check your email';
		redirect_to("login.php?msg=".urlencode($msg));
	}
	
}	
else
{
    print '<script type="text/javascript">'; 
    print 'alert("POST is empty");'; 
    print '</script>'; 
}

?>