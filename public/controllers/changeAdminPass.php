<?php require_once("../../includes/dbconnection.php");?>
<?php require_once("../../includes/all_functions.php");?>
<?php
session_start();
if(isset($_POST['newPassword'])){
	$opass = $_POST['currentPassword'];
    $npass = $_POST['newPassword'];
    $id = $_SESSION['AID'];
    $row = mysqli_fetch_assoc($connection->query("SELECT Admin_password FROM we_are_hr_admin WHERE A_ID='$id'"));
        if($row['Admin_password'] === $opass)
        {
            $stmt=$connection->prepare("call updateAdminPassword(?,?,?)");
            $stmt->bind_param('sss',$id,$opass,$npass);
            $result=$stmt->execute();
            if($result)
            {
                echo json_encode("Success fully change Your Password");
                redirect_to("../changeAdminPass.php?key=111111");
            }
        }else
        {
            redirect_to("../changeAdminPass.php?key=000111");
        }

    }

        
?>