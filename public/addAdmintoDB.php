<?php require_once("../includes/dbconnection.php");?>
<?php require_once("../includes/all_functions.php");?>
<?php 
    if(isset($_POST['submit']))
    {
        $AdminName=$_POST['AdminName'];
        $AdminLName=$_POST['AdminLName'];
        $AdminContact=$_POST['AdminContact'];
        $AdminAddress=$_POST['AdminAddress'];
        $AEmail=$_POST['AEmail'];
        $Adminpword='Admin';
        $type="Admin";
        $stmt=$connection->prepare("call addAdmin(?,?,?,?,?,?,?)");
        $stmt->bind_param('sssssss',$AdminName,$AdminLName,$Adminpword,$type,$AdminContact,$AdminAddress,$AEmail);
        $result=$stmt->execute();
        if($result)
        {
            redirect_to("addAdmin.php");
        }
    }

 ?>
<?php 
    if(isset($_POST['Login']))
    {
        session_start();
        $inputUname=$_POST['inputUname'];
        $inputPassword=$_POST['inputPassword'];
        $result=selectPwdUnm($inputUname,$inputPassword);
            $row=$result->fetch_assoc();
            if($result->num_rows > 0) {
            $_SESSION['Name']=$row['Admin_Name'];
            $_SESSION['LName']=$row['Admin_Lastname'];
            $_SESSION['AID']=$row['A_ID'];
            $_SESSION["email"]=$row['Email'];
            $_SESSION['UName']=$inputUname;
            $_SESSION['Type']=$row['type'];
            // $data1=array();
            // $data2=array();
            // $result=DisplayVisitor();
            // while ($row=$result->fetch_assoc()) {
            //     $date[]=$row['Date'];
            //     $tot[]=$row['totalVisitor'];
            //     $data1=implode("$", $date);
            //     $data2=implode("$", $tot);
            // }
            // $_SESSION['$dateOF']=$data1;
            // $_SESSION['$TotalV']=$data2;
            redirect_to("adminHome.php");
            }else{

                redirect_to("AdminLogin.php?key=111111000000");
            }
    }

 ?>
 <?php 
    if(isset($_POST['UpdateAdminProfile']))
    {
        session_start();
        $id=$_SESSION['AID'];
            $profilepic = $_POST['temp'];
             if(!empty($_FILES["image"]['name']) || $_FILES["image"]['size']>0){
        
            $profilepic = mysqli_escape_string($connection,$_FILES['image']['name']);
            //taking extension
            $extension=end(explode(".", $profilepic));
            $profilepic =$id.".".$extension;


        //echo  $name;
            $type = $_FILES['image']['type'];
            $error = $_FILES['image']['error'];
            $size = $_FILES['image']['size'];
            $temp = $_FILES['image']['tmp_name'];


            if($error > 0)
            {
             echo "error";
            }
            else
            {
                if($size > 10000000)
                    echo "Format not allowed or file size is too big!";
                elseif (substr($type,0,5)=='image') {
                   
                        if($profilepic)
                            move_uploaded_file($temp,"images/userImage/".$profilepic);   
                            }
            }
        
        }
        
        $AdminName=$_POST['AdminName'];
        $AdminLName=$_POST['AdminLName'];
        $AdminContact=$_POST['AdminContact'];
        $AdminAddress=$_POST['AdminAddress'];
        $AEmail=$_POST['AEmail'];
        $stmt=$connection->prepare("call UpdateAdminProfile(?,?,?,?,?,?)");
        $stmt->bind_param('isssss',$id,$AdminName,$AdminLName,$AdminContact,$AdminAddress,$AEmail);
        $result=$stmt->execute();
        if($result)
        {
            redirect_to("adminHome.php");
            //echo "success";
        }
    }
  ?>
<?php
if(isset($connection))
{
    mysqli_close($connection);
}
?>