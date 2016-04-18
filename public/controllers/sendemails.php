<?php require_once("../../includes/dbconnection.php");?>
<?php require_once("../../includes/all_functions.php");?>
<?php 
require("../vendor/autoload.php");
use Mailgun\Mailgun;
$fileloc = fopen("../email_templates/messagefromAdmin.php", 'r');
$fileread = fread($fileloc, filesize("../email_templates/ExamNotification.php"));
    if(isset($_POST['sendmail']))
    {
        $mg = new Mailgun('key-1450c038c9c4c1a803cfa607ceff9fe6');
        $domain = "werhr.in";
        $Subject = $_POST['Subject'];
        $Email = $_POST['multiplesendemail'];
        $Message = $_POST['Messagebody'];
        foreach ($Email as $value) {
            $result=selectUserName($value);
                $fname=null;
                while ($row=$result->fetch_assoc()) {
                    $fname=$row['firstname'];
                }
                $fileread = str_replace("#subject#", $Subject, $fileread);
                $fileread = str_replace("#fname#", $fname, $fileread);
                $fileread = str_replace("#message#", $Message, $fileread);
                    $mg->sendMessage($domain, array('from'    => 'noreply@werhr.in', 
                                'to'      => $value, 
                                'subject' => $Subject, 
                                'html'    => $fileread));
                    $msg = 'Recovery link is being sent! Please check your email';
            }
            if(isset($_POST['fromfeedback']))
            {
                redirect_to("../adminHome.php");
            }else{
                redirect_to("../sendmails.php?mesg=000011");
            }
          
    }else
    {
      echo "failS";  
    }
    
 ?>
<?php
if(isset($connection))
{
    mysqli_close($connection);
}
?>