<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php
require("vendor/autoload.php");
use Mailgun\Mailgun;
session_start();

$fileloc = fopen("email_templates/password_recovery.php", 'r');
$fileread = fread($fileloc, filesize("email_templates/password_recovery.php"));

//fetching posted details
if(!empty($_POST['email'])){
    $email = $_POST['email'];

    #check if email is present in the db
    $query = "SELECT id,firstname FROM users WHERE email='$email' UNION ALL SELECT id,firstname FROM employers WHERE email='$email'";
    #although UNION, result can't be of both tables as registration allowed one unique email for both tables
    $result = $connection->query($query);
    $row = mysqli_fetch_assoc($result);
    if($result->num_rows > 0){          #if exist
        $id = $row['id'];
        $sequence1 = md5($email);       #encrypting email as email is unique
        $sequence = sha1($sequence1);   #to be used in recovery url (sequence already inserted when register)
        $fileread = str_replace("#fname#", ucfirst($row['firstname']), $fileread);
        $fileread = str_replace("#seq#", $sequence, $fileread);
        
        # Instantiate the client.
        $mg = new Mailgun('key-1450c038c9c4c1a803cfa607ceff9fe6');
        $domain = "werhr.in";

        # Make the call to the client.
        $mg->sendMessage($domain, array('from'    => 'noreply@werhr.in', 
                                'to'      => $email, 
                                'subject' => 'Password Recovery', 
                                'html'    => $fileread));
        $msg = 'Recovery link is being sent! Please check your email';
        redirect_to("login.php?msg=".urlencode($msg));
    }
    else	//user does not exist
    {
    ?>
        <script type="text/javascript">
            alert("We can't seem to find a user with that email address! Please check");
            window.history.back();
            </script>
<?php
    }
}
else{
    echo "POST is empty!\n";
}


?>