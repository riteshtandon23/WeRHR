<?php
include_once("connection.php");
require("../vendor/autoload.php");
use Mailgun\Mailgun;

session_start();

$fileloc = fopen("../email_templates/account_created.php", 'r');
$fileread = fread($fileloc, filesize("../email_templates/account_created.php"));



		
if(isset($_POST["submit"])){	
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = ($_POST['password']);
    //$_SESSION['fname4email'] = $firstname;
    $query1 = mysqli_query($con,"SELECT email FROM users WHERE email='$email' UNION ALL SELECT email FROM employers WHERE email='$email'");
    
    if(mysqli_num_rows($query1)>0){
        print '<script type="text/javascript">'; 
        print 'alert("The email address  is already registered!");';
        //print 'window.location="http://www.werhr.in/user_register.php";';
        print 'window.location="http://localhost/WeRHR_Login/user_register.php";';
        print '</script>'; 
    }
    else{
        $query1 = mysqli_query($con,"INSERT INTO users(firstname,lastname,email,password,act_status) VALUES('$firstname','$lastname','$email','$password','0')");
        print '<script type="text/javascript">'; 
        print 'alert("Successfully registered");'; 
        //print 'window.location="http://www.werhr.in/login.php";';
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